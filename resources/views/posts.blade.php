{{-- @dd($post) --}}
{{-- dump and die (ini punya laravel) untuk nge debug --}}

@extends('layouts.main')
{{-- relatif terhadap folder views --}}
@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('categorys') }}">
                    {{-- kalo ada (Search) request category, maka dia nyari kategori juga --}}
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    {{-- value itu kayaknya, kalo pas ktia search di barnya, maka tulisan yang terlihat di bar nya --}}
                    <button class="btn btn-danger" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>

    {{-- jika postnya ada --}}
    @if($posts->count()) 
    <div class="card mb-3 text-center">
        {{-- kita mengambil gambar ini dari API unsplash. ukurannya 1200x400, dengan kategori sesuai yg kategori post --}}
        <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
        <div class="card-body">
          <h3 class="card-title"> {{ $posts[0]->title }} </h3>
          <p>
            <small class="text-muted">
            by <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
            {{ $posts[0]->created_at->diffForHumans() }}
            {{-- diffForHumans() itu func utk nampilin perbedaan waktu (antara waktu sekarang, dengan waktu yg ada) dan bisa dibaca manusia --}}
            {{-- func ini dari suatu library yang ada di laravel --}}
            </small>

            {{-- rekam belajar --}}
            {{-- <small class="text-muted">
                by <a href="/authors/{{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/categories/{{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                {{ $posts[0]->created_at->diffForHumans() }}
            </small> --}}
          </p>
          
          <p class="card-text"> {{ $posts[0]->excerpt }} </p>

          <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
        </div>
    </div>
    {{-- jika post tidak ada --}}
    

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4">
                <div class="card">
                    <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                    <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p>
                        <small class="text-muted">
                        by <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                        {{-- diffForHumans() itu func utk nampilin perbedaan waktu (antara waktu sekarang, dengan waktu yg ada) dan bisa dibaca manusia --}}
                        {{-- func ini dari suatu library yang ada di laravel --}}
                        </small>
                      </p>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @else
        <p class="text-center fs-4">No post found.</p>
    @endif

    <div class="d-flex justify-end">
        {{ $posts->links() }} 
        {{-- ini link untuk pindah page --}}
    </div>
@endsection




{{-- rekam belajar --}}
    {{-- mau nge skip postingan yg pertama, karena udah ditampilin di atas --}}
    {{-- @foreach ($posts->skip(1) as $post)
    <article class="mb-5 border-bottom pb-4">
        <h2>
            <a href="/posts/{{ $post->slug }}">{{  $post->title }}</a>
        </h2>
        
        <p>
            by <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>. in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
        </p>
        
        <p>
            {{ $post->excerpt }}
        </p>

        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more...</a>
            {{-- record belajar --}}
        {{-- slug --}}
        {{-- <a href="/posts/{{ $post["slug"] }}">{{  $post["title"] }}</a> --}}
        {{-- <h5>{{  $post["author"] }}</h5> --}}
    {{-- </article>
        
    @endforeach --}}
{{-- @endsection --}}