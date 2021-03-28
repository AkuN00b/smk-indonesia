<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- STYLE -->
  <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" type="text/css">
  <title>Dashboard Admin - Jurusan</title>
</head>
<body>
  <div class="wrapper">
    <div class="header">
      <img src="{{ asset('assets/img/header.jpg') }}">
    </div>
    <div class="navbar">
      <ul>
        <li style="margin-right: 5px;"><a href="/admin/home">Beranda</a></li>
        <li style="margin-right: 5px;"><a class="active" href="/admin/data-jurusan">Jurusan</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-guru">Guru</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-kelas">Kelas</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-mapel">Mapel</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-siswa">Siswa</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-mengajar">Mengajar</a></li>

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
            Jurusan
        </h1><br>
        <form action="/admin/tambah-jurusan" method="post">
            @csrf
            <label>Nama Jurusan: </label><br>
            <input type="text" name="nama">

            <button type="submit">Tambah</button>
        </form><br>
        <table border="1" width="100%">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Opsi</th>
            </tr>
            @foreach ($data_jurusan as $key => $data)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $data->nama }}</td>
              <td>
                <button class="dir" style="background-color: orange;"><a href="/admin/edit-jurusan/{{ $data->id }}" style="text-decoration: none; color: white;">Edit</a></button>
                <button class="dir" style="background-color: red;"><a href="/admin/hapus-jurusan/{{ $data->id }}" style="text-decoration: none; color: white;">Hapus</a></button>
              </td>
            </tr>
            @endforeach
        </table>
      </div>
    </div>
    <div class="footer">SMKN 1 Cibinong &copy{{ date('Y') }}</div>
  </div>
</body>
</html>
