<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Santri;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'laila@gmail.com')->first();

        if (!$user) {
            return;
        }

        Santri::updateOrCreate(
            [
                'nis' => '2024001'
            ],
            [
                'user_id' => $user->id,
                'nama' => 'Laila',
                'kelas' => 'X-A',
                'alamat' => 'Surabaya',
            ]
        );
    }
}