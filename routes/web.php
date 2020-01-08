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

Route::get('administrator', function () {
    return view('pelapak/master');
});
Route::get('administrator/produk', 'ProdukController@add');
Route::get('administrator/produk/add', 'ProdukController@form_tambah');
// Route::post('adminisrator/produk/store', 'ProdukController@store');
Route::post('administrator/produk/store_produk', 'ProdukController@store_produk');
Route::get('administrator/produk/edit/{id}', 'ProdukController@edit');
Route::post('administrator/produk/update/{id}', 'ProdukController@update');
Route::get('administrator/produk/hapus/{id}', 'ProdukController@hapus');
