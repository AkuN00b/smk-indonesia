<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function viewData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'guru' ) {
            return redirect('/guru/login');
        }

        $nip_user = $r->session()->get('user');

        $data = \DB::select("SELECT * FROM vnilai WHERE nip='$nip_user'");
        $data_kelas = \DB::select("SELECT * from vmengajar WHERE nip='$nip_user'");

        return view('guru.nilai.data', [
            'data' => $data,
            'data_kelas'=> $data_kelas
        ]);
    }

    public function viewInsert(Request $r, $id_mengajar){
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'guru' ) {
            return redirect('/guru/login');
        }

        $nip_user = $r->session()->get('user');

        $data_mengajar = \DB::select("SELECT * FROM mengajar WHERE id='$id_mengajar'")[0];
        $data_siswa = \DB::select("SELECT * from siswa where id_kelas='$data_mengajar->id_kelas'");
        $data_vmengajar = \DB::select("SELECT * FROM vmengajar WHERE nip='$nip_user' AND id='$data_mengajar->id'");

        return view('guru.nilai.tambah_data', [
            'data_siswa' => $data_siswa,
            'data_vmengajar' => $data_vmengajar
        ]);
    }

    public function insertData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'guru' ) {
            return redirect('/guru/login');
        }

        $na = ($r->uh + $r->uts + $r->uas) / 3;
        $na = number_format($na, 2);

        \DB::insert("INSERT INTO nilai VALUES (null, '$r->uh', '$r->uts', '$r->uas', '$na', '$r->mengajar', '$r->siswa')");

        return redirect('/guru/data-nilai');
    }


    public function editData(Request $r, $id) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'guru' ) {
            return redirect('/guru/login');
        }

        $data_nilai = \DB::select("SELECT * from vnilai where id='$id'");

        return view('guru.nilai.edit_data', [
            'data_nilai' => $data_nilai[0]
        ]);

    }

    public function updateData(Request $r) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'guru' ) {
            return redirect('/guru/login');
        }

        $na = ($r->uh + $r->uts + $r->uas) / 3;
        $na = number_format($na, 2);

        \DB::update("UPDATE nilai SET uh = '$r->uh', uts='$r->uts', uas='$r->uas', na='$na' WHERE id = '$r->id'");

        return redirect('/guru/data-nilai');
    }

    public function deleteData(Request $r, $id) {
        $role_check = $r->session()->get('role');

        if (!$r->session()->has('user') || $role_check !== 'guru' ) {
            return redirect('/guru/login');
        }

        \DB::delete("DELETE FROM nilai WHERE id = '$id'");

        return redirect('/guru/data-nilai');
    }
}
