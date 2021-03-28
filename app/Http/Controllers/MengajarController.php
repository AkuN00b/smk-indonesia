<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MengajarController extends Controller
{
    public function viewData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        $data = \DB::select("SELECT * FROM vmengajar");

        $data_guru = \DB::select("SELECT * FROM guru");
        $data_mapel = \DB::select("SELECT * FROM mapel");
        $data_kelas = \DB::select("SELECT * FROM kelas");

        return view('admin.mengajar.data', [
            'data' => $data,
            'data_guru' => $data_guru,
            'data_mapel' => $data_mapel,
            'data_kelas' => $data_kelas,
        ]);
    }

    public function insertData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        $cek = \DB::select('SELECT * FROM mengajar WHERE id_mapel = ? && id_kelas = ?', [$r->id_mapel, $r->id_kelas]);
        if (count($cek) === 0){
            \DB::insert("INSERT INTO mengajar VALUES (null, '$r->nip', '$r->id_mapel', '$r->id_kelas')");
            return redirect()->route('admin.mengajar');
        }

        return redirect()->route('admin.mengajar')->with('alert', 'Guru Sudah Ada');
    }

    public function editData(Request $r, $id) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        $data = \DB::select("SELECT * FROM mengajar WHERE id = '$id'");

        if (count($data) === 0) {
            return redirect('/admin/data-mengajar');
        }

        $data_guru = \DB::select("SELECT * FROM guru");
        $data_mapel = \DB::select("SELECT * FROM mapel");
        $data_kelas = \DB::select("SELECT * FROM kelas");

        return view('admin.mengajar.edit', [
            'data' => $data[0],
            'data_guru' => $data_guru,
            'data_mapel' => $data_mapel,
            'data_kelas' => $data_kelas,
        ]);
    }

    public function updateData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::update("UPDATE mengajar SET nip='$r->nip', id_mapel='$r->id_mapel', id_kelas='$r->id_kelas' WHERE id='$r->id'");

        return redirect('/admin/data-mengajar');
    }

    public function deleteData(Request $r, $id) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::delete("DELETE FROM mengajar WHERE id = '$id'");

        return redirect('/admin/data-mengajar');
    }
}
