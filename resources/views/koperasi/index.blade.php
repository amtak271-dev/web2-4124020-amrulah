@extends('layouts.admin')

@section('content')

<div class="header">
    <h1>Koperasi SantriPay</h1>
    <p>Daftar Barang Koperasi</p>
</div>

<div style="margin-bottom:25px;">
    <a href="{{ route('koperasi.create') }}" class="btn btn-gold">
        + Tambah Barang
    </a>
</div>

<div class="product-grid">

    @foreach($koperasis as $koperasi)

    <div class="product-card">

        <img
            src="{{ asset('images/Koperasi/' . $koperasi->gambar) }}"
            alt="{{ $koperasi->nama_barang }}"
        >

        <div class="product-body">

            <h3>{{ $koperasi->nama_barang }}</h3>

            <div class="product-info">
                <span>Harga</span>
                <strong>
                    Rp {{ number_format($koperasi->harga,0,',','.') }}
                </strong>
            </div>

            <div class="product-info">
                <span>Stok</span>
                <strong>{{ $koperasi->stok }}</strong>
            </div>

            <div class="action">

                <a
                    href="{{ route('koperasi.edit',$koperasi->id) }}"
                    class="btn btn-edit"
                >
                    Edit
                </a>

                <form
                    action="{{ route('koperasi.destroy',$koperasi->id) }}"
                    method="POST"
                    style="display:inline;"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-delete"
                        onclick="return confirm('Hapus barang ini?')"
                    >
                        Hapus
                    </button>

                </form>

            </div>

        </div>

    </div>

    @endforeach

</div>

@endsection