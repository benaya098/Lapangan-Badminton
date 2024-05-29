<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/admin')->namespace('App\Http\Controllers')->group(function(){
    Route::match(['post', 'get'], 'login', 'LoginController@Login');
    Route::get('index', 'AdminController@index');
    Route::get('logout', 'AdminController@Logout');
    Route::get('tambah', 'AdminController@create')->name('indextambah');
    Route::get('tambahLokasi', 'LokasiController@index')->name('indexlokasi');
    Route::get('member', 'MemberController@index');
    Route::post('Lokasi/index', 'LokasiController@store')->name('tambahlokasi');
    Route::post('Pengelola/index', 'AdminController@createpengelola')->name('tambahpengelola');
    Route::get('lapangan', 'LapanganController@index')->name('indexlapangan');
    Route::post('Lapangan/index', 'LapanganController@store')->name('tambahlapangan');
});






Route::prefix('/pengelola')->namespace('App\Http\Controllers')->group(function(){
    Route::match(['post', 'get'], 'login', 'PengelolaController@Login');
    Route::get('index', 'PengelolaController@index');
    Route::get('logout', 'PengelolaController@Logout');
});