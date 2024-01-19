<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');

Route::get('/registerpengajar', 'App\Http\Controllers\AuthController@register_pengajar')->name('register_pengajar');
Route::get('/registerpelajar', 'App\Http\Controllers\AuthController@register_pelajar')->name('register_pelajar');

Route::post('/proses_register_pelajar', 'App\Http\Controllers\AuthController@proses_register_pelajar')->name('proses_register_pelajar');
Route::post('/proses_register_pengajar', 'App\Http\Controllers\AuthController@proses_register_pengajar')->name('proses_register_pengajar');


Route::group(['middleware' => ['auth']], function()
{
    // cek_login yang di inisialisasi di kernel tadi 
    Route::group(['middleware' => ['cek_login:pengajar']], function()
    {
        Route::get('/dashboardadmin', 'App\Http\Controllers\PengajarController@index')->name('Pengajar');
        Route::get('/tambah', 'App\Http\Controllers\PengajarController@tambah')->name('Pengajar');
        Route::post('/proses_tambah', 'App\Http\Controllers\PengajarController@proses_tambah')->name('Pengajar');
        Route::get('/hapus/{id}', 'App\Http\Controllers\PengajarController@hapus')->name('Pengajar');
        Route::get('/edit/{id}', 'App\Http\Controllers\PengajarController@edit')->name('Pengajar');
        Route::post('/proses_edit', 'App\Http\Controllers\PengajarController@proses_edit')->name('Pengajar');

    });

    Route::group(['middleware' => ['cek_login:pelajar']], function()
    {
        Route::get('/dashboardpelajar', 'App\Http\Controllers\PelajarController@index')->name('Pelajar');
        Route::get('/proses_beli', 'App\Http\Controllers\PelajarController@proses_beli')->name('Pelajar');
        Route::get('/payment', 'App\Http\Controllers\PaymentController@payment');
        Route::post('/payment', 'App\Http\Controllers\PaymentController@payment_post');
    });
});

Route::get('/logout','App\Http\Controllers\AuthController@logout')->name('logout');
