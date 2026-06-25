<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SantriSeeder::class,
            PesananSeeder::class,
            LaporanSeeder::class,
            TransaksiSeeder::class,
            TransaksiKoperasiSeeder::class,
            KoperasiSeeder::class,
            TabunganSeeder::class,
            AddFotoToSantriSeeder::class,
        ]);
    }
}