@extends('layouts.admin')

@section('content')

<div class="header">
    <h1>Edit Barang Koperasi</h1>
    <p>Perbarui data barang koperasi</p>
</div>

<div class="table-card">

    <form action="{{ route('koperasi.update', $koperasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>Nama Barang</p>
        <input
            type="text"
            name="nama_barang"
            value="{{ $koperasi->nama_barang }}"
            required
        >

        <br><br>

        <p>Harga</p>
        <input
            type="number"
            name="harga"
            value="{{ $koperasi->harga }}"
            required
        >

        <br><br>

        <p>Stok</p>
        <input
            type="number"
            name="stok"
            value="{{ $koperasi->stok }}"
            required
        >

        <br><br>

        <button type="submit" class="btn">
            Update
        </button>

        <a href="{{ route('koperasi.index') }}" class="btn">
            Kembali
        </a>

    </form>

</div>

@endsection