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
        <h2>
            Rp {{ number_format($totalSaldo, 0, ',', '.') }}
        </h2>
    </div>

    <div class="stat-card">
        <h4>Total Transaksi</h4>
        <h2>{{ $totalTransaksi }}</h2>
    </div>

    <div class="stat-card">
        <h4>Setoran Hari Ini</h4>
        <h2>
            Rp {{ number_format($setoranHariIni, 0, ',', '.') }}
        </h2>
    </div>

</div>

<div class="dashboard-bottom">

    <div class="table-card">

        <h2>Selamat Datang Admin</h2>

        <p class="welcome-text">
            Kelola data santri, transaksi tabungan,
            koperasi, dan laporan santri dalam satu
            sistem yang terintegrasi.
        </p>

        <ul class="welcome-list">
            <li>✓ Kelola Data Santri</li>
            <li>✓ Kelola Tabungan</li>
            <li>✓ Kelola Koperasi</li>
            <li>✓ Kelola Laporan Santri</li>
        </ul>

    </div>

    <div class="table-card">

        <h2>Aktivitas Terbaru</h2>

        <div class="activity-list">

            <div class="activity-item">
                <span>💰</span>
                <div>
                    <strong>Setoran terbaru masuk</strong>
                    <small>Data transaksi santri</small>
                </div>
            </div>

            <div class="activity-item">
                <span>🛒</span>
                <div>
                    <strong>Barang koperasi aktif</strong>
                    <small>Monitoring stok barang</small>
                </div>
            </div>

            <div class="activity-item">
                <span>📄</span>
                <div>
                    <strong>Laporan santri tersedia</strong>
                    <small>Cek laporan terbaru</small>
                </div>
            </div>

        </div>

        <hr>

        <h3>Akses Cepat</h3>

        <div class="quick-menu">

            <a href="{{ route('santri.create') }}"
               class="quick-btn">
                + Santri
            </a>

            <a href="{{ url('/tabungan/create') }}"
               class="quick-btn">
                + Transaksi
            </a>

            <a href="{{ route('koperasi.create') }}"
               class="quick-btn">
                + Barang
            </a>

            <a href="{{ url('/laporan-admin') }}"
               class="quick-btn">
                Laporan
            </a>

        </div>

    </div>

</div>

@endsection