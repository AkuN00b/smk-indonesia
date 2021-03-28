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
        <li style="margin-right: 5px;"><a href="{{ route('admin.home') }}">Beranda</a></li>
        <li style="margin-right: 5px;"><a href="{{ route('admin.jurusan') }}">Jurusan</a></li>
        <li style="margin-right: 5px;"><a class="active" href="{{ route('admin.guru') }}">Guru</a></li>
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
            Guru
        </h1><br>
        <form action="{{ route('admin.guru.tambah') }}" method="post">
            @csrf
            <label>NIP</label>
            <input type="text" name="nip"><br>

            <label>Nama</label>
            <input type="text" name="nama"><br>

            <label>Jenis Kelamin</label>
            <select name="jk">
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select><br>

            <label>Alamat</label>
            <textarea name="alamat"></textarea><br>

            <label>Password</label>
            <input type="text" name="password"><br>

            <button type="submit">Tambah</button>
          </form><br>
          <table border="1" width="100%">
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Opsi</th>
            </tr>
            @foreach ($data_guru as $key => $data)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $data->nip }}</td>
              <td>{{ $data->nama }}</td>
              <td>
                @if ($data->jk === 'L')
                Laki-laki
                @else
                Perempuan
                @endif
              </td>
              <td>{{ $data->alamat }}</td>
              <td>
                <button class="dir" style="background-color: orange;"><a href="{{ route('admin.guru.edit', $data->nip) }}" style="color: white; text-decoration: none;">Edit</a></button>
                <button class="dir" style="background-color: red;"><a href="{{ route('admin.guru.hapus', $data->nip) }}" style="color: white; text-decoration: none;">Hapus</a></button>
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
