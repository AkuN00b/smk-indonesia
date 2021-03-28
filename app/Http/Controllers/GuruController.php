<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function viewData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        $data = \DB::select("SELECT * FROM guru");

        return view('admin.guru.data', [
            'data_guru' => $data
        ]);
    }

    public function insertData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::insert("INSERT INTO guru VALUES ('$r->nip', '$r->nama', '$r->jk', '$r->alamat', '$r->password')");

        return redirect('/admin/data-guru');
    }

    public function editData(Request $r, $nip) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        $data = \DB::select("SELECT * FROM guru WHERE nip = '$nip'");

        if (count($data) === 0) {
            return redirect('/admin/data-guru');
        }

        return view('admin.guru.edit', [
            'data' => $data[0]
        ]);
    }

    public function updateData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::update("UPDATE guru SET nip='$r->nip', nama='$r->nama', jk='$r->jk', alamat='$r->alamat', password='$r->password' WHERE nip='$r->nip'");

        return redirect('/admin/data-guru');
    }

    public function deleteData(Request $r, $nip) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin' ) {
            return redirect('/admin/login');
        }

        \DB::delete("DELETE FROM guru WHERE nip = '$nip'");

        return redirect('/admin/data-guru');
    }
}
