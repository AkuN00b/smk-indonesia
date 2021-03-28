<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- STYLE -->
  <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" type="text/css">
  <title>Dashboard Admin - Kelas</title>
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
        <li style="margin-right: 5px;"><a href="/admin/data-guru">Guru</a></li>
        <li style="margin-right: 5px;"><a class="active" href="/admin/data-kelas">Kelas</a></li>
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
            Kelas
        </h1><br>
        <form action="/admin/tambah-kelas" method="post">
            @csrf
            <label>Kelas</label>
            <input type="text" name="nama"><br>

            <label>Jurusan</label>
            <select name="id_jurusan">
            @foreach ($data_jurusan as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
            </select><br>

            <button type="submit">Tambah</button>
        </form>
        <br>

        <table border="1" width="100%">
            <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Opsi</th>
            </tr>
            @foreach ($data_kelas as $key => $data)
            <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $data->nama_kelas }}</td>
            <td>{{ $data->nama_jurusan }}</td>
            <td>
                <button class="dir" style="background-color: orange;"><a href="/admin/edit-kelas/{{ $data->id }}" style="color: white; text-decoration: none;">Edit</a>
                <button class="dir" style="background-color: red;"><a href="/admin/hapus-kelas/{{ $data->id }}" style="color: white; text-decoration: none;">Hapus</a>
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
