<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- STYLE -->
  <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet" type="text/css">
  <title>Dashboard Admin</title>
</head>
<body>
  <div class="wrapper">
    <div class="header">
      <img src="{{ asset('assets/img/header.jpg') }}">
    </div>
    <div class="navbar">
      <ul>
        <li style="margin-right: 5px;"><a class="active" href="{{ route('admin.home') }}">Beranda</a></li>
        <li style="margin-right: 5px;"><a href="{{ route('admin.jurusan') }}">Jurusan</a></li>
        <li style="margin-right: 5px;"><a href="{{ route('admin.guru') }}">Guru</a></li>
        <li style="margin-right: 5px;"><a href="{{ route('admin.kelas') }}">Kelas</a></li>
        <li style="margin-right: 5px;"><a href="{{ route('admin.mapel') }}">Mapel</a></li>
        <li style="margin-right: 5px;"><a href="{{ route('admin.siswa') }}">Siswa</a></li>
        <li style="margin-right: 5px;"><a href="{{ route('admin.mengajar') }}">Mengajar</a></li>

        <li style="float: right;"><a class="actives" href="{{ route('logout') }}">Logout</a></li>
      </ul>
    </div>
    <div class="konten">
      <div class="konten-kiri">
        <div class="kiri-atas" style="padding-bottom: 10px;">
            <h2>Informasi Admin</h2><br>
            Username: {{ Session('user') }} <br>
            Sebagai, {{ Session('role') }}
        </div>
        <div class="kiri-bawah">
          <h3>Galeri</h3>
        </div>
        <div class="galeri">
          <img src="{{ asset('assets/img/g1.jpg') }}" alt="">
          <img src="{{ asset('assets/img/g2.jpg') }}" alt="">
        </div>
      </div>
      <div class="konten-kanan">
        <h1 align="center">
          SELAMAT DATANG di Dashboard Admin<br>
          di website Penilaian SMK Negeri 1 Cibinong
        </h1>
      </div>
    </div>
    <div class="footer">SMKN 1 Cibinong &copy{{ date('Y') }}</div>
  </div>
</body>
</html>
