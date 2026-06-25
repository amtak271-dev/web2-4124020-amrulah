<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Santri;
use App\Models\Tabungan;

class TabunganSeeder extends Seeder
{
    public function run(): void
    {
        $santri = Santri::first();

        if (!$santri) {
            return;
        }

        Tabungan::create([
            'santri_id' => $santri->id,
            'tipe' => 'setor',
            'jumlah' => 50000,
            'keterangan' => 'Setoran awal',
        ]);

        Tabungan::create([
            'santri_id' => $santri->id,
            'tipe' => 'setor',
            'jumlah' => 25000,
            'keterangan' => 'Tabungan mingguan',
        ]);
    }
}