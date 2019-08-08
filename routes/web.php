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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/barang/headphone','BarangController@headphone')->name('headphone');
Route::get('/barang/earphone','BarangController@earphone')->name('earphone');
Route::get('/barang/speaker','BarangController@speaker')->name('speaker');
Route::get('/barang/headset','BarangController@headset')->name('headset');
Route::get('/barang/cari','BarangController@cari')->name('barang.cari');
Route::resource('barang','BarangController');
Route::resource('cart','CartController');
Route::resource('transaksi','TransaksiController');