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
                'first_name' => fake()->name(),
                'last_name' => fake()->name(),
                'country' => fake()->country(),
                'birthdate' => fake()->date(),
                'gender' => fake()->randomElement(['male', 'female']),
                'address' => fake()->streetAddress(),
                'city' => fake()->city(),
                'postal_code' => fake()->postcode(),
                'scolar_note' => fake()->numberBetween(1,20),
                'behavior_note' => fake()->numberBetween(1,20),
                'user_id'=> rand(1,User::count())
        ];
    }
}
