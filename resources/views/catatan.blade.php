<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catatan Penting</title>
</head>
<body>
    <h1>Bug atau Fitur yang perlu diperbaiki</h1>
    <ul>
        <li>Foto Profil tidak muncul pada halaman edit profil</li>
        <li>Foto profil pada halaman Beranda/Home tidak dapat muncul jika menggunakan selain "default.png"</li>
        <li>Ubah semua halaman menjadi Bahasa Indonesia (jika memungkinkan)!</li>
        <li>Bug: ketika membuat pos baru, dan tidak semua form terpenuhi. Jika ditekan save, dialihkan ke blank page. Bukan ERROR :( <a href="{{ route('post.create')}}">Coba Sendiri</a> LOGIN DULU TAPI YA !!!</li>
        <li>Bug-bug yang lain akan diberitahukan kemudian</li>
    </ul>
    <h3>Jika merasa ada menemukan bug baru, bisa dituliskan disini. Catatan ini berfungsi sebagai Log dari project kita. <br>
        Lokasi file ini ada di "resources/views/catatan.blade.php"<br>
        Untuk Mengaksesnya, ketika /notes pada URL.
        Semangat YAA !!
    </h3>
    <a href="{{ url('/')}}">Kembali Ke Halaman Utama</a>
</body>
</html>