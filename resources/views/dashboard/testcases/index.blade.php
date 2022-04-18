@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Testcase</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive">

        {{-- "create" ini udah default untuk nambah data --}}
        <a href="/dashboard/testcases/create" class="btn btn-primary">Create new testcase</a>

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Surah</th>
              <th scope="col">Ayat</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($testcases as $testcase)
              <tr>
                  {{-- $loop->iteration itu dari laravel. menampilkan angka berurutan setiap looping --}}
                <td>{{ $loop->iteration }}</td>
                <td>{{ $testcase->surah }}. {{ $testcase->nama_surah }}</td>
                <td>{{ $testcase->ayat_surah }}</td> 
                <td>
                    <a href="/dashboard/testcases/{{ $testcase->id }}" class="badge bg-info"><span data-feather="eye"></span>detail</a>

                    {{-- /dashboard/testcases/{{ $testcase->slug }}/edit ini aturan default dari route defaultnya--}}
                    <a href="/dashboard/testcases/{{ $testcase->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span>edit</a>
                    {{-- untuk form hanya bisa get dan post. jadi, walau ini mau nge delete, di formnya kita tulis post dulu --}}
                    <form action="/dashboard/testcases/{{ $testcase->id }}" method="post" class="d-inline">
                      {{-- lalu, method nya diubah jadi delete --}}
                      @method('delete')
                      @csrf
                      {{-- kita ingin menhilangkan border buttonnya, dan juga display-nya inline--}}
                      <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>delete</button>
                      {{-- kita pakai javascript tuh, yg onclick --}}
                    </form>
                </td>
              </tr>
              @endforeach
            
          </tbody>
        </table>
      </div>


@endsection