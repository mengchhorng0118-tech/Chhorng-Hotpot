<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create default admin user
        User::firstOrCreate(
            ['email' => 'admin@hotpot.com'],
            [
                'name'     => 'admin',
                'password' => Hash::make('admin1234'),
            ]
        );

        // Seed categories and products
        $this->call(ProductSeeder::class);
    }
}
