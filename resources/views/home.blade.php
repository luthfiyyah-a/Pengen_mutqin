@extends('layouts.main')
{{-- relatif terhadap folder views --}}
@section('container')
    <main>
        <div class="px-4 pt-5 my-5 text-center border-bottom p-3">
            <h1 class="display-4 fw-bold">Pengen Mutqin</h1>
            <div class="col-lg-6 mx-auto">
              <p class="lead mb-4">Web App untuk menampilkan Ayat Al-quran secara random dan bertujuan untuk membantu kalian dalam menguji hafalan Al-qur'an</p>
              <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <a href="/randomAyat" type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Tes 30 Juz</a>
                <a href="/login" type="button" class="btn btn-outline-secondary btn-lg px-4">Log in</a>
              </div>
            </div>
            <div class="overflow-hidden" style="max-height: 30vh;">
              <div class="container px-5 ">
                <p class="text-center fs-4 droid-arabic-kufi">
                    وَلَقَدْ يَسَّرْنَا الْقُرْاٰنَ لِلذِّكْرِ فَهَلْ مِنْ مُّدَّكِرٍ
                </p>
                <small>"Dan sungguh, telah Kami mudahkan Al-Qur'an untuk peringatan, maka adakah orang yang mau mengambil pelajaran?"</small>
                <br>
                <small>Q.S. Al-Qamar:17</small>
                
              </div>
            </div>
          </div>
        
    </main>
@endsection