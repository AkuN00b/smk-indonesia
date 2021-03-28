<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function viewData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        $data = \DB::select("SELECT * FROM jurusan");

        return view('admin.jurusan.data', [
            'data_jurusan' => $data
        ]);
    }

    public function insertData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::insert("INSERT INTO jurusan VALUES (null, '$r->nama')");

        return redirect('/admin/data-jurusan');
    }

    public function editData(Request $r, $id) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        $data = \DB::select("SELECT * FROM jurusan WHERE id = '$id'");

        if (count($data) === 0) {
            return redirect('/admin/data-jurusan');
        }


        return view('admin.jurusan.edit', [
            'data' => $data[0]
        ]);
    }

    public function updateData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::update("UPDATE jurusan SET nama = '$r->nama' WHERE id = '$r->id'");

        return redirect('/admin/data-jurusan');
    }

    public function deleteData(Request $r, $id) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::delete("DELETE FROM jurusan WHERE id = '$id'");

        return redirect('/admin/data-jurusan');
    }
}
