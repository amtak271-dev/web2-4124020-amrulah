@extends('layouts.admin')

@section('content')

<h1>Tambah Transaksi</h1>

<form action="{{ url('/tabungan') }}" method="POST">
    @csrf

    <div>
        <label>Santri</label><br>

        <select name="santri_id" required>
            <option value="">-- Pilih Santri --</option>

            @foreach($santris as $santri)
                <option value="{{ $santri->id }}">
                    {{ $santri->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <br>

    <div>
        <label>Tipe</label><br>

        <select name="tipe" required>
            <option value="setor">Setor</option>
            <option value="tarik">Tarik</option>
        </select>
    </div>

    <br>

    <div>
        <label>Jumlah</label><br>

        <input type="number" name="jumlah" required>
    </div>

    <br>

    <div>
        <label>Keterangan</label><br>

        <input type="text" name="keterangan">
    </div>

    <br>

    <button type="submit">
        Simpan
    </button>

</form>

@endsection