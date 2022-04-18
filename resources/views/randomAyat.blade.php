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


    <div class="row d-flex justify-content-center">
        <div class="col-md-8 d-flex justify-content-center">
            <a  href="https://quran.kemenag.go.id/sura/{{ $testcase["surah"]["number"] }}/{{ $testcase["numberInSurah"] }}" class="btn btn-primary" role="button">
                Lihat Ayat Lengkap
            </a>
        </div>
    </div>
    
@endsection

<script>

</script>

