@extends('layouts.app')

@section('content')

<h1>Data Tabungan</h1>

<a href="/tabungan/create">Tambah Transaksi</a>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Santri</th>
        <th>Tipe</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
    </tr>

    @foreach($tabungans as $tabungan)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $tabungan->santri->nama }}</td>
        <td>{{ $tabungan->tipe }}</td>
        <td>Rp {{ number_format($tabungan->jumlah) }}</td>
        <td>{{ $tabungan->keterangan }}</td>
    </tr>
    @endforeach

</table>

@endsection