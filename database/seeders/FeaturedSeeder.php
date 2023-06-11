<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Featured;
use App\Models\Category;

class FeaturedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->command->info('No categories found. Skipping featured seeding.');
            return;
        }

        // Generate and seed featured
            Featured::factory()
            ->count(3)
            ->create()
            ->each(function ($featured) use ($categories) {
                $category = $categories->random();
                $featured->category()->associate($category);
                $featured->save();
            });

        $this->command->info('Featured seeded successfully.');
    }

}
