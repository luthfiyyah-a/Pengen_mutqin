@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span>Back to all my post</a>
            
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>


            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                {{-- lalu, method nya diubah jadi delete --}}
                @method('delete')
                @csrf
                {{-- kita ingin menhilangkan border buttonnya, dan juga display-nya inline--}}
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>delete</button>
                {{-- kita pakai javascript tuh, yg onclick --}}
            </form>

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
</div>

@endsection