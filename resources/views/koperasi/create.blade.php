@extends('layouts.admin')

@section('content')

<div class="header">
    <h1>Tambah Barang Koperasi</h1>
    <p>Masukkan data barang baru</p>
</div>

<div class="table-card">

    <form action="{{ route('koperasi.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text"
                   name="nama_barang"
                   required>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number"
                   name="harga"
                   required>
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number"
                   name="stok"
                   required>
        </div>

        <div class="form-group">
            <label>Gambar Barang</label>
            <input type="file"
                   name="gambar"
                   accept="image/*">
        </div>

        <div class="action">
            <button type="submit" class="btn btn-gold">
                Simpan
            </button>

            <a href="{{ route('koperasi.index') }}"
               class="btn btn-delete">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection