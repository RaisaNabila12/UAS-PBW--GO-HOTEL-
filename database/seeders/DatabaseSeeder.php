<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin
        User::factory()->create([
            'name' => 'Admin Hotel',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);

        // 2. Akun Pelanggan
        User::factory()->create([
            'name' => 'Raisa Nabila',
            'email' => 'raisa@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'pelanggan',
        ]);
    }
}