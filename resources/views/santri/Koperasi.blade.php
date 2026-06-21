@extends('layouts.app')

@section('content')

<div class="header">
    <h1>Koperasi Santri</h1>
    <p>Pilih barang yang ingin dibeli</p>
</div>

<div class="product-grid">

    @foreach($koperasis as $koperasi)

    <div class="product-card">

        <img
            src="{{ asset('images/Koperasi/' . $koperasi->gambar) }}"
            alt="{{ $koperasi->nama_barang }}"
        >

        <h3>{{ $koperasi->nama_barang }}</h3>

        <p>
            Harga :
            Rp {{ number_format($koperasi->harga,0,',','.') }}
        </p>

        <p>
            Stok :
            {{ $koperasi->stok }}
        </p>

        <form action="{{ route('pesanan.store') }}" method="POST">

            @csrf

            <input
                type="hidden"
                name="koperasi_id"
                value="{{ $koperasi->id }}"
            >

            <label>Jumlah</label>

            <br>

            <input
                type="number"
                name="jumlah"
                value="1"
                min="1"
                max="{{ $koperasi->stok }}"
                required
            >

            <br><br>

            <button type="submit" class="btn">
                Pesan
            </button>

        </form>

    </div>

    @endforeach

</div>

@endsection