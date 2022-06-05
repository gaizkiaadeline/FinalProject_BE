<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
 utes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('home');
});

Route::get('/register', 'App\Http\Controllers\AuthController@showRegister')->middleware('guest');
Route::get('/login', 'App\Http\Controllers\AuthController@showLogin')->middleware('guest');

Route::post('/register', 'App\Http\Controllers\AuthController@processRegister')->middleware('guest');
Route::post('/login', 'App\Http\Controllers\AuthController@processLogin')->middleware('guest');
Route::post('/logout', 'App\Http\Controllers\AuthController@processLogout');


Route::get('/login', function () {
    return view('auth/login');
});