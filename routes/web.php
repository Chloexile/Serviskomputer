<?php

use Illuminate\Support\Facades\Route;

// route login & autentikasi
Route::get('/', 'App\Http\Controllers\serviskomputer@index');
Route::post('/login', 'App\Http\Controllers\serviskomputer@login');
Route::get('/logout', 'App\Http\Controllers\serviskomputer@logout');

// route homepage & laporan (pdf, excel)
Route::get('/homepage', 'App\Http\Controllers\serviskomputer@homepage');
Route::get('/homepage/filter', 'App\Http\Controllers\serviskomputer@aksitanggal');
Route::get('/pdf', 'App\Http\Controllers\serviskomputer@aksipdf');
Route::get('/excel', 'App\Http\Controllers\serviskomputer@aksiexcel');

// route register & pengelolaan user
Route::get('/register', 'App\Http\Controllers\serviskomputer@registerform');
Route::post('/register', 'App\Http\Controllers\serviskomputer@register');

Route::get('/edit/{id}', 'App\Http\Controllers\serviskomputer@editform');
Route::post('/edit/{id}', 'App\Http\Controllers\serviskomputer@editsave');
Route::get('/delete/{id}', 'App\Http\Controllers\serviskomputer@delete');

// route pelanggan
Route::get('/inputpelanggan', 'App\Http\Controllers\serviskomputer@formpelanggan');
Route::post('/aksipelanggan', 'App\Http\Controllers\serviskomputer@aksipelanggan');
Route::get('/pelanggan', 'App\Http\Controllers\serviskomputer@pelanggan');
Route::get('/inputpelanggan', 'App\Http\Controllers\serviskomputer@tambahpelanggan');

// route petugas
Route::get('/inputpetugas', 'App\Http\Controllers\serviskomputer@inputpetugas');
Route::post('/aksipetugas', 'App\Http\Controllers\serviskomputer@aksipetugas');
Route::get('/petugas', 'App\Http\Controllers\serviskomputer@petugas');
