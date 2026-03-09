<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'category_id' => 1,
                'name' => 'ASUS ROG Strix G16',
                'brand' => 'ASUS',
                'model' => 'ROG Strix G16',
                'price' => 1499.99,
                'stock' => 10,
                'image' => 'products/Asus-Tuf.jpg',
                'description' => 'Powerful gaming laptop with high-end graphics.',
                'ram' => '16GB',
                'storage' => '512GB SSD',
                'processor' => 'Intel Core i7',
                'screen_size' => '16 inch',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Dell Latitude 5440',
                'brand' => 'Dell',
                'model' => 'Latitude 5440',
                'price' => 999.99,
                'stock' => 15,
                'image' => 'products/Asus-Tuf.jpg',
                'description' => 'Business laptop with solid performance.',
                'ram' => '8GB',
                'storage' => '256GB SSD',
                'processor' => 'Intel Core i5',
                'screen_size' => '14 inch',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'name' => 'Acer Aspire 5',
                'brand' => 'Acer',
                'model' => 'Aspire 5',
                'price' => 599.99,
                'stock' => 20,
                'image' => 'products/Asus-Tuf.jpg',
                'description' => 'Affordable laptop for students and daily use.',
                'ram' => '8GB',
                'storage' => '512GB SSD',
                'processor' => 'AMD Ryzen 5',
                'screen_size' => '15.6 inch',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}