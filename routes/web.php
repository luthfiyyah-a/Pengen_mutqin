<?php

use App\Models\Testcase;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HafalankuController;
use App\Http\Controllers\RandomAyatController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardTestcaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});


// skip about dulu
// skip kategori
Route::get('/hafalanku', function () {
    return view('hafalanku', [
        "title" => "Hafalanku",
        "active" => "hafalanku",
        'testcases' => Testcase::where('user_id', auth()->user()->id)->get(),
    ]);
});

Route::get('/hafalanku', [HafalankuController::class, 'index']);
Route::get('/hafalanku/tes', [HafalankuController::class, 'randomTestcase']);
Route::get('/randomAyat', [RandomAyatController::class, 'index']);
Route::post('/randomAyat', [RandomAyatController::class, 'pilihJuz']);

// contoh cara baca: jika ada request ke /login yang methodnya get, maka jalankan class LoginController method index
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
// middleware('guest') itu maksudnya yang bisa mengakses ini hanya yg role nya guest
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

// name('login') utk memberi tahu bahwa ini namanya login, sehingga bisa diakses oleh authentificate
Route::get('/register', [RegisterController::class, 'index'])->name('login')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
// request ke halaman register tapi method nya post. ini pas di form register (index.blade.php /view register)

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');
// hanya yg sudah di auth yg bisa mengakses dashboard


// di sini kita pakai resource controller. di dalamnya sudah mencakup CRUD
Route::resource('/dashboard/testcases', DashboardTestcaseController::class);
// ->middleware('auth');
// agak bermasalah wkwk

// method get, diarahkan ke index
// method post, diarahkan ke store
// method put, diarahkan ke update
// method delete, diarahkan ke destroy


