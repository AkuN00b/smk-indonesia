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
            NIP: {{ Session('user') }} <br>
            Nama: {{ Session('nama') }} <br>
            Jenis Kelamin:
                @if (Session('jk') === 'L')
                    Laki-laki
                @else
                    Perempuan
                @endif <br>
            Alamat: {{ Session('alamat') }} <br>
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
            Data Kelas Yang Diajar
        </h1><br>
        <table border="1" width="100%">
            <tr>
              <th>No</th>
              <th>Kelas</th>
              <th>Opsi</th>
            </tr>
            @foreach ($data_kelas as $index => $item)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$item->kelas}} ({{ $item->mapel }})</td>
                <td><button class="dir" style="background-color: blue;"><a href="/guru/lihat/tambah-nilai/{{$item->id}}" style="color: white; text-decoration: none;">Tambah Nilai</a></button></td>
            </tr>
            @endforeach
        </table>

        <br>

        <h1 align="center">Data Nilai</h1><br>
        <table border="1" width="100%">
            <tr>
              <th>No</th>
              <th>NIS</th>
              <th>Nama Siswa</th>
              <th>NIP</th>
              <th>Nama Guru</th>
              <th>Kelas</th>
              <th>Mapel</th>
              <th>Jurusan</th>
              <th>UH</th>
              <th>UTS</th>
              <th>UAS</th>
              <th>NA</th>
              <th>Opsi</th>
            </tr>
            @foreach ($data as $key => $item)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama_siswa }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->nama_guru }}</td>
                <td>{{ $item->nama_kelas }}</td>
                <td>{{ $item->nama_mapel }}</td>
                <td>{{ $item->nama_jurusan }}</td>
                <td>{{ $item->uh }}</td>
                <td>{{ $item->uts }}</td>
                <td>{{ $item->uas }}</td>
                <td>{{ $item->na }}</td>
                <td>
                    <button class="dir" style="background-color: orange;"><a href="/guru/edit-nilai/{{$item->id}}" style="color: white; text-decoration: none;">Edit</a></button>
                    <button class="dir" style="background-color: red;"><a href="/guru/hapus-nilai/{{$item->id}}" style="color: white; text-decoration: none;">Hapus</a></button>
                </td>
              </tr>
            @endforeach
          </table><br>
    </div>
    </div>
    <div class="footer">SMKN 1 Cibinong &copy{{ date('Y') }}</div>
  </div>
</body>
</html>
