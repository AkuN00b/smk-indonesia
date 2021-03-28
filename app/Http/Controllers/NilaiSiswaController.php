<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiSiswaController extends Controller
{
    public function viewData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'siswa') {
            return redirect('/siswa/login');
        }

        $nis_user = $r->session()->get('user');

        $data = \DB::select("SELECT * FROM vnilai WHERE nis='$nis_user'");

        return view('siswa.nilai.data', [
            'data' => $data
        ]);
    }
}
