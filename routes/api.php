<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
// use Symfony\Component\Routing\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('produk', 'ProdukController@index');
Route::get('produk/{id}', 'ProdukController@produkId');
Route::get('option', 'ProdukController@option');
Route::get('prdk', 'ProdukController@prdk');
Route::get('kategori', 'ProdukController@kategori');
// Route::group(['middleware' => 'prodmid'], function () {
//     Route::get('produk', 'ProdukController@index');
//     Route::get('produk/{id}', 'ProdukController@produkId');
//     Route::get('option', 'ProdukController@option');
//     Route::get('prdk', 'ProdukController@prdk');
//     Route::get('kategori', 'ProdukController@kategori');
// });
