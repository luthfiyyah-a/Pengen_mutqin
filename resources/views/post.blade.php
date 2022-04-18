{{-- @dd($post); --}}
{{-- untuk nge debug --}}

@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <p>by <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>. in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>. </p>
                {{-- <p>by <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>. in <a href="/categories={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>. </p> --}}
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                {{-- img-fluid biar responsif --}}

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                    {{-- pakai !!, karena di body ada tag html. biar tag html-nya ga keikut tampil di web --}}
                    {{-- <p>{{  $post->body }}</p> --}}
                </article>
            </div>
        </div>

        <a href="/posts" class="display-block mt-3">Back to Posts</a>
    </div>
    
    
@endsection