<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DataController;
use \App\Http\Controllers\AuthController;

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
Route::get('/nindhacenter/data',[DataController::class,'index']);
Route::get('/nindhacenter/tambah',[DataController::class,'tambah']);
Route::post('/nindhacenter/tambah',[DataController::class,'add']);
Route::get('/nindhacenter/data/{id}/edit',[DataController::class,'edit']);
Route::post('/nindhacenter/data/{id}/update',[DataController::class,'update']);
Route::get('/nindhacenter/data/{id}/hapus',[DataController::class,'hapus']);

Route::get('/login',[AuthController::class, 'login']);
Route::post('/postlogin',[AuthController::class, 'postlogin']);