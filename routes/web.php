<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KatalogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home.index');


/*
|------------------------------------------
| Route Statis (Closure)
|------------------------------------------
*/

Route::get('/perkenalan', function () {
    return '
        <h1>Halo! Nama saya Amrulah</h1>
        <p>NIM: 4124020 | Prodi: Sistem Informasi</p>
        <p>Saya siap belajar Laravel! 🚀</p>
    ';
})->name('perkenalan.index');

Route::get('/andi', function () {
    return '<h1>Halo saya Hardiansyah (Kolaborator)</h1>';
})->name('andi.index');

Route::get('/about', function () {
    return '
        <h1>Halaman About</h1>
        <p>Ini adalah halaman tentang website Laravel saya.</p>
    ';
})->name('about.index');


/*
|------------------------------------------
| Route Dinamis - Profil
|------------------------------------------
*/

Route::get('/profil', [ProfilController::class, 'index'])
    ->name('profil.index');

Route::get('/profil/{nim}', [ProfilController::class, 'show'])
    ->name('profil.show');


/*
|------------------------------------------
| Route Dinamis - Katalog
|------------------------------------------
*/

Route::get('/katalog', [KatalogController::class, 'index'])
    ->name('katalog.index');

Route::get('/katalog/{id}', [KatalogController::class, 'show'])
    ->name('katalog.show');