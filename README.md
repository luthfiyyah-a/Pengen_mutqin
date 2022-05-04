## Web App Pengen Mutqin

### Tentang teknologi pembuatan
Web ini dibuat menggunakan framework laravel, HTML, CSS, JavaScript, dan PHP, serta menggunakan konsep MVC

### Latar belakang ide aplikasi

cerita latar belakang masalah dari ide :
dulu saya sekolah di sekolah yang ada program menghafal al-quran. jadi tentu ada ujian al-qurannya. biasanya, terkadang ujian al-quran di tempat saya modelan sambung ayat gitu. sebelum ujian, kadang suka minta tolong ke temen buat di-tes-in. jadi, temen ngebacain 1 ayat / potongan ayat, lalu kita ngelanjutin. sayangnya, saya orangnya kadang ga enakan dan suka ngerasa ngerepotin temen.
    
    andai ada tools yang bisa nge-bantu untuk nge tes hafalan, dengan cara menampilkan / memutar ayat secara random jadi bisa tes hafalan tanpa ngerepotin temen. jadi, saya pengen buat web-app ini. (sbnrnya udh ada sih app semacam ini di playstore kyknya)
    
### Fitur Web App:

1. sign up, log in
2. ada page yang:
    - menampilkan ayat alquran secara random tanpa keterangan surat dan ayat untuk mengetes hafalan
    - ayat yang ditampilkan dapat difilter berdasarkan juz.
    - terdapat opsi untuk membuka ayat selanjutnya, dan terjemahan ayat selanjutnya. sebagai clue untuk user.
    - terdapat link yang mengarahkan ke web al-quran online (web lain) yang menampilkan ayat yang sedang dites sekarang. jadi, user dapat tahu ayat yang sedang ditampilkan/diuji ini ayat berapa surah apa, dan bisa membaca surat lebih lengkap.
3. testcase custome :
    - menyimpan data custome testcase ayat dari user. (crud)
    - dapat nge random dari sini juga.


### Tampilan Web App

- Home

![image](https://user-images.githubusercontent.com/79054230/166729002-d9caf768-5971-463c-8e34-e64f5538355d.png)


- Page Random Ayat

![image](https://user-images.githubusercontent.com/79054230/166729031-8377ae54-6510-4c2f-a8d8-3210e37088d0.png)


- Dashboard Testcase custome (untuk menambah testcase ayat)

![image](https://user-images.githubusercontent.com/79054230/166729064-bd57aa76-2289-4b2a-aac2-8db0c560add5.png)


- Page random ayat dari testcase custome

![image](https://user-images.githubusercontent.com/79054230/166731803-6e1a67e9-38e4-4b99-8208-eba5847f2414.png)


- Registrasi

![image](https://user-images.githubusercontent.com/79054230/166732266-0b14a6ca-f764-4686-b64c-8f7ad494522b.png)


- login

![image](https://user-images.githubusercontent.com/79054230/166732371-af0957ee-2ebc-4ee9-9d80-b5927c4f6f08.png)


<br></br><br></br>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
