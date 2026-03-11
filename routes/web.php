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

/* =========================
   Route Aplikasi Santri Pay
========================= */

Route::get('/', function () {
    return '
        <h1>Assalamualaikum, Akhi/Ukhti
        Selamat Datang di Menu Santri!! </h1>
        <ul>
            <li>Login Santri</li>
            <li>Melihat Saldo Tabungan</li>
            <li>Riwayat Transaksi</li>
            <li>Mengajukan Penarikan Uang</li>
        </ul>
    ';
})->name('santripay.menu-santri');


Route::get('/santripay/menu-admin', function () {
    return '
        <h1>Menu Admin</h1>
        <ul>
            <li>CRUD Data Santri</li>
            <li>Input Setoran Uang</li>
            <li>Verifikasi Penarikan</li>
            <li>Laporan Keuangan</li>
        </ul>
    ';
})->name('santripay.menu-admin');


Route::get('/santripay/menu-wali', function () {
    return '
        <h1>Menu Wali Santri</h1>
        <ul>
            <li>Login Wali</li>
            <li>Monitoring Saldo Anak</li>
            <li>Melihat Riwayat Tabungan</li>
        </ul>
    ';
})->name('santripay.menu-wali');