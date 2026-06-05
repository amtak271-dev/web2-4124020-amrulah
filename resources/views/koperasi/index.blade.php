@extends('layouts.admin')

@section('content')

<div class="header">
    <h1>Koperasi SantriPay</h1>
    <p>Daftar Barang Koperasi</p>
</div>

<a href="{{ route('koperasi.create') }}" class="btn">
    + Tambah Barang
</a>

<br><br>

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

        <div class="action">

            <a
                href="{{ route('koperasi.edit',$koperasi->id) }}"
                class="btn"
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
                    class="btn"
                    onclick="return confirm('Hapus barang?')"
                >
                    Hapus
                </button>

            </form>

        </div>

    </div>

    @endforeach

</div>

@endsection
