@extends('layouts.app')

@section('content')

<div class="hero">
    <h1>Selamat Datang di SantriPay</h1>
    <p>Sistem Tabungan Santri Berbasis Web</p>
</div>

<div class="card-container">

    <div class="card">
        <h3>Total Saldo</h3>
        <p>Rp 2.500.000</p>
    </div>

    <div class="card">
        <h3>Jumlah Santri</h3>
        <p>120 Santri</p>
    </div>

    <div class="card">
        <h3>Transaksi Hari Ini</h3>
        <p>35 Transaksi</p>
    </div>

</div>
<div class="menu-cepat">
    <a href="/tabungan" class="menu-box">
        <h3>Tabungan</h3>
        <p>Lihat data tabungan santri</p>
    </a>

    <a href="/koperasi" class="menu-box">
        <h3>Koperasi</h3>
        <p>Kebutuhan santri & pembelian</p>
    </a>

    <a href="/laporan" class="menu-box">
        <h3>Laporan</h3>
        <p>Laporan transaksi dan keuangan</p>
    </a>
</div>

<div class="transaksi">
    <h2>Transaksi Terbaru</h2>

    <table>
        <tr>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Jumlah</th>
        </tr>

        <tr>
            <td>Ahmad</td>
            <td>Setoran</td>
            <td>Rp 50.000</td>
        </tr>

        <tr>
            <td>Fikri</td>
            <td>Penarikan</td>
            <td>Rp 20.000</td>
        </tr>
    </table>
</div>

@endsection