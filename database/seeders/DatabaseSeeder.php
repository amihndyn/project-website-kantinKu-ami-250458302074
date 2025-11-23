<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Users
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('Admin#123'),
                'phone_number' => '08123456789',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'buyer@admin.com'],
            [
                'name' => 'buyer',
                'email_verified_at' => now(),
                'password' => Hash::make('Buyer#123'),
                'phone_number' => '08123456789',
                'role' => 'buyer',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Categories & Products
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}