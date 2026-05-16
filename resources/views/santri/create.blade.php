@extends('layouts.app')

@section('content')

<h1>Tambah Data Santri</h1>

<form action="/santri" method="POST">
    @csrf

    <p>Nama</p>
    <input type="text" name="nama">

    <p>NIS</p>
    <input type="text" name="nis">

    <p>Kelas</p>
    <input type="text" name="kelas">

    <p>Alamat</p>
    <input type="text" name="alamat">

    <br><br>

    <button type="submit">Simpan</button>
</form>

@endsection