<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'laila@gmail.com')->first();

        if (!$user) {
            return;
        }

        Transaksi::create([
            'user_id' => $user->id,
            'jumlah' => 2,
            'total_harga' => 10000,
            'keterangan' => 'Belanja koperasi',
            'tanggal_transaksi' => now(),
        ]);

        Transaksi::create([
            'user_id' => $user->id,
            'jumlah' => 1,
            'total_harga' => 5000,
            'keterangan' => 'Pembelian buku tulis',
            'tanggal_transaksi' => now(),
        ]);
    }
}