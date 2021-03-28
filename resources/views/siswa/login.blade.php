<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- STYLE -->
  <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet" type="text/css">
  <title>Login Siswa</title>
</head>
<body>
  <div class="wrapper">
    <div class="header">
      <img src="{{ asset('assets/img/header.jpg') }}">
    </div>
    <div class="navbar">
      <ul>
        <li><a class="active" href="{{ route('siswa.login') }}">Beranda</a></li>
      </ul>
    </div>
    <div class="konten">
      <div class="konten-kiri">
        <div class="kiri-atas">
          <h2>Login Siswa</h2>
            <div class="menu-login" align="center">
              <a class="button-login" href="{{ route('admin.login') }}">Admin</a>
              <a class="button-login" href="{{ route('guru.login') }}">Guru</a>
              <a class="button-login active" href="{{ route('siswa.login') }}">Siswa</a>
            </div>
          <table name="form-login" align="center">
            <form action="{{ route('siswa.aksi.login') }}" method="post">
              @csrf

              <tr>
                <td><label>NIS</label></td>
                <td><input type="text" name="nis" autocomplete="no"></td>
              </tr>
              <tr>
                <td><label>Password</label></td>
                <td><input type="password" name="password" autocomplete="no"></td>
              </tr>
              <tr>
                <td colspan="2"><button type="submit">Login</button></td>
              </tr>
            </form>
          </table>
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
          SELAMAT DATANG <br>
          di website Penilaian SMK Negeri 1 Cibinong
        </h1>
      </div>
    </div>
    <div class="footer">SMKN 1 Cibinong &copy{{ date('Y') }} </div>
  </div>
</body>
</html>
