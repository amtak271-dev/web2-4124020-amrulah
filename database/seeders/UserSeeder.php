<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
                'role' => 'admin'
            ]
        );

        User::firstOrCreate(
            ['email' => 'laila@gmail.com'],
            [
                'name' => 'Laila',
                'password' => Hash::make('12345678'),
                'role' => 'santri'
            ]
        );
    }
}