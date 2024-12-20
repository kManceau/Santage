<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Child>
 */
class ChildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'country' => fake()->country(),
                'birthdate' => fake()->dateTimeBetween('01-01-2012', '20-12-2024'),
                'gender' => fake()->randomElement(['male', 'female']),
                'address' => fake()->streetAddress(),
                'city' => fake()->city(),
                'postal_code' => fake()->postcode(),
                'scolar_note' => fake()->numberBetween(1,20),
                'behavior_note' => fake()->numberBetween(1,20),
                'user_id'=> null,
        ];
    }
}
