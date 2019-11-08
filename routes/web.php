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
Route::post('detailObat','ObatController@detailObat');

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

Route::resource('resep','ResepController');
Route::get('resepAjax','ResepController@resepAjax');
Route::post('pasienForResep','ResepController@pasienForResep')->name('pasienForResep');
Route::get('/pasienResepAjax','ResepController@pasienResepAjax');
Route::prefix('resep')->group(function(){
	Route::post('show', 'ResepController@show');
	Route::get('{id}/detailResep','ResepController@detailResep')->name('detailResep');
	Route::get('{id}/qr','DetailResepController@qrcode')->name('printResep');
	Route::get('{id}/detailResepAjax','DetailResepController@detailResepAjax');
	Route::get('{resepId}/detailResep/{detailObatId}/detailObat','DetailResepController@detail');
});
Route::post('detailObatAjax','ResepController@detailObatAjax');

Route::resource('detailResep','DetailResepController');

