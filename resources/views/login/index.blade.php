@extends('layouts.main')

@section('container')

  <div class="row justify-content-center">
    <div class="col-md-4">
      
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif


      {{-- kalau di session ada loginError --}}
      @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        {{-- mengambil pesan dari yang session loginError di LoginController.php --}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      {{-- kalau ada pesan success, maka tampilkan yg di sini --}}
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        {{-- mengambil pesan dari yang session sukses di RegisterController.php --}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <main class="form-signin">
        <h1 class="h3 mb-3 fw-normal text-center">Please log in</h1>
        <form action="/login" method="post">
          {{-- pakai method post karena kita mau ngirim datanya --}}
          @csrf
          
          {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
      
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
            {{-- autofocus itu kalau page di refresh, maka dia auto fokus ke kolom email --}}
            <label for="email">Email address</label>
            @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                  {{-- message ini pesan errornnya. gatau dah sy var dari mana, mgkn dari @error kali ya? --}}
                </div>
            @enderror
          </div>

          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            <label for="password">Password</label>
          </div>
      
          <div class="checkbox mb-3">
            {{-- <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label> --}}
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
          {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> --}}
        </form>
        <small class="d-block text-center mt-3">
          Not Registered? <a href="/register">Register Now!</a>
        </small>
      </main>
    </div>
  </div>


@endsection