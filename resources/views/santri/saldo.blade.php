@extends('layouts.santri')

@section('content')

<div class="header">
    <h1>Saldo Saya</h1>
    <p>Informasi saldo tabungan {{ $santri->nama }}</p>
</div>

<div class="stats">

    <div class="stat-card">
        <h4>Saldo Saat Ini</h4>
        <h2>
            Rp {{ number_format($saldo,0,',','.') }}
        </h2>
    </div>

    <div class="stat-card">
        <h4>Total Setoran</h4>
        <h2>
            Rp {{ number_format($totalSetor,0,',','.') }}
        </h2>
    </div>

    <div class="stat-card">
        <h4>Total Penarikan</h4>
        <h2>
            Rp {{ number_format($totalTarik,0,',','.') }}
        </h2>
    </div>

    <div class="stat-card">
        <h4>Total Transaksi</h4>
        <h2>{{ $totalTransaksi }}</h2>
    </div>

</div>

{{-- RIWAYAT 3 TRANSAKSI TERAKHIR --}}
<div class="stat-card" style="width:100%; margin-top:20px;">

    <h3>3 Riwayat Transaksi Terakhir</h3>

    <br>

    @forelse($riwayatTerakhir as $item)

        <div style="padding:10px 0; border-bottom:1px solid #ddd;">

            <strong>
                {{ ucfirst($item->tipe) }}
            </strong>

            - Rp {{ number_format($item->jumlah,0,',','.') }}

            <br>

            <small>
                {{ $item->created_at->format('d M Y') }}
            </small>

        </div>

    @empty

        <p>Belum ada riwayat transaksi</p>

    @endforelse

</div>

@endsection