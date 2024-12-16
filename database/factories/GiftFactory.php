<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gift>
 */
class GiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'good' => fake()->boolean(),
            'name' => fake()->firstName(),
            'description' => fake()->paragraph(),
            'category_id' => rand(1, Category::count()),
        ];
    }
}
