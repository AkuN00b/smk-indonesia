<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- STYLE -->
  <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" type="text/css">
  <title>Dashboard Admin - Mengajar</title>
</head>
<body>
    @if (session('alert'))
        <script>alert('Data Sudah Tersedia')</script>
    @endif
  <div class="wrapper">
    <div class="header">
      <img src="{{ asset('assets/img/header.jpg') }}">
    </div>
    <div class="navbar">
      <ul>
        <li style="margin-right: 5px;"><a href="/admin/home">Beranda</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-jurusan">Jurusan</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-guru">Guru</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-kelas">Kelas</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-mapel">Mapel</a></li>
        <li style="margin-right: 5px;"><a href="/admin/data-siswa">Siswa</a></li>
        <li style="margin-right: 5px;"><a class="active" href="/admin/data-mengajar">Mengajar</a></li>

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
            Mengajar
        </h1><br>
        <form action="/admin/tambah-mengajar" method="post">
            @csrf
            <label>Guru</label>
            <select name="nip">
              @foreach ($data_guru as $item)
                <option value="{{ $item->nip }}">
                  {{ $item->nama }}
                </option>
              @endforeach
            </select><br>

            <label>Mapel</label>
            <select name="id_mapel">
              @foreach ($data_mapel as $item)
                <option value="{{ $item->id }}">
                  {{ $item->nama }}
                </option>
              @endforeach
            </select><br>

            <label>Kelas</label>
            <select name="id_kelas">
              @foreach ($data_kelas as $item)
                <option value="{{ $item->id }}">
                  {{ $item->nama }}
                </option>
              @endforeach
            </select><br>

            <button type="submit">Tambah</button>
          </form>
          <br>

          <table border="1" width="100%">
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama Guru</th>
              <th>Mapel</th>
              <th>Kelas</th>
              <th>Opsi</th>
            </tr>
            @foreach ($data as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $item->nip }}</td>
              <td>{{ $item->guru }}</td>
              <td>{{ $item->mapel }}</td>
              <td>{{ $item->kelas }}</td>
              <td>
                <button class="dir" style="background-color: orange;"><a href="/admin/edit-mengajar/{{ $item->id }}"  style="color: white; text-decoration: none;">Edit</a></button>
                <button class="dir" style="background-color: red;"><a href="/admin/hapus-mengajar/{{ $item->id }}"  style="color: white; text-decoration: none;">Hapus</a></button>
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
