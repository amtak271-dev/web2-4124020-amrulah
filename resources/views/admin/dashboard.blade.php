@extends('layouts.admin')

@section('content')

<div class="header">
    <h1>Dashboard Admin</h1>
    <p>Selamat datang di Sistem SantriPay</p>
</div>

<div class="stats">

    <!-- Total Santri -->
    <div class="stat-card">
        <h4>Total Santri</h4>
        <h2>{{ $totalSantri }}</h2>
    </div>

    <!-- Total Saldo -->
    <div class="stat-card">
        <h4>Total Saldo</h4>
        <h2>
            Rp {{ number_format($totalSaldo, 0, ',', '.') }}
        </h2>
    </div>

    <!-- Total Transaksi -->
    <div class="stat-card">
        <h4>Total Transaksi</h4>
        <h2>{{ $totalTransaksi }}</h2>
    </div>

    <!-- Setoran Hari Ini -->
    <div class="stat-card">
        <h4>Setoran Hari Ini</h4>
        <h2>
            Rp {{ number_format($setoranHariIni, 0, ',', '.') }}
        </h2>
    </div>

</div>

@endsection