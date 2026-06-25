<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produks')->insert([
            [
                'nama_produk' => 'Buku',
                'harga' => 5000,
                'stok' => 100,
                'deskripsi' => 'Buku tulis 38 lembar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Pulpen',
                'harga' => 3000,
                'stok' => 50,
                'deskripsi' => 'Pulpen tinta hitam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}