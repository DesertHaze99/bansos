<?php

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
Auth::routes();

Route::get('/','LandingController@index');
Route::post('/pengaduan', 'LandingController@tambahPengaduan')->name('tambahPengaduan');


Route::get('/admin','AdminController@index');


Route::get('/admin/penduduk','PendudukController@index');
Route::get('/pendudukAJAX','PendudukController@pendudukAJAX');
Route::post('/fetchKabupaten', 'PendudukController@fetchKabupaten')->name('fecthKabupaten');
Route::get('/admin/penduduk-propinsi', 'PendudukController@dataKAB');
Route::get('/admin/penduduk-kabupaten', 'PendudukController@dataKEC');
Route::get('/admin/penduduk-kecamatan', 'PendudukController@dataDESA');
Route::post('/admin/tambahPenduduk', 'PendudukController@tambahPenduduk')->name('tambahPenduduk');
Route::post('/admin/editPenduduk{IDBDT}', 'PendudukController@editPenduduk')->name('editPenduduk');


Route::get('/admin/penerima','PenerimaBantuanController@index');
Route::get('/penerimaAJAX','PenerimaBantuanController@penerimaAJAX');
Route::get('/admin/penerimaSembako','PenerimaBantuanController@sembako');
Route::get('/penerimaSembakoAJAX','PenerimaBantuanController@penerimaSembakoAJAX');
Route::get('/admin/penerimaRaskin','PenerimaBantuanController@raskin');
Route::get('/penerimaRaskinAJAX','PenerimaBantuanController@penerimaRaskinAJAX');
Route::get('/admin/penerimaBLT','PenerimaBantuanController@blt');
Route::get('/penerimaBLTAJAX','PenerimaBantuanController@penerimaBLTAJAX');
Route::get('/admin/penerimaPNPMM','PenerimaBantuanController@pnpmm');
Route::get('/penerimaPNPMMAJAX','PenerimaBantuanController@penerimaPNPMMAJAX');
Route::get('/admin/verifikasi','PenerimaBantuanController@verifikasi');
Route::get('/verifikasiAJAX','PenerimaBantuanController@verifikasiAJAX');
Route::get('search', 'PenerimaBantuanController@search')->name('search');
Route::get('dataAutosearch', 'PenerimaBantuanController@dataAutosearch')->name('dataAutosearch');
Route::post('/admin/tambahPenerimaBantuan', 'PenerimaBantuanController@tambahPenerimaBantuan')->name('tambahPenerimaBantuan');
Route::post('/admin/editBantuan{id_mapping}', 'PenerimaBantuanController@editBantuan')->name('editBantuan');

Route::get('/admin/pengaduan','PengaduanController@index');
Route::get('/pengaduanAJAX','PengaduanController@pengaduanAJAX');
Route::post('/admin/verifikasiPengaduan{id_pengaduan}', 'PengaduanController@verifikasiPengaduan')->name('verifikasiPengaduan');

Route::get('/admin/parameter/agama','AgamaController@index');
Route::get('/agamaAJAX','AgamaController@agamaAJAX');
Route::post('/admin/editAgama{id_agama}', 'AgamaController@editAgama')->name('editAgama');
Route::post('/admin/tambahAgama', 'AgamaController@tambahAgama')->name('tambahAgama');


Route::get('/admin/parameter/jenis_bantuan','JenisBantuanController@index');
Route::get('/jenisBantuanAJAX','JenisBantuanController@jenisBantuanAJAX');
Route::post('/admin/editJenisBantuan{id_bantuan}', 'JenisBantuanController@editJenisBantuan')->name('editJenisBantuan');
Route::post('/admin/tambahJenisBantuan', 'JenisBantuanController@tambahJenisBantuan')->name('tambahJenisBantuan');


Route::get('/admin/parameter/golongan','GolonganController@index');
Route::get('/golonganAJAX','GolonganController@golonganAJAX');
Route::post('/admin/editGolongan{id_golongan}', 'GolonganController@editGolongan')->name('editGolongan');
Route::post('/admin/tambahGolongan', 'GolonganController@tambahGolongan')->name('tambahGolongan');

Route::get('/admin/artikel','ArtikelController@index');
Route::get('/artikelAJAX','ArtikelController@artikelAJAX');
Route::post('/admin/tambahArtikel', 'ArtikelController@store')->name('tambahArtikel');
Route::post('/admin/editArtikel{id_artikel}', 'ArtikelController@editArtikel')->name('editArtikel');