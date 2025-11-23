<?php
// database/seeders/ProductSeeder.php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Gunakan firstOrCreate untuk kategori
        $makanan = Category::firstOrCreate(
            ['name' => 'Makanan'],
            ['slug' => 'makanan', 'created_at' => now()]
        );
        
        $minuman = Category::firstOrCreate(
            ['name' => 'Minuman'],
            ['slug' => 'minuman', 'created_at' => now()]
        );
        
        $snack = Category::firstOrCreate(
            ['name' => 'Snack'],
            ['slug' => 'snack', 'created_at' => now()]
        );

        $products = [
            [
                'name' => 'Nasi Goreng Spesial',
                'slug' => 'nasi-goreng-spesial',
                'description' => 'Nasi goreng dengan telur, ayam, dan sayuran segar',
                'image_path' => 'images/nasi-goreng.jpg',
                'price' => 25000,
                'category_id' => $makanan->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mie Ayam Bakso',
                'slug' => 'mie-ayam-bakso',
                'description' => 'Mie ayam dengan bakso sapi pilihan dan pangsit',
                'image_path' => 'images/mie-ayam.jpg',
                'price' => 20000,
                'category_id' => $makanan->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ayam Geprek',
                'slug' => 'ayam-geprek',
                'description' => 'Ayam crispy dengan sambal geprek pedas',
                'image_path' => 'images/ayam-geprek.jpg',
                'price' => 22000,
                'category_id' => $makanan->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Teh Manis',
                'slug' => 'es-teh-manis',
                'description' => 'Es teh segar dengan gula pasir pilihan',
                'image_path' => 'images/es-teh.jpg',
                'price' => 5000,
                'category_id' => $minuman->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kopi Hitam',
                'slug' => 'kopi-hitam',
                'description' => 'Kopi arabica pilihan yang nikmat',
                'image_path' => 'images/kopi.jpg',
                'price' => 10000,
                'category_id' => $minuman->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jus Jeruk',
                'slug' => 'jus-jeruk',
                'description' => 'Jus jeruk segar tanpa pengawet',
                'image_path' => 'images/jus-jeruk.jpg',
                'price' => 12000,
                'category_id' => $minuman->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keripik Kentang',
                'slug' => 'keripik-kentang',
                'description' => 'Keripik kentang renyah rasa balado',
                'image_path' => 'images/keripik.jpg',
                'price' => 15000,
                'category_id' => $snack->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Risol Mayo',
                'slug' => 'risol-mayo',
                'description' => 'Risol isi mayo, sosis, dan sayuran',
                'image_path' => 'images/risol.jpg',
                'price' => 8000,
                'category_id' => $snack->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sate Ayam',
                'slug' => 'sate-ayam',
                'description' => 'Sate ayam dengan bumbu kacang spesial',
                'image_path' => 'images/sate.jpg',
                'price' => 18000,
                'category_id' => $makanan->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gado-gado',
                'slug' => 'gado-gado',
                'description' => 'Sayuran segar dengan bumbu kacang',
                'image_path' => 'images/gado-gado.jpg',
                'price' => 15000,
                'category_id' => $makanan->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(
                ['slug' => $product['slug']], // Gunakan slug sebagai unique identifier
                $product
            );
        }
        
        $this->command->info('Berhasil membuat ' . count($products) . ' produk!');
    }
}