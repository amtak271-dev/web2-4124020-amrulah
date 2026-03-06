<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/perkenalan', function () {
    return '
        <h1>Halo! Nama saya Amrulah</h1>
        <h2>Perkenalkan nama saya Hardiansyah</h2>
        <p>NIM: 4124020 | Prodi: Sistem Informasi</p>
        <p>Saya siap belajar Laravel! 🚀</p>
    ';
});

Route::get('/andi', function () {
    return 'Halo, saya Hardiansyah (Kolaborator)';
});

Route::get('/lailatul', function () {
    return '
        <h1>Halo! Nama saya Lailatul Nur Aifa Rahmawati</h1>
        <p>NIM: 4124007 | Prodi: Sistem Informasi</p>
        <p>Saya siap belajar Laravel! (Kolaborator)</p>
    ';
});