<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
        // ada folder login, lalu didalamnya ada file index
        // biasanya 1 controller itu merepresentasikan 1 folder
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        // intended() -> sebuah method yang disediakan oleh laravel yg an melakukan redirect user ke sebuah tempat URL sebelum melewati autentikasi middleware 

        // return back()->withError('login failed!');
        return back()->with('loginError', 'login failed!');
        // kembalikan ke page login lagi
        // ini menyertakan pesan flashnya
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
        // supaya ga bisa dipake
    
        $request->session()->regenerateToken();
        // supaya ga dibajak
    
        return redirect('/');
        // mengembalikan ke halaman mana
    }
}
