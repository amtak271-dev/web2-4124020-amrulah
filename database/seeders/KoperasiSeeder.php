<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Koperasi;

class KoperasiSeeder extends Seeder
{
    public function run(): void
    {
        Koperasi::create([
            'nama_barang' => 'Buku',
            'harga' => 5000,
            'stok' => 100,
            'gambar' => 'buku.jpg',
        ]);

        Koperasi::create([
            'nama_barang' => 'Pulpen',
            'harga' => 3000,
            'stok' => 50,
            'gambar' => 'pulpen.jpg',
        ]);
    }
}