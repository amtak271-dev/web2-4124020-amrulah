<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Koperasi;
use App\Models\Pesanan;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'laila@gmail.com')->first();
        $barang = Koperasi::first();

        if (!$user || !$barang) {
            return;
        }

        Pesanan::create([
            'user_id' => $user->id,
            'koperasi_id' => $barang->id,
            'jumlah' => 2,
            'total_harga' => $barang->harga * 2,
            'status' => 'Menunggu',
        ]);
    }
}