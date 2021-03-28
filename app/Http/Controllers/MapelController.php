<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function viewData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        $data = \DB::select("SELECT * FROM mapel");

        return view('admin.mapel.data', [
            'data' => $data
        ]);
    }

    public function insertData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::insert("INSERT INTO mapel VALUES (null, '$r->nama')");

        return redirect('/admin/data-mapel');
    }

    public function editData(Request $r, $id) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        $data = \DB::select("SELECT * FROM mapel WHERE id = '$id'");

        if (count($data) === 0) {
            return redirect('/admin/data-mapel');
        }


        return view('admin.mapel.edit', [
            'data' => $data[0]
        ]);
    }

    public function updateData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::update("UPDATE mapel SET nama='$r->nama' WHERE id='$r->id'");

        return redirect('/admin/data-mapel');
    }

    public function deleteData(Request $r, $id) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::delete("DELETE FROM mapel WHERE id = '$id'");

        return redirect('/admin/data-mapel');
    }
}
