<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        // nge debug untuk nangkep hasil search (dari form)
        // dd(request('search'));

        $title = '';
        // ini untuk title halamannya. kalo ke post biasa, yang tampil "All Post"
        if(request('category')){
            // cari category kategori yang slug nya sama dengan yg diambil
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            "title" => "All Post" . $title,
            "active" => 'posts',
            // sebenernya ini pakai eageer loading. tapi with nya sudah ditaruh di model (Post.php)
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
            
            // paginate(7) itu untuk membuat page yang berisi 7 item per halamannya
            // withQueryString() apapun yang ada di page sebelumnya juga dibawa kalo kita pindah page

            // "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->get()
            // kita memanggil latest(), kalau kondisinya ada 'search' maka tampilkan search.
            // latest() dari sananya, ini bisa karena dia collection. filter() itu kita buat sendiri di model (Post.php), gunanya kalau search dipakai


            // "posts" => Post::with(['author', 'category'])->latest()->get()
            // // mgkn bacanya: ambil semua postingan, ikut sertakan author dan category
            // // kita menggunakan eager loading. pakai with(). jadi, kita mengambil semua data dari author sekaligus dan category sekaligus. ga nge query satu2.
            // // ini untuk menyelesaikan N+1 problem. untuk meningkatkan performence. optimalisasi

            // "posts" => Post::latest()->get()
            // menampilkan post berdasarkan yang terakhir dibuat
            // "posts" => Post::all()
            // Post::all() -> mengambil method "all()" dari model "Post". berfungsi utk mendapatkan semua data postingan. "::" utk ngambil method static
        ]);
    }

    // ini memakai route binding. kalo pakai ini, kita ga perlu mengirimkan data pakai id
    // nama var parameternya harus sama dengan yang di web.php posts/{post}. karena variabel yang menerima harus sama dengan var yg dikirim
    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" =>'posts', //digunakan untuk navbar
            "post" => $post
        ]);
    }

    // rekam belajar
    // public function show($id)
    // {
    //     return view('post', [
    //         "title" => "Single Post",
    //         "post" => Post::find($id)
    //     ]);
    // }
}
