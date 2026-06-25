@extends('layouts.admin')

@section('content')

<div class="header">
    <h1>Edit Barang Koperasi</h1>
    <p>Perbarui data barang koperasi</p>
</div>

<div class="table-card">

    <form action="{{ route('koperasi.update',$koperasi->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text"
                   name="nama_barang"
                   value="{{ $koperasi->nama_barang }}"
                   required>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number"
                   name="harga"
                   value="{{ $koperasi->harga }}"
                   required>
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number"
                   name="stok"
                   value="{{ $koperasi->stok }}"
                   required>
        </div>

        <div class="action">

            <button type="submit"
                    class="btn btn-edit">
                Update
            </button>

            <a href="{{ route('koperasi.index') }}"
               class="btn btn-delete">
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection