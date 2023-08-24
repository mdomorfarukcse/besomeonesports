<?php

namespace Database\Factories\Season;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Season\Season>
 */
class SeasonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'year' => fake()->year(),
            'start' => fake()->date(),
            'end' => fake()->date(),
            'status' => fake()->randomElement(['Active', 'Inactive'])
        ];
    }
}
