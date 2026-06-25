@extends('layouts.admin')

@section('content')

<div class="header">
    <h1>Tambah Transaksi</h1>
    <p>Input transaksi tabungan santri</p>
</div>

<div class="table-card">

    <form action="{{ url('/tabungan') }}" method="POST">

        @csrf

        <div class="form-group">
            <label>Santri</label>

            <select name="santri_id" required>

                <option value="">
                    -- Pilih Santri --
                </option>

                @foreach($santris as $santri)

                    <option value="{{ $santri->id }}">
                        {{ $santri->nama }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label>Tipe Transaksi</label>

            <select name="tipe" required>
                <option value="setor">Setor</option>
                <option value="tarik">Tarik</option>
            </select>
        </div>

        <div class="form-group">
            <label>Jumlah</label>

            <input
                type="number"
                name="jumlah"
                required
            >
        </div>

        <div class="form-group">
            <label>Keterangan</label>

            <input
                type="text"
                name="keterangan"
            >
        </div>

        <div class="action">

            <button
                type="submit"
                class="btn btn-gold">
                Simpan
            </button>

            <a href="{{ url('/tabungan') }}"
               class="btn btn-delete">
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection