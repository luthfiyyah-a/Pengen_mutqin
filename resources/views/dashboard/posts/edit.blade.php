@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>

    <div class="col-lg-8">
        {{-- karena methodnya post ke url/dashboard/posts , dia akan mengarahkan ke class store --}}
        <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5">
          {{-- method put untuk meng-edit --}}
          @method('put')  
          @csrf

            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
              {{-- old('title', $post->title) artinya, dia mencari judul sebelumnya (barangkali ada judul sebelum error post invalid), kalau misalnya tidak ada, maka dia cari dari judul yg lama (sebelum postingan diedit)--}}
            </div>
            @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror

            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
            </div>
            @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror

            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                {{-- if else ini untuk memulihkan value yg udah diisi sebelumnya oleh user, biar kalo dipost tp gagal, masih tetep ada --}}
                {{-- = ada 2 karena tipe datanya beda. kalo pakai 3 =, takuntnya dia ga masuk ke if --}}
                  @if(old('category_id', $post->category)) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                  @else
                  <option value="{{ $category->id }}" >{{ $category->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            
            <div class="mb-3">
              <label for="body" class="form-label">Body</label>
              @error('body')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
              {{-- karena bukan tag nya html, jadi kita ngasih error nya agak beda dari kolom yang lain --}}
              {{-- ini dari trix editor di github. modal copas. btw, isi for nya harus sama dengan id nya--}}
              <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
              <trix-editor input="body"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>

    {{-- kita pakai Js untuk ngisi slug otomatis --}}
    {{-- kalo saya ga terlalu ngerti, gapapa lah ya wkwk T-T, belum belajar banget tentang javascript tingkat lanjut. semangat future Me --}}
    <script>
      const title = document.querySelector('#title');
      const slug = document.querySelector('#slug');

      // pindah tab dari kolom form
      title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
      });

      // mau menghilangkan fitur/tombol upload file di trix editor
      document.addEventListener('trix-file-accept', function(e){
        // biar ga jalan fiturnya
        e.preventDefault();
      })
    </script>

@endsection