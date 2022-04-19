@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Testcase</h1>
    </div>

    <div class="col-lg-8">
        {{-- karena methodnya post ke url/dashboard/posts , dia akan mengarahkan ke class store --}}
        <form method="post" action="/dashboard/testcases" class="mb-5">
            @csrf

            <div class="mb-3">
              <label for="surah" id="surah" class="form-label">Surah</label>
              <select class="form-select" required name="surah" id="surah_input">
                <option selected>Pilih Surah</option>
                {{-- JANLUP NANTI DI CONTROLLER KIRIM DATA SURAH --}}
                {{-- INI KAYAKNYA BELUM KELAR --}}
                @foreach ($surahs as $surah)
                    <option value="{{ $surah["nomor"] }}">{{ $surah["nomor"] }}. {{ $surah["nama_latin"] }}</option>    
                @endforeach
              </select>
            </div>
            @error('surah')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror

            <div class="mb-3">
              <label for="ayat_surah" class="form-label" id="ayat_label">ayat</label>
              <select class="form-select ayat" required id="ayat_input" name="ayat_surah">
                <option selected>Pilih ayat</option>
                {{-- JANLUP NANTI DI CONTROLLER KIRIM DATA ayat --}}
                {{-- INI KAYAKNYA BELUM KELAR --}}
                {{-- @for ( $i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor --}}
              </select>
            </div>
            @error('ayat_surah')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror

            <button type="submit" class="btn btn-primary">Tambah Testcase Ayat</button>
        </form>
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            console.log("alhamdulillah");
            loadAyat();
        });

        function loadAyat(){
          console.log("bismillah");
          
          $('#surah_input').change(function(){
            var getSurah = $("#surah_input").val();
            var objek = getSurah;
                        
            var n = 0;
            // BISMILLAH NGULI. SEMANGAT
            if (getSurah == 1 ) n = 7
            if (getSurah == 2 ) n = 286
            if (getSurah == 3 ) n = 200
            if (getSurah == 4 ) n = 176
            if (getSurah == 5 ) n = 120
            if (getSurah == 6 ) n = 165
            if (getSurah == 7 ) n = 206
            if (getSurah == 8 ) n = 75
            if (getSurah == 9 ) n = 129
            if (getSurah == 10 ) n = 109
            if (getSurah == 11 ) n = 123
            if (getSurah == 12 ) n = 111
            if (getSurah == 13 ) n = 43
            if (getSurah == 14 ) n = 52
            if (getSurah == 15 ) n = 99
            if (getSurah == 16 ) n = 128
            if (getSurah == 17 ) n = 111
            if (getSurah == 18 ) n = 110
            if (getSurah == 19 ) n = 98
            if (getSurah == 20 ) n = 135
            if (getSurah == 21 ) n = 112
            if (getSurah == 22 ) n = 78
            if (getSurah == 23 ) n = 118
            if (getSurah == 24 ) n = 64
            if (getSurah == 25 ) n = 77
            if (getSurah == 26 ) n = 227
            if (getSurah == 27 ) n = 93
            if (getSurah == 28 ) n = 88
            if (getSurah == 29 ) n = 69
            if (getSurah == 30 ) n = 60
            if (getSurah == 31 ) n = 34
            if (getSurah == 32 ) n = 30
            if (getSurah == 33 ) n = 73
            if (getSurah == 34 ) n = 54
            if (getSurah == 35 ) n = 45
            if (getSurah == 36 ) n = 83
            if (getSurah == 37 ) n = 182
            if (getSurah == 38 ) n = 88
            if (getSurah == 39 ) n = 75
            if (getSurah == 40 ) n = 85
            if (getSurah == 41 ) n = 54
            if (getSurah == 42 ) n = 53
            if (getSurah == 43 ) n = 89
            if (getSurah == 44 ) n = 59
            if (getSurah == 45 ) n = 37
            if (getSurah == 46 ) n = 35
            if (getSurah == 47 ) n = 38
            if (getSurah == 48 ) n = 29
            if (getSurah == 49 ) n = 18
            if (getSurah == 50 ) n = 45
            if (getSurah == 51 ) n = 60
            if (getSurah == 52 ) n = 49
            if (getSurah == 53 ) n = 62
            if (getSurah == 54 ) n = 55
            if (getSurah == 55 ) n = 78
            if (getSurah == 56 ) n = 96
            if (getSurah == 57 ) n = 29
            if (getSurah == 58 ) n = 22
            if (getSurah == 59 ) n = 24
            if (getSurah == 60 ) n = 13
            if (getSurah == 61 ) n = 14
            if (getSurah == 62 ) n = 11
            if (getSurah == 63 ) n = 11
            if (getSurah == 64 ) n = 18
            if (getSurah == 65 ) n = 12
            if (getSurah == 66 ) n = 12
            if (getSurah == 67 ) n = 30
            if (getSurah == 68 ) n = 52
            if (getSurah == 69 ) n = 52
            if (getSurah == 70 ) n = 44
            if (getSurah == 71 ) n = 28
            if (getSurah == 72 ) n = 28
            if (getSurah == 73 ) n = 20
            if (getSurah == 74 ) n = 56
            if (getSurah == 75 ) n = 40
            if (getSurah == 76 ) n = 31
            if (getSurah == 77 ) n = 50
            if (getSurah == 78 ) n = 40
            if (getSurah == 79 ) n = 46
            if (getSurah == 80 ) n = 42
            if (getSurah == 81 ) n = 29
            if (getSurah == 82 ) n = 19
            if (getSurah == 83 ) n = 36
            if (getSurah == 84 ) n = 25
            if (getSurah == 85 ) n = 22
            if (getSurah == 86 ) n = 17
            if (getSurah == 87 ) n = 19
            if (getSurah == 88 ) n = 26
            if (getSurah == 89 ) n = 30
            if (getSurah == 90 ) n = 20
            if (getSurah == 91 ) n = 15
            if (getSurah == 92 ) n = 21
            if (getSurah == 93 ) n = 11
            if (getSurah == 94 ) n = 8
            if (getSurah == 95 ) n = 8
            if (getSurah == 96 ) n = 19
            if (getSurah == 97 ) n = 5
            if (getSurah == 98 ) n = 8
            if (getSurah == 99 ) n = 8
            if (getSurah == 100 ) n = 11
            if (getSurah == 101 ) n = 11
            if (getSurah == 102 ) n = 8
            if (getSurah == 103 ) n = 3
            if (getSurah == 104 ) n = 9
            if (getSurah == 105 ) n = 5
            if (getSurah == 106 ) n = 4
            if (getSurah == 107 ) n = 7
            if (getSurah == 108 ) n = 3
            if (getSurah == 109 ) n = 6
            if (getSurah == 110 ) n = 3
            if (getSurah == 111 ) n = 5
            if (getSurah == 112 ) n = 4
            if (getSurah == 113 ) n = 5
            if (getSurah == 114 ) n = 6
            
            var html="";
            for(let i=1; i<=n; i++){
              html += '<option value="'+ i +'">'+ i +'</option>';
            };
            
            $("#ayat_input").html(html);
           });

          //  $.ajax({
          //    type : "POST",
          //    dataType : "JSON",
          //    url : "http://127.0.0.1:8000/dashboard/testcases/create"
          //  })
        }
    </script>

@endsection