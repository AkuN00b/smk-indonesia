<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function viewLoginAdmin(Request $r){
        $role_check = $r->session()->get('role');

        if ($r->session()->has('user') && $role_check === 'admin'){
            return redirect()->route('admin.home');
        }

        return view('admin.login');
    }

    public function processLoginAdmin(Request $r){
        $admin = \DB::select("
            SELECT * FROM admin WHERE username = '$r->username' AND password = '$r->password'
        ");

        if (count($admin) === 0){
            return redirect()->route('admin.login');
        }

        session([
            'user' => $admin[0]->username,
            'role' => 'admin'
        ]);

        return redirect()->route('admin.home');
    }

    public function viewLoginGuru(Request $r){
        $role_check = $r->session()->get('role');

        if ($r->session()->has('user') && $role_check === 'guru'){
            return redirect()->route('guru.home');;
        }

        return view('guru.login');
    }

    public function processLoginGuru(Request $r){
        $admin = \DB::select("
            SELECT * FROM guru WHERE nip = '$r->nip' AND password = '$r->password'
        ");

        if (count($admin) === 0){
            return redirect()->route('guru.login');
        }

        session([
            'user' => $admin[0]->nip,
            'nama' => $admin[0]->nama,
            'jk' => $admin[0]->jk,
            'alamat' => $admin[0]->alamat,
            'role' => 'guru'
        ]);

        return redirect()->route('guru.home');
    }

    public function viewLoginSiswa(Request $r){
        $role_check = $r->session()->get('role');

        if ($r->session()->has('user') && $role_check === 'siswa'){
            return redirect()->route('siswa.home');
        }

        return view('siswa.login');
    }

    public function processLoginSIswa(Request $r){
        $admin = \DB::select("
            SELECT * FROM siswa WHERE nis = '$r->nis' AND password = '$r->password'
        ");

        if (count($admin) === 0){
            return redirect()->route('siswa.login');
        }

        $id_kelas = $admin[0]->id_kelas;
        $kelas = \DB::select("
            SELECT * FROM kelas WHERE id = '$id_kelas'
        ");

        $id_jurusan = $kelas[0]->id_jurusan;
        $jurusan = \DB::select("
            SELECT * FROM jurusan WHERE id = '$id_jurusan'
        ");

        session([
            'user' => $admin[0]->nis,
            'nama' => $admin[0]->nama,
            'kelas' => $kelas[0]->nama,
            'jurusan' => $jurusan[0]->nama,
            'jk' => $admin[0]->jk,
            'alamat' => $admin[0]->alamat,
            'role' => 'siswa'
        ]);

        return redirect()->route('siswa.home');
    }

    public function logout(Request $r){
        $role = $r->session()->get('role');

        $r->session()->forget(['user', 'role']);

        if ($role === 'admin'){
            return redirect()->route('admin.login');
        } else if ($role === 'guru'){
            return redirect()->route('guru.login');
        } else {
            return redirect()->route('siswa.login');
        }
    }
}
