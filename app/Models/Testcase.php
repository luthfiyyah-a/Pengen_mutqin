<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testcase extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'user_id',
    //     'surah',
    //     'ayat_surah',
    // ];

    protected $guarded = [
        'id'
    ];

    // setiap manggil testcase, usernya juga kebawa
    protected $with = ['user'];

    public static function surah()
    {
        $data = file_get_contents("https://equran.id/api/surat");
        // $surah = json_decode($data, true); //kalau ini, jadinya array
        // Isi API : nomor, nama, nama_latin, jumlah_ayat, tempat_turun, arti, deskripsi, audio
        

        $surah = json_decode($data, true); // kalau ini jadinya objek
        return $surah;
    }

    public static function quran(Testcase $testcase)
    {
        // $path = "https://equran.id/api/surat/";
        // $data = file_get_contents($path.$testcase->ayat_surah);
        // $surah = json_decode($data, true); // kalau ini jadinya objek

        // $path = $path = "http://api.alquran.cloud/v1/ayah/";
        // // data: number, text, edition(), surah(), numberInSurah, juz, manzil, page, ruku, hizbQuarter, sajda
        // $data = file_get_contents($path.$testcase->surah.$testcase->ayat_surah);
        // $surah = json_decode($data, true); // kalau ini jadinya objek;
        
        $path = "https://api.quran.sutanlab.id/surah/";
        $data = file_get_contents($path.$testcase->surah."/".$testcase->ayat_surah);
        $data = json_decode($data, true); // kalau ini jadinya objek;
        $ayat = $data["data"];
        return $ayat;
    }

    public static function quran_ayat($ayat)
    {
        $path = "http://api.alquran.cloud/v1/ayah/";
        $data = file_get_contents($path.$ayat);
        $data = json_decode($data, true); // kalau ini jadinya objek;
        $data_ayat = $data["data"];
        return $data_ayat;
    }

    // bentar, mari pikirin lagi nanti tentang per-model-an ini.
    public function user()
    {
        // secara default, laravel bakal nyari foreign key user_id di tabel Post
        return $this->belongsTo(User::class);
        // mengembalikan relasi Testcase terhadap model user
        // belongsTo -> 1 to 1
        // artinya, 1 testcase memiliki 1 user
    }
}
