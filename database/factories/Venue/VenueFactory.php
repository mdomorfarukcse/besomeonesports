<?php

namespace Database\Factories\Venue;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venue\Venue>
 */
class VenueFactory extends Factory
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
            'street' => fake()->word(),
            'city' => fake()->city(),
            'state' => fake()->word(),
            'postal_code' => fake()->postcode(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'status' => fake()->randomElement(['Active', 'Inactive'])
        ];
    }
}
