<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function viewData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        $data_siswa = \DB::select("SELECT * FROM vsiswa");
        $data_kelas = \DB::select("SELECT * FROM kelas");

        return view('admin.siswa.data', [
            'data_siswa' => $data_siswa,
            'data_kelas' => $data_kelas
        ]);
    }

    public function insertData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::insert("INSERT INTO siswa VALUES ('$r->nis', '$r->nama', '$r->jk', '$r->alamat', '$r->password', '$r->id_kelas')");

        return redirect('/admin/data-siswa');
    }

    public function editData(Request $r, $nis) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        $data = \DB::select("SELECT * FROM siswa WHERE nis = '$nis'");
        $data_kelas = \DB::select("SELECT * FROM kelas");

        if (count($data) === 0) {
            return redirect('/admin/data-siswa');
        }


        return view('admin.siswa.edit', [
            'data' => $data[0],
            'data_kelas' => $data_kelas
        ]);
    }

    public function updateData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::update("UPDATE siswa SET nama='$r->nama', jk='$r->jk', alamat='$r->alamat', password='$r->password', id_kelas='$r->id_kelas' WHERE nis='$r->nis'");

        return redirect('/admin/data-siswa');
    }

    public function deleteData(Request $r, $nis) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::delete("DELETE FROM siswa WHERE nis = '$nis'");

        return redirect('/admin/data-siswa');
    }
}
