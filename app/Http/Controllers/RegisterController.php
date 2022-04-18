<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Validation\ValidationException; 

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        
        // untuk memvalidasi isi form
        $validatedData = $request->validate([
            'name' => 'required|max:255', //versi penulisan pakai |
            'username' => ['required', 'min:3', 'max:255', 'unique:users'], //versi penulisan pakai array
            'email' => 'required|email:dns|unique:users', //ditambah dns biar dns (nama domain)nya bener
            'password' => 'required|min:5|max:255'

            // rule2 nya ada di dokumentasi laravel (validation)
            // "|" untuk menambahkan rules
        ]);

        // meng-enkripsi (hashing) password 
        // $validatedData['password'] = bcrypt($validatedDate['password']); 
        $validatedData['password'] = Hash::make($validatedData['password']); //versi lain

        User::create($validatedData);
        // return $request->all();
        // return request()->all(); //versi lain


        // setelah register, kita menuju ke halaman login
        return redirect('/login')->with('success', 'Registration successfull! Please login');
        // saat nge direct ke page login, sertakan pesan flash nya.

        // ini istilahnya flash (data). biar di atas itu ada tulisan gitu
        // $request->session()->flash('success', 'Registration successfull! Please login');
        // nama flashnya 'success', pesannya yang "registration successful!..."
    }
}
