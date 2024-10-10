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

Route::get('/login', function () {
    // return view('welcome');
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/nomor-antrian/index', function () {
    return view('nomor-antrian.index');
});

Route::get('/nomor-antrian/index_done', function () {
    return view('nomor-antrian.index_done');
});

Route::get('/informasi', function () {
    return view('informasi');
});

Route::get('/panggilan-antrian/index', function () {
    return view('panggilan-antrian.index');
});

