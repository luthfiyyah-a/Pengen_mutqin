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

    private static $data;
    public static function surah()
    {
        $data = file_get_contents("https://equran.id/api/surat");
        // $surah = json_decode($data, true); //kalau ini, jadinya array
        // Isi API : nomor, nama, nama_latin, jumlah_ayat, tempat_turun, arti, deskripsi, audio
        

        self::$data = json_decode($data, true); // kalau ini jadinya objek
        return self::$data;
    }


    public static function get_nama_surah($surah)
    {
        // gajelas memang. ngakses API nya kok berkali2 T-T
        $data = file_get_contents("https://equran.id/api/surat");
        self::$data = json_decode($data, true); // kalau ini jadinya objek
        return self::$data[(int)$surah]["nama_latin"];
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

    public static function quran_ayat_juz($juz)
    {
        $path = "http://api.alquran.cloud/v1/juz/";
        $data = file_get_contents($path.$juz."quran-uthmani");
        $data = json_decode($data, true); // kalau ini jadinya objek;
        $data = collect($data["data"]["ayahs"]);

        // ini ngambil nomor ayatnya (ayatInQuran) secara random
        $number_random = ($data->random())["number"];
        
        // ngambil data ayatnya. dilempar ke func quran_ayat lagi supaya format datanya sama.
        $data_ayat = self::quran_ayat($number_random);

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
