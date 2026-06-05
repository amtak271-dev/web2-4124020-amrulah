<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\KoperasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\SantriController;
use App\Models\Santri;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect('/login');

});

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| HALAMAN SETELAH LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | BERANDA / DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/beranda', [BerandaController::class, 'index'])
        ->name('beranda');

    /*
    |--------------------------------------------------------------------------
    | TABUNGAN
    |--------------------------------------------------------------------------
    */

    Route::resource('tabungan', TabunganController::class);

    /*
    |--------------------------------------------------------------------------
    | KOPERASI
    |--------------------------------------------------------------------------
    */

    Route::resource('koperasi', KoperasiController::class);
    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

    Route::get('/laporan', [LaporanController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | TENTANG
    |--------------------------------------------------------------------------
    */

    Route::get('/tentang', [TentangController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | SANTRI
    |--------------------------------------------------------------------------
    */

    Route::resource('santri', SantriController::class);

});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/admin', function () {

        if(Auth::user()->role != 'admin'){
            abort(403);
        }

        $totalSantri = Santri::count();

        return view('admin.dashboard', compact('totalSantri'));

    });

});

/*
|--------------------------------------------------------------------------
| SANTRI DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard-santri', function () {

        if(Auth::user()->role != 'santri'){
            abort(403);
        }

        return view('santri.dashboard');

    });

});