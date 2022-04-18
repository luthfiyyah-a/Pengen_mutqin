<?php

namespace App\Http\Controllers;

use App\Models\Testcase;
use Illuminate\Http\Request;

class HafalankuController extends Controller
{
    public function randomTestcase()
    {
        $testcase = Testcase::where('user_id', auth()->user()->id)->get();
        $ayat = $testcase->random();
        $ayat = Testcase::quran($ayat);
        return $ayat;
    }

    public function index()
    {
        return view('hafalanku', [
            "title" => "Hafalanku",
            "active" => "hafalanku",
            "testcase" => $this->randomTestcase()
        ]);
    }
}
