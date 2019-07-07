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
  return view('pages.welcome');
})->middleware(['guest']);

Route::group([
  'middleware'=> ['auth'],
], function($route){

  $route->get('user/insert/{id_user}', 'UserController@get_satpam');
  $route->post('user/insert/{id_user}', 'UserController@insert_satpam');
  $route->resource('user', 'UserController');
  $route->resource('booking', 'BookingController');

  // Satpam page for admin
  $route->resource('satpam', 'SatpamController');

  $route->get('usr/penilaian', 'PenilaianController@index');
  $route->get('penilaian/tes', 'PenilaianController@nilai');
  $route->resource('penilaian', 'PenilaianController');
  $route->resource('role', 'RoleController');
  $route->resource('dokumen_absensi', 'AbsensiController');
  $route->resource('catatan', 'CatatanController');
});

Auth::routes();

Route::get('/home', function() {
  return view('pages.dashboard');
})->name('home');
