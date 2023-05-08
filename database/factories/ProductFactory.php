<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'price' => $this->faker->randomFloat(2, 0, 100),
            'description' => $this->faker->text,
            'image' => 'https://placehold.co/600x400',
            'status' => 1
        ];
    }
}
