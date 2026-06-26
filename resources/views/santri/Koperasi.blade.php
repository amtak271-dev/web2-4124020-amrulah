@extends('layouts.santri')

@section('content')

<div class="header">
    <h1>Koperasi Santri</h1>
    <p>Pilih barang yang ingin dibeli</p>
</div>

@if(session('success'))
<div class="alert-success">
    {{ session('success') }}
</div>
@endif

<div class="product-grid">

@foreach($koperasis as $koperasi)

<div class="product-card">

    <img src="{{ asset('images/Koperasi/'.$koperasi->gambar) }}">

    <h3>{{ $koperasi->nama_barang }}</h3>

    <p>Harga : Rp {{ number_format($koperasi->harga) }}</p>

    <p>Stok : {{ $koperasi->stok }}</p>

    @if($koperasi->stok>0)

    <form action="{{ route('pesanan.store') }}" method="POST">

        @csrf

        <input
            type="hidden"
            name="koperasi_id"
            value="{{ $koperasi->id }}"
        >

        <label>Jumlah</label>

        <input
            type="number"
            name="jumlah"
            value="1"
            min="1"
            max="{{ $koperasi->stok }}"
        >

        <button class="btn">
            Pesan
        </button>

    </form>

    @else

    <button class="btn" disabled>
        Stok Habis
    </button>

    @endif

</div>

@endforeach

</div>

<br><br>

<div class="table-card">

<h2>Riwayat Pesanan</h2>

<table>

<tr>

<th>No</th>
<th>Barang</th>
<th>Jumlah</th>
<th>Total</th>
<th>Status</th>

</tr>

@foreach($pesanans as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $item->koperasi->nama_barang }}</td>

<td>{{ $item->jumlah }}</td>

<td>Rp {{ number_format($item->total_harga) }}</td>

<td>{{ $item->status }}</td>

</tr>

@endforeach

</table>

</div>

@endsection