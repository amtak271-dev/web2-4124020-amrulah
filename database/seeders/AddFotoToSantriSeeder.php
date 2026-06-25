<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Santri;

class AddFotoToSantriSeeder extends Seeder
{
    public function run(): void
    {
        Santri::query()->update([
            'foto' => 'santri/default.jpg'
        ]);
    }
}