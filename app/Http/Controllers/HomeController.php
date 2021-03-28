<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewAdmin(Request $r){
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'admin'){
            return redirect('/admin/login');
        }

        return view('admin.home');
    }

    public function viewGuru(Request $r){
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'guru'){
            return redirect('/guru/login');
        }

        return view('guru.home');
    }

    public function viewSiswa(Request $r){
        $role_check = $r->session()->get('role');

        if(!$r->session()->has('user') || $role_check !== 'siswa'){
            return redirect('/siswa/login');
        }

        return view('siswa.home');
    }
}
