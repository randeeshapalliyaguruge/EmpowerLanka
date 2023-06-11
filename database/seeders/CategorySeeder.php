<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Category 1', 'description' => 'Description 1'],
            ['name' => 'Category 2', 'description' => 'Description 2'],
            // Add more categories as needed
        ];

        Category::insert($categories);

        $this->command->info('Categories seeded successfully.');
    }
}
