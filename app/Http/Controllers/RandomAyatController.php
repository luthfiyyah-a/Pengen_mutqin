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

        // $null ini digunakan untuk old_data. old_data itu biar checkbox yg terisi sebelumnya bisa tetep ada.
        //  func index tidak menggunakan old_data sebenernya. tp karna ngakses page yg sama, maka perlu ditambahi.
        // nanti tu ada if. biar dia ga masuk ke dalam if, di sini arraynya di kasih nilai 31 aja. gausah bingung deh pokoknya. ini tuh akal2an aja
        $null = [31];
        return view('randomAyat', [
            "title" => "Random Ayat",
            "active" => "randomAyat",
            "testcase" => $ayat_random,
            "old_data" => $null
        ]);
    }

    public function pilihJuz(Request $request)
    {
        // juz_str ini array yg berisi juznya
        $juz_str = ($request->input('juz'));
        $juz_str [sizeof($juz_str)] = 31; //biar index berikutnya ada nilainya, dan biar ga masuk ke if. ini akal2an aja kok
        // dicollect biar bisa pakai func random. lalu, di (int) karena sebelumnya tipenya string
        $juz = (int)(collect($juz_str)->random());
        $ayat_random = Testcase::quran_ayat_juz($juz);
        // dd($ayat_random);
        return view('randomAyat', [
            "title" => "Random Ayat",
            "active" => "randomAyat",
            "testcase" => $ayat_random,
            "old_data" => $juz_str
        ]);
    }
}
