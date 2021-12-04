<?php

use App\Http\Controllers\CarControllers;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/mobil', [MobilController::class, 'index']);
Route::get('/mobil/tambah', [MobilController::class, 'create'])->name('mobil.tambah');
Route::post('/mobil', [MobilController::class, 'store'])->name('mobil.simpan');
Route::resource('sisw', SiswaController::class);
Route::resource('ca', CarControllers::class);
Route::get('getCar', [CarControllers::class, 'getCar'])->name('data.ca');
Route::get('getSiswa', [SiswaController::class, 'getSiswa'])->name('data.sisw');