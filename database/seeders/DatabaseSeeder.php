<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin#123'),
            'phone_number' => '08123456789',
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([
            'name' => 'buyer',
            'email' => 'buyer@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Buyer#123'),
            'phone_number' => '08123456789',
            'role' => 'buyer',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
