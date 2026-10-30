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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/admin', function () {
    return view('dashboard', ['role' => 'admin']);
});

Route::get('/gudang', function () {
    return view('dashboard', ['role' => 'gudang']);
});

Route::get('/departemen', function () {
    return view('dashboard', ['role' => 'departemen']);
});

Route::get('/login', function () {
    return view('auth.login');
});
