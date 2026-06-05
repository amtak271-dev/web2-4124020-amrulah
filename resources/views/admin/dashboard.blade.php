@extends('layouts.admin')

@section('content')

<div class="header">
    <h1>Dashboard Admin</h1>
    <p>Selamat datang di Sistem SantriPay</p>
</div>

<div class="stats">

    <div class="stat-card">
    <h4>Total Santri</h4>
    <h2>{{ $totalSantri }}</h2>
</div>

    <div class="stat-card">
        <h4>Total Saldo</h4>
        <h2>Rp 2.500.000</h2>
    </div>

    <div class="stat-card">
        <h4>Transaksi Hari Ini</h4>
        <h2>35</h2>
    </div>

    <div class="stat-card">
        <h4>Setoran Hari Ini</h4>
        <h2>Rp 500.000</h2>
    </div>

</div>

@endsection