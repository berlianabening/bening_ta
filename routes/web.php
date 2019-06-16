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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('user', 'UserController');
Route::resource('booking', 'BookingController');
Route::resource('satpam', 'SatpamController');
Route::get('penilaian/tes', 'PenilaianController@nilai');
Route::resource('penilaian', 'PenilaianController');
Route::resource('role', 'RoleController');
Route::resource('dokumen_absensi', 'AbsensiController');
Route::resource('catatan', 'CatatanController');
