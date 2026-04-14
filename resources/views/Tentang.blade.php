@extends('layouts.app')

@section('title','Tentang')

@section('content')

<!-- Hero Section -->
<div class="max-w-6x1 mx-auto px-4 py-8">
   
    <h1 class="text-3xl font-bold">Tentang Aplikasi</h1>
    <p>Aplikasi ini dibuat menggunakan Laravel dan Tailwind CSS</p>
</div> 

<!-- Info Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

<div class="bg-white p-4 shadow rounded">
    <h2 class="font-bold text-lg">Tujuan</h2>
    <p>Membantu pengelolaan produk dengan mudah</p>
</div>

<div class="bg-white p-4 shadow rounded">
    <h2 class="font-bold text-lg">Fitur</h2>
    <p>CRUD Produk dengan UI modern</p>
</div>

<div class="bg-white p-4 shadow rounded">
    <h2 class="font-bold text-lg">kelompok 3</h2>
    <p>Lailatul Nur Aifa Rahmawati</p>
    <p>Muhammad Amrullah</p>
    <p>Hardiansyah</p>
</div>

</div>

@endsection