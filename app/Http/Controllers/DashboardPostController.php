<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // untuk nampilin semua data post berdasarkan data tertentu
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
            // ambil data post yang mana user_id nya sama dengan user yang lagi log in
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  menampilkan halaman tambah postingan 
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //  untuk menjalankan fungsi/proses tambahnya
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts', //harus unik, belum ada di tabel posts
            'category_id' => 'required',
            'body' => 'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
        // ambil teks dari body dengan limit 200, kemudian, setelahnya diberi "..." . sebenrnya itu default sih, jd dihapus pun gapapa
        // strip_tags() untuk menghapus semua tag di dalamnya. soalnya kita mau ngilangin tag p nya
        
        Post::create($validateData);

        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // untuk menjalankan fungsi lihat detai
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // halaman untuk nampilin ubah data
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // halaman untuk proses ubah data
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];

        // sebelumnya ada problem, kita mau update post tapi slugnya sama dgn yg sebelumnya. itu gimana? dia jadi ga lolos validasi. tapi gpp, ini solusiya
        // $request itu data yang baru
        // $post itu data yang lama
        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validateData = $request->validate($rules);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
        
        // salah satu cara untuk nge-update
        Post::where('id', $post->id)
            ->update($validateData);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // delete postingan
    public function destroy(Post $post)
    {
        Post::destroy($post->id); //hapus data post berdasarkan id
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted');   
    }

    // ini ga default dari laravel.
    // ini untuk menangani ketika ada permintaan slug
    public function checkSlug(Request $request){

        // bacanya: createSlug, lalu ngambil dari class Post, ngambil filednya 'slug', lalu title nya apa
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        // title nya itu ada di url (yg dikirim dari page create.blade.php), jadi bisa kita ambil
        // slug akan berisi hasil yang sudah diambil dari title, pengecekan uniq nya juga sudah dikerjakan sama library nya
        return response()->json(['slug' => $slug]);
    }
}
