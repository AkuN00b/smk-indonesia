<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- STYLE -->
  <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" type="text/css">
  <title>Dashboard Admin - Guru</title>
</head>
<body>
  <div class="wrapper">
    <div class="header">
      <img src="{{ asset('assets/img/header.jpg') }}">
    </div>
    <div class="navbar">
      <ul>
        <li style="margin-right: 5px;"><a href="/admin/home">Beranda</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-jurusan">Jurusan</a></li>
        <li style="margin-right: 5px;"><a class="active" href="/admin/data-guru">Guru</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-kelas">Kelas</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-mapel">Mapel</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-siswa">Siswa</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-mengajar">Mengajar</a></li>

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
            Edit Guru
        </h1><br>
        <form action="/admin/ubah-guru" method="post">
            @csrf
            <label>NIP</label>
            <input type="text" name="nip" value="{{ $data->nip }}" readonly><br>

            <label>Nama</label>
            <input type="text" name="nama" value="{{ $data->nama }}"><br>

            <label>Jenis Kelamin</label>
            <select name="jk">
              <option value="L" @if ($data->jk === 'L') selected @endif>
                Laki-laki
              </option>
              <option value="P" @if ($data->jk === 'P') selected @endif>
                Perempuan
              </option>
            </select><br>

            <label>Alamat</label>
            <textarea name="alamat">{{ $data->alamat }}</textarea><br>

            <label>Password</label>
            <input type="text" name="password" value="{{ $data->password }}"><br>

            <button type="submit">Ubah</button>
          </form>
      </div>
    </div>
    <div class="footer">SMKN 1 Cibinong &copy{{ date('Y') }}</div>
  </div>
</body>
</html>
