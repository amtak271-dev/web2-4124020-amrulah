<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/perkenalan', function () {
    return '
        <h1>Halo! Nama saya Amrulah</h1>
        <p>NIM: 4124020 | Prodi: Sistem Informasi</p>
        <p>Saya siap belajar Laravel! 🚀</p>
    ';
});

Route::get('/perkenalan', function () {
    return 'Halo, ini halaman perkenalan!';
});