<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Featured>
 */
class FeaturedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 2,
            'title' => $this->faker->text(20),
            'price' => $this->faker->randomFloat(2, 1000, 5000),
            'description' => $this->faker->text,
            'image' => 'https://placehold.co/600x400',
            'status' => 1
        ];
    }
}
