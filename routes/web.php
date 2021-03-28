<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', fn () => redirect('/admin/login'))->name('primary');

// ADMIN

Route::get('/admin/login', 'LoginController@viewLoginAdmin')->name('admin.login');
Route::post('/admin/login', 'LoginController@processLoginAdmin')->name('admin.aksi.login');

Route::get('/admin/home', 'HomeController@viewAdmin')->name('admin.home');

// ADMIN [JURUSAN]

Route::get('admin/data-jurusan', 'JurusanController@viewData')->name('admin.jurusan');
Route::post('admin/tambah-jurusan', 'JurusanController@insertData')->name('admin.jurusan.tambah');
Route::get('admin/edit-jurusan/{id}', 'JurusanController@editData')->name('admin.jurusan.edit');
Route::post('admin/ubah-jurusan', 'JurusanController@updateData')->name('admin.jurusan.update');
Route::get('admin/hapus-jurusan/{id}', 'JurusanController@deleteData')->name('admin.jurusan.hapus');

// ADMIN [GURU]

Route::get('admin/data-guru', 'GuruController@viewData')->name('admin.guru');
Route::post('admin/tambah-guru', 'GuruController@insertData')->name('admin.guru.tambah');
Route::get('admin/edit-guru/{nip}', 'GuruController@editData')->name('admin.guru.edit');
Route::post('admin/ubah-guru', 'GuruController@updateData')->name('admin.guru.update');
Route::get('admin/hapus-guru/{nip}', 'GuruController@deleteData')->name('admin.guru.hapus');

// ADMIN [KELAS]

Route::get('admin/data-kelas', 'KelasController@viewData')->name('admin.kelas');
Route::post('admin/tambah-kelas', 'KelasController@insertData')->name('admin.kelas.tambah');
Route::get('admin/edit-kelas/{id}', 'KelasController@editData')->name('admin.kelas.edit');
Route::post('admin/ubah-kelas', 'KelasController@updateData')->name('admin.kelas.update');
Route::get('admin/hapus-kelas/{id}', 'KelasController@deleteData')->name('admin.kelas.hapus');

// ADMIN [MAPEL]

Route::get('admin/data-mapel', 'MapelController@viewData')->name('admin.mapel');
Route::post('admin/tambah-mapel', 'MapelController@insertData')->name('admin.mapel.tambah');
Route::get('admin/edit-mapel/{id}', 'MapelController@editData')->name('admin.mapel.edit');
Route::post('admin/ubah-mapel', 'MapelController@updateData')->name('admin.mapel.update');
Route::get('admin/hapus-mapel/{id}', 'MapelController@deleteData')->name('admin.mapel.hapus');

// ADMIN [SISWA]

Route::get('admin/data-siswa', 'SiswaController@viewData')->name('admin.siswa');
Route::post('admin/tambah-siswa', 'SiswaController@insertData')->name('admin.siswa.tambah');
Route::get('admin/edit-siswa/{nis}', 'SiswaController@editData')->name('admin.siswa.edit');
Route::post('admin/ubah-siswa', 'SiswaController@updateData')->name('admin.siswa.update');
Route::get('admin/hapus-siswa/{nis}', 'SiswaController@deleteData')->name('admin.siswa.delete');

// ADMIN [MENGAJAR]

Route::get('admin/data-mengajar', 'MengajarController@viewData')->name('admin.mengajar');
Route::post('admin/tambah-mengajar', 'MengajarController@insertData')->name('admin.mengajar.tambah');
Route::get('admin/edit-mengajar/{id}', 'MengajarController@editData')->name('admin.mengajar.edit');
Route::post('admin/ubah-mengajar', 'MengajarController@updateData')->name('admin.mengajar.update');
Route::get('admin/hapus-mengajar/{id}', 'MengajarController@deleteData')->name('admin.mengajar.delete');

// GURU

Route::get('/guru/login', 'LoginController@viewLoginGuru')->name('guru.login');
Route::post('/guru/login', 'LoginController@processLoginGuru')->name('guru.aksi.login');

Route::get('/guru/home', 'HomeController@viewGuru')->name('guru.home');

// GURU [NILAI]

Route::get('guru/data-nilai', 'NilaiController@viewData')->name('guru.nilai');
Route::get('guru/lihat/tambah-nilai/{id}', 'NilaiController@viewInsert')->name('guru.nilai.tambah');
Route::post('guru/tambah-nilai', 'NilaiController@insertData')->name('guru.nilai.aksi.tambah');
Route::get('guru/edit-nilai/{id}', 'NilaiController@editData')->name('guru.nilai.edit');
Route::post('guru/edit-nilai', 'NilaiController@updateData')->name('guru.nilai.aksi.edit');
Route::get('guru/hapus-nilai/{id}', 'NilaiController@deleteData')->name('guru.nilai.delete');

// SISWA

Route::get('/siswa/login', 'LoginController@viewLoginSiswa')->name('siswa.login');
Route::post('/siswa/login', 'LoginController@processLoginSiswa')->name('siswa.aksi.login');

Route::get('/siswa/home', 'HomeController@viewSiswa')->name('siswa.home');

// SISWA [NILAI]

Route::get('siswa/data-nilai', 'NilaiSiswaController@viewData')->name('siswa.nilai');

Route::get('/logout', 'LoginController@logout')->name('logout');
