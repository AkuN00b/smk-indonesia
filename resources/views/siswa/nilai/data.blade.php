<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- STYLE -->
  <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" type="text/css">
  <title>Dashboard Siswa - Nilai</title>
</head>
<body>
  <div class="wrapper">
    <div class="header">
      <img src="{{ asset('assets/img/header.jpg') }}">
    </div>
    <div class="navbar">
      <ul>
        <li style="margin-right: 5px;"><a href="/siswa/home">Beranda</a></li>
        <li style="margin-right: 5px;"><a class="active" href="/siswa/data-nilai">Data Nilai</a></li>

        <li style="float: right;"><a class="actives" href="/logout">Logout</a></li>
      </ul>
    </div>
    <div class="konten">
      <div class="konten-kiri">
        <div class="kiri-atas" style="padding-bottom: 10px;">
            <h2>Informasi Admin</h2><br>
            NIS: {{ Session('user') }} <br>
            Nama: {{ Session('nama') }} <br>
            Kelas: {{ Session('kelas') }} <br>
            Jurusan: {{ Session('jurusan') }} <br>
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
        <h1 align="center">Data Nilai</h1><br>
        <table border="1" width="100%">
            <tr>
              <th>No</th>
              <th>Nama Guru</th>
              <th>Mapel</th>
              <th>UH</th>
              <th>UTS</th>
              <th>UAS</th>
              <th>NA</th>
            </tr>
            @foreach ($data as $key => $item)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->nama_guru }}</td>
                <td>{{ $item->nama_mapel }}</td>
                <td>{{ $item->uh }}</td>
                <td>{{ $item->uts }}</td>
                <td>{{ $item->uas }}</td>
                <td>{{ $item->na }}</td>
              </tr>
            @endforeach
        </table>
    </div>
    </div>
    <div class="footer">SMKN 1 Cibinong &copy{{ date('Y') }}</div>
  </div>
</body>
</html>
