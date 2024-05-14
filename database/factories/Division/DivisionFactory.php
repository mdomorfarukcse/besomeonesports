<?php

namespace Database\Factories\Division;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Division\Division>
 */
class DivisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->realText(100),
            'gender' => fake()->randomElement(['Male', 'Female', 'Co-Ed']),
            'status' => fake()->randomElement(['Active', 'Inactive'])
        ];
    }
}
