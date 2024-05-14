<?php

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DetailpenjualanController;

Route::get('/', function () {
    return view('auth/login');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('/karyawan', \App\Http\Controllers\KaryawanController::class);
Route::resource('/member', \App\Http\Controllers\PelangganController::class);
Route::resource('/penjualan', \App\Http\Controllers\PenjualanController::class);
Route::resource('/produk', \App\Http\Controllers\ProdukController::class);
Route::resource('/detailpenjualan', \App\Http\Controllers\DetailpenjualanController::class);
Route::resource('/siswa', \App\Http\Controllers\SiswaController::class);
