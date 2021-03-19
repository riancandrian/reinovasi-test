<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionController;

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

Route::get('/siswa', 'App\Http\Controllers\SiswaController@index');
Route::post('/siswa/create', 'App\Http\Controllers\SiswaController@create');
Route::get('/siswa/edit/{id}', 'App\Http\Controllers\SiswaController@edit');
Route::post('/siswa/update/{id}', 'App\Http\Controllers\SiswaController@update');
Route::get('/siswa/delete/{id}', 'App\Http\Controllers\SiswaController@delete');

Route::get('/submission', 'App\Http\Controllers\SubmissionController@index');
Route::get('/submission/view/{id}', 'App\Http\Controllers\SubmissionController@view');
Route::post('submission/create', [SubmissionController::class, 'create'])->name('upload-file');