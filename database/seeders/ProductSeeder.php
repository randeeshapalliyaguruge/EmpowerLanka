<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();



        if ($categories->isEmpty()) {
            $this->command->info('No categories found. Skipping product seeding.');
            return;
        }

        // Generate and seed products
            Product::factory()
            ->count(100)
            ->create()
            ->each(function ($product) use ($categories) {
                $category = $categories->random();
                $product->category()->associate($category);
                $product->save();
            });

        $this->command->info('Products seeded successfully.');
    }

}
