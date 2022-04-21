@extends('layouts.main')

@section('container')
    <h1 class="text-center">Ayat Random</h1>
    
    <div class="row my-5 d-flex justify-content-center">
        <div class="col-md-8 d-flex justify-content-center">
            <p class="droid-arabic-kufi fs-2 text-center">
                {{-- ini API nya beda2 hehe, jadi maap arraynya pun agak beda. tergantung api nya --}}
                {{ $testcase["text"] }}
            </p>
        </div>
    </div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-center m-3">
        <a target="_blank" href="https://quran.kemenag.go.id/sura/{{ $testcase["surah"]["number"] }}/{{ $testcase["numberInSurah"] }}" class="btn btn-primary" role="button">
            Lihat Ayat Lengkap
        </a>
        <a href="/randomAyat" class="btn btn-primary" role="button">
            Cari Ayat Lain
        </a>
    </div>

    
    <div class="dropdown" id="tes">
        <button class="btn btn-success">Spill ayat selanjutnya</button>
        <div class="dropdown-content dropdown-menu" >
            <button class="dropdown-item" id="nterjemah">Terjemahan</button>
            <button id="next-ayat" class="dropdown-item">Ayat</button>
        </div>
    </div>

    {{-- ngirim var php ke javascript --}}
    <input id="testcase-ayat" value={{ $testcase["number"] }} hidden>
    
    {{-- ruang untuk ayat selanjutnya apabila diklik --}}
    <div class="div">
        <p id="result-ayat" class="droid-arabic-kufi fs-5 text-center mt-5"></p>
    </div>
    <div class="div">
        <p id="result-terjemah" class="fs-6 text-center mt-5"></p>
    </div>

    <div class="container mt-5 p-5">
        <h4 class="text-center">Pilih Juz</h4>
        {{-- <div class="row d-flex justify-content-center"> --}}
            {{-- <?php $count=1 ?>
            @for ($i = 1; $i<=6; $i++)
            <div class="col-sm-1">
                @for($j=1; $j<=5; $j++)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      {{ $count++ }}
                    </label>
                </div>
                @endfor
            </div>
            @endfor --}}
        {{-- </div> --}}

        <form action="/randomAyat" method="post" class="justify-content-center">
            @csrf
            <?php $j = 0?>
            @for ($i = 1; $i<=30; $i++)
                <div class="form-check d-inline-block m-1">
                    <input name="juz[]" class="form-check-input" type="checkbox" value="{{ $i }}" @if(old('juz', $old_data[$j])== $i ) checked <?php $j++; ?> @endif id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $i }}
                    </label>
                </div>
            @endfor
            <button type="submit" class="btn btn-primary d-block">Cari</button>
        </form>
    </div>
    

    <script>
        // var nterjemah = 
        // document.getElementById("tes").innerHTML = "Hello World";
        nterjemah = document.getElementById("nterjemah");
        nAyat = document.getElementById("next-ayat");
        ayat = document.getElementById("testcase-ayat");
        // kalo ga di parseInt, takutnya jadinya string. trus kalo ditambah 1, takutnya dia nambah digit 1 dibelakangnya. cth : ayat=2, +1 = 21. itu klo ga diparseInt
        next_ayat = parseInt(ayat.value) + 1;
        resultTerjemah = document.getElementById("result-terjemah");
        resultAyat = document.getElementById("result-ayat");
        var ayat_text;
        var ayat_surah;
        var ayat_numberInSurah;

        document.addEventListener('DOMContentLoaded', function() {
            // buat object ajax
            var xhr = new XMLHttpRequest();
    
            // cek kesiapan ajax
            xhr.onreadystatechange = function(){
                if( xhr.readyState == 4 && xhr.status == 200){
                    const result = JSON.parse(xhr.responseText);
                    //  resultTerjemah.innerHTML = result.data.text;
                    ayat_text = result.data.text;
                    ayat_numberInSurah = result.data.numberInSurah;
                    ayat_surah = result.data.surah.number;
                    console.log("AWAL AYAt_SurahH = " + ayat_surah);
                    // xhr.ResponseText itu adalah file yang di xhr.open. alias yg ada di link itu
                }
            }

            // eksekusi ajax
            xhr.open('GET', 'http://api.alquran.cloud/v1/ayah/' + next_ayat , true);
            xhr.send();
        });

        nterjemah.addEventListener("click", function(){
            
            // buat object ajax
            var xhr = new XMLHttpRequest();
    
            // cek kesiapan ajax
            xhr.onreadystatechange = function(){
                if( xhr.readyState == 4 && xhr.status == 200){
                     const result = JSON.parse(xhr.responseText);
                     resultTerjemah.innerHTML = result["data"]["verses"][ayat_numberInSurah-1]["translation"]["id"];
                    // xhr.ResponseText itu adalah file yang di xhr.open. alias yg ada di link itu
                }
            }
            console.log("number in surah" + ayat_numberInSurah);
            console.log("surah" + ayat_surah);

            // eksekusi ajax
            xhr.open('GET', 'https://api.quran.sutanlab.id/surah/' + ayat_surah, true);
            xhr.send();

        });

        nAyat.addEventListener("click", function(){
            
            // buat object ajax
            var xhr = new XMLHttpRequest();
    
            // cek kesiapan ajax
            xhr.onreadystatechange = function(){
                if( xhr.readyState == 4 && xhr.status == 200){
                     const result = JSON.parse(xhr.responseText);
                     resultAyat.innerHTML = result.data.text;
                    // xhr.ResponseText itu adalah file yang di xhr.open. alias yg ada di link itu
                }
            }
            
            // eksekusi ajax
            xhr.open('GET', 'http://api.alquran.cloud/v1/ayah/' + next_ayat , true);
            xhr.send();
        });
    
    
    </script>

@endsection


