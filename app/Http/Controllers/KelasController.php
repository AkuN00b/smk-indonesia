<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function viewData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        $data_kelas = \DB::select("SELECT * FROM vkelas");
        $data_jurusan = \DB::select("SELECT * FROM jurusan");

        return view('admin.kelas.data', [
            'data_kelas' => $data_kelas,
            'data_jurusan' => $data_jurusan
        ]);
    }

    public function insertData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::insert("INSERT INTO kelas VALUES (null, '$r->nama', '$r->id_jurusan')");

        return redirect('/admin/data-kelas');
    }

    public function editData(Request $r, $id) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        $data = \DB::select("SELECT * FROM kelas WHERE id = '$id'");
        $data_jurusan = \DB::select("SELECT * FROM jurusan");

        if (count($data) === 0) {
            return redirect('/admin/data-kelas');
        }


        return view('admin.kelas.edit', [
            'data' => $data[0],
            'data_jurusan' => $data_jurusan
        ]);
    }

    public function updateData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::update("UPDATE kelas SET nama='$r->nama', id_jurusan='$r->id_jurusan' WHERE id='$r->id'");

        return redirect('/admin/data-kelas');
    }

    public function deleteData(Request $r, $id) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::delete("DELETE FROM kelas WHERE id = '$id'");

        return redirect('/admin/data-kelas');
    }
}
