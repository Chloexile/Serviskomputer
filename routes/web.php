<?php

use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\serviskomputer@index');
Route::post('/login', 'App\Http\Controllers\serviskomputer@login');

Route::get('/homepage', 'App\Http\Controllers\serviskomputer@homepage');
Route::get('/logout', 'App\Http\Controllers\serviskomputer@logout');

Route::get('/register', 'App\Http\Controllers\serviskomputer@registerform');
Route::post('/register', 'App\Http\Controllers\serviskomputer@register');

Route::get('/edit/{id}', 'App\Http\Controllers\serviskomputer@editform');
Route::post('/edit/{id}', 'App\Http\Controllers\serviskomputer@editsave');

Route::get('/delete/{id}', 'App\Http\Controllers\serviskomputer@delete');
Route::post('/delete/{id}', 'App\Http\Controllers\serviskomputer@deletesave');
