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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('register','Controller@register')->middleware('auth');;
Route::post('register','Controller@store')->name('register')->middleware('auth');
Route::get('/beranda', 'DashboardController@index')->name('home')->middleware('auth');
Route::get('/', 'DashboardController@index')->name('home')->middleware('auth');

Route::resource('muzzaki','MuzzakiController')->middleware('auth');
Route::get('muzzaki-data','MuzzakiController@data')->name('muzzaki.data')->middleware('auth');
Route::get('muzzaki-hapus/{id}','MuzzakiController@destroy')->name('muzzaki.hapus')->middleware('auth');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('zis-siswa','TransaksiPenerimaanController@zakatsiswa')->middleware('auth');
Route::get('zis-muzzaki','TransaksiPenerimaanController@zakatmuzzaki')->middleware('auth');
Route::get('zis-data/{data}','TransaksiPenerimaanController@data')->name('zis.data');
Route::get('zis-form/{data}/{id}','TransaksiPenerimaanController@form')->name('zis.form')->middleware('auth');
Route::get('zis-hapus/{id}','TransaksiPenerimaanController@destroy')->name('zis.hapus')->middleware('auth');
Route::post('zis-simpan/{jenis}','TransaksiPenerimaanController@store')->name('zis.simpan')->middleware('auth');

Route::get('siswa-by-kelas/{idkelas}','MuzzakiController@siswa_by_kelas')->middleware('auth');
Route::get('zakat-hapus/{id}','TransaksiPenerimaanController@destroy')->middleware('auth');

Route::get('laporan','LaporanController@index')->middleware('auth');
Route::get('laporan-data/{tgl}','LaporanController@data')->middleware('auth');
Route::get('cetak/{kwitansi}/{id}','TransaksiPenerimaanController@cetakkwitansi')->middleware('auth');
Route::get('laporan-per-kelas','LaporanController@perkelas')->middleware('auth');
Route::get('laporan-per-kelas-data/{tgl}','LaporanController@perkelas_data')->middleware('auth');
Route::get('logout',function(){
    Auth::logout();
    return redirect('/');
});