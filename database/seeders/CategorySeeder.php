<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventCategories = array(
            array(
                'name' => 'Cars',
                'description' => 'Advertisements related to buying, selling, or renting cars and other vehicles.',
            ),
            array(
                'name' => 'Real Estate',
                'description' => 'Advertisements for properties, including houses, apartments, and commercial spaces.',
            ),
            array(
                'name' => 'Electronics',
                'description' => 'Advertisements for electronic devices, gadgets, and appliances.',
            ),
            array(
                'name' => 'Jobs',
                'description' => 'Advertisements for job vacancies, employment opportunities, and career services.',
            ),
            array(
                'name' => 'Services',
                'description' => 'Advertisements for various services, such as home repairs, professional services, and event planning.',
            ),
            array(
                'name' => 'Home & Garden',
                'description' => 'Advertisements related to home decor, furniture, gardening supplies, and appliances.',
            ),
            array(
                'name' => 'Fashion',
                'description' => 'Advertisements for clothing, accessories, and fashion-related products.',
            ),
            array(
                'name' => 'Pets',
                'description' => 'Advertisements for pets, pet supplies, and pet adoption services.',
            ),
            array(
                'name' => 'Books & Education',
                'description' => 'Advertisements for books, educational materials, and tutoring services.',
            ),
            array(
                'name' => 'Sports & Fitness',
                'description' => 'Advertisements for sports equipment, fitness classes, and gym memberships.',
            ),
        );



    }
}
