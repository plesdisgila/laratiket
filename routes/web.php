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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'TamuController@index');
Route::get('/acara/{slug}', 'TamuController@slug')->name('acara.detail');
Route::resource('acara', 'TamuController');

Route::get('/invoice/{invoice}', 'InvoiceController@show');


Route::get('/tentang', 'ContactController@index');
Route::get('hubungi-kami', 'ContactController@create');
Route::post('hubungi-kami', 'ContactController@store');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/', 'HomeController@index')->name('home');

    //Route::get('/admin', 'AdminController@index');

    /*Kategori*/
    Route::resource('/admin/kategori', 'KategoriController');

    /*Acara*/
    Route::resource('/admin/acara', 'AcaraController');

    /*Transaksi*/
    Route::resource('/admin/transaksi', 'TransaksiController');
});





