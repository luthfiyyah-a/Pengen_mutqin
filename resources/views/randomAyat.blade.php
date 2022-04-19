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

    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <a target="_blank" href="https://quran.kemenag.go.id/sura/{{ $testcase["surah"]["number"] }}/{{ $testcase["numberInSurah"] }}" class="btn btn-primary" role="button">
            Lihat Ayat Lengkap
        </a>
        <a href="/randomAyat" class="btn btn-primary" role="button">
            Cari Ayat Lain
        </a>
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

        {{-- @dd($old_data) --}}
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
    
@endsection

<script>

</script>

