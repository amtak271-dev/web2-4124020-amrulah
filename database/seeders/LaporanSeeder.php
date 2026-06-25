<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Santri;
use App\Models\Laporan;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        $santri = Santri::first();

        if (!$santri) {
            return;
        }

        Laporan::create([
            'santri_id' => $santri->id,
            'judul' => 'Kerusakan Lampu',
            'isi' => 'Lampu kamar asrama mati.',
            'balasan' => 'Akan diperbaiki oleh petugas.',
            'status' => 'diproses',
        ]);

        Laporan::create([
            'santri_id' => $santri->id,
            'judul' => 'Kebersihan Kamar',
            'isi' => 'Tempat sampah penuh.',
            'balasan' => 'Sudah dibersihkan.',
            'status' => 'selesai',
        ]);
    }
}