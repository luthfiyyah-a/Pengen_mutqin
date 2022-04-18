@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">Surat ke-{{ $quran["surah"]["name"]["transliteration"]["id"] }} ayat {{ $quran["number"]["inSurah"] }}</h1>
            
            <a href="/dashboard/testcases" class="btn btn-success"><span data-feather="arrow-left"></span>Back to all my testcase</a>
            
            <a href="/dashboard/testcases/{{ $testcase->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>


            <form action="/dashboard/testcases/{{ $testcase->id }}" method="post" class="d-inline">
                {{-- lalu, method nya diubah jadi delete --}}
                @method('delete')
                @csrf
                {{-- kita ingin menhilangkan border buttonnya, dan juga display-nya inline--}}
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>delete</button>
                {{-- kita pakai javascript tuh, yg onclick --}}
            </form>

            <article class="my-3 fs-5">
                <div class="row m-3 ">
                    {{ $quran["text"]["arab"] }}
                </div>
                
                <div class="row m-3">
                    <iframe src="https://cdn.alquran.cloud/media/audio/ayah/ar.alafasy/262" frameborder="0"></iframe>
                </div>
            </article>
        </div>
    </div>
</div>

@endsection