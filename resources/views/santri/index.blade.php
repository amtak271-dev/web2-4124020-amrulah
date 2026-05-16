@extends('layouts.app')

@section('content')

<h1>Data Santri</h1>

<a href="/santri/create">Tambah Santri</a>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIS</th>
        <th>Kelas</th>
    </tr>

    @foreach($santris as $santri)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $santri->nama }}</td>
        <td>{{ $santri->nis }}</td>
        <td>{{ $santri->kelas }}</td>
    </tr>
    @endforeach

</table>

@endsection