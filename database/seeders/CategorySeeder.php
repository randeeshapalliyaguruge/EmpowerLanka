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
            ['name' => 'Electronics', 'description' => 'Buy and sell electronic devices and gadgets.'],
            ['name' => 'Fashion', 'description' => 'Browse and sell fashion items such as clothing, accessories, and footwear.'],
            ['name' => 'Home & Garden', 'description' => 'Find furniture, home decor, appliances, and gardening tools.'],
            ['name' => 'Vehicles', 'description' => 'Buy and sell cars, motorcycles, and other vehicles.'],
            ['name' => 'Services', 'description' => 'Offer or find various services like repairs, maintenance, and freelancing.'],
            ['name' => 'Real Estate', 'description' => 'Rent or sell properties including houses, apartments, and commercial spaces.'],
            ['name' => 'Business & Industrial', 'description' => 'Discover equipment, machinery, and supplies for business purposes.'],
            ['name' => 'Sports & Fitness', 'description' => 'Buy, sell, or trade sports equipment, fitness gear, and accessories.'],
            ['name' => 'Toys & Games', 'description' => 'Find or sell toys, board games, and other recreational items.'],
            ['name' => 'Jobs', 'description' => 'Explore job opportunities or post job listings for small businesses.'],
        ];

        Category::insert($categories);

        $this->command->info('Categories seeded successfully.');
    }
}
