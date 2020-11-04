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
    return view('welcome');
});

Auth::routes();
Route::get('/api/mahasiswa', 'ApiController@mahasiswa');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/mahasiswa', 'AdminController@dataMhs')->name('dataMhs');
    Route::get('/datauser', 'AdminController@dataUser')->name('datauser');
    Route::get('/dataukm', 'AdminController@dataUkm')->name('dataukm');
    Route::get('/hapus/{id}', 'AdminController@hapus')->name('hapus');
    Route::get('/hapusukm/{id}', 'AdminController@hapusukm')->name('hapusukm');
    Route::get('/hapususer/{id}', 'AdminController@hapususer')->name('hapususer');
    Route::post('/simpanmhs', 'AdminController@create')->name('simpanmhs');
    Route::post('/simpanukm', 'AdminController@createukm')->name('simpanukm');
    Route::post('/editmhs/{id}', 'AdminController@editmhs')->name('editmhs');
    Route::get('/getmhsid/{id}', 'AdminController@getmhsId')->name('getmhsid');
    Route::get('/getukmid/{id}', 'AdminController@getukmId')->name('getukmid');
    Route::post('/editukm/{id}', 'AdminController@editukm')->name('editukm');
    Route::post('/simpanuser', 'AdminController@createuser')->name('simpanuser');
    Route::get('/getuserid/{id}', 'AdminController@getuserId')->name('getuserid');
    Route::post('/edituser/{id}', 'AdminController@edituser')->name('edituser');
    Route::get('/dataukmuser', 'UserController@dataukm')->name('dataukmuser');
    Route::get('/register', 'UserController@register')->name('register');
    Route::get('/registered/{id}', 'UserController@registered')->name('registered');
});

Route::get('/home', 'HomeController@index')->name('home');
