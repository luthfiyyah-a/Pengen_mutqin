<?php

namespace App\Http\Controllers;

use App\Models\Testcase;
use Illuminate\Http\Request;

class RandomAyatController extends Controller
{
    public function index()
    {
        $random = rand(1, 6236);
        $ayat_random = Testcase::quran_ayat($random);
        return view('randomAyat', [
            "title" => "Random Ayat",
            "active" => "randomAyat",
            "testcase" => $ayat_random
        ]);
    }
}
