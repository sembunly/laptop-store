<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'Gaming Laptop',
                'slug' => 'gaming-laptop',
                'description' => 'High performance laptops for gaming.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Business Laptop',
                'slug' => 'business-laptop',
                'description' => 'Reliable laptops for office and business use.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Student Laptop',
                'slug' => 'student-laptop',
                'description' => 'Affordable laptops for students.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}