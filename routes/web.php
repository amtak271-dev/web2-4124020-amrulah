<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\KoperasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\SantriController;

Route::get('/', [BerandaController::class, 'index']);

Route::resource('tabungan', TabunganController::class);

Route::get('/koperasi', [KoperasiController::class, 'index']);

Route::get('/laporan', [LaporanController::class, 'index']);

Route::get('/tentang', [TentangController::class, 'index']);

Route::resource('santri', SantriController::class);