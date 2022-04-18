@extends('layouts.main')

@section('container')

  <div class="row justify-content-center">
    <div class="col-lg-5">
      <main class="form-registration">
        <h1 class="h3 mb-3 fw-normal text-center">Registration form</h1>
        <form action="/register" method="post">
          {{-- action diarahkan ke route register --}}
          {{-- method post akan dijalankan setelah diisikan semua. --}}
          @csrf 
          {{-- @crsf ini untuk mengamankan POST pada web kita. penjelasannya di video 15. user registration. --}}
          {{-- disini laravel di page ini ngirim token csrf kayaknya. kalo kita ga ngasih @crsf, mgkn nanti 419 page expired --}}

          {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
      
          <div class="form-floating">
            <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
            {{--  @error('name') is-invalid @enderror kalau dia error, maka dia masuk kelas invalid (ngasih warna merah) --}}
            {{-- required value="{{ old('nama') }} agar kalau ada error, isi kolom yg sebelumnya tetep ada. ga ilang gitu datanya --}}
            <label for="name">Name</label>
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
            {{-- untuk menampilkan error nya --}}
          </div>

          <div class="form-floating">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
            <label for="username">Username</label>
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-floating">
            <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password">
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
      
          {{-- <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label> 
          </div> --}}
          <button class="w-100 btn btn-lg btn-primary mt-5" type="submit">Register</button>
          {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> --}}
        </form>
        <small class="d-block text-center mt-3">
          Already Registered? <a href="/login"> Log in </a>
        </small>
      </main>
    </div>
  </div>


@endsection