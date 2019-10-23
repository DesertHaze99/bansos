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

Route::get('/','DashboardController@index');

Route::resource('obat','ObatController');
Route::get('/obatAjax','ObatController@obatAjax');

Route::resource('interaksi', 'InteraksiController');
Route::get('/interaksiAjax','InteraksiController@InteraksiAjax');

Auth::routes();

Route::resource('bentukObat','BentukObatController');
Route::get('/bentukObatAjax','BentukObatController@bentukObatAjax');

Route::resource('merkDagang','MerkDagangController');
Route::get('/merekDagangAjax','MerkDagangController@merekDagangAjax');

Route::resource('dosis','DosisController');
Route::get('/dosisAjax','DosisController@dosisAjax');

Route::resource('kontraindikasi','KontraindikasiController');
Route::get('/kontraindikasiAjax','KontraindikasiController@kontraindikasiAjax');

Route::resource('pasien','PasienController');
Route::get('/pasienAjax','PasienController@pasienAjax');
