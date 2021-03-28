<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- STYLE -->
  <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" type="text/css">
  <title>Dashboard Guru - Nilai</title>
</head>
<body>
  <div class="wrapper">
    <div class="header">
      <img src="{{ asset('assets/img/header.jpg') }}">
    </div>
    <div class="navbar">
      <ul>
        <li style="margin-right: 5px;"><a href="/guru/home">Beranda</a></li>
        <li style="margin-right: 5px;"><a class="active" href="/guru/data-nilai">Data Nilai</a></li>

        <li style="float: right;"><a class="actives" href="/logout">Logout</a></li>
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
            Tambah Nilai
        </h1><br>
        <form action="/guru/tambah-nilai" method="post">
            @csrf

            <label>Nama Siswa</label>
            <select name="siswa" id="">
                @foreach ($data_siswa as $item)
                <option value="{{$item->nis}}">{{$item->nis}} | {{$item->nama}}</option>
                @endforeach
            </select>
            <br>

            <label>Mapel</label>
            <select name="mengajar">
                @foreach ($data_vmengajar as $item)
                <option value="{{$item->id}}">{{$item->mapel}}</option>
                @endforeach
            </select>
            <br>
            <label for="">Ulangan Harian</label><br>
            <input type="number" name="uh">
            <br>
            <label for="">Ulangan Tengah Semester</label><br>
            <input type="number" name="uts">
            <br>
            <label for="">Ulangan Akhir Semester</label><br>
            <input type="number" name="uas">

            <br>
            <button type="submit">Tambah</button>
        </form>
      </div>
    </div>
    <div class="footer">SMKN 1 Cibinong &copy{{ date('Y') }}</div>
  </div>
</body>
</html>
