```php
@extends('layouts.admin')

@section('content')

<div class="header">
    <h1>Tambah Barang Koperasi</h1>
    <p>Masukkan data barang baru</p>
</div>

<div class="table-card">

    <form action="{{ route('koperasi.store') }}" method="POST">
        @csrf

        <div style="margin-bottom:15px;">
            <label>Nama Barang</label>
            <br>
            <input
                type="text"
                name="nama_barang"
                required
                style="width:100%;padding:10px;"
            >
        </div>

        <div style="margin-bottom:15px;">
            <label>Harga</label>
            <br>
            <input
                type="number"
                name="harga"
                required
                style="width:100%;padding:10px;"
            >
        </div>

        <div style="margin-bottom:15px;">
            <label>Stok</label>
            <br>
            <input
                type="number"
                name="stok"
                required
                style="width:100%;padding:10px;"
            >
        </div>

        <div style="margin-bottom:15px;">
            <label>Gambar (opsional)</label>
            <br>
          <input type="file" name="gambar">
            
        </div>

        <button type="submit" class="btn">
            Simpan
        </button>

        <a href="{{ route('koperasi.index') }}" class="btn">
            Kembali
        </a>

    </form>

</div>

@endsection
```
