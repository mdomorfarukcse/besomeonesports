<?php

namespace Database\Factories\Faq;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->realText(50),
            'description' => fake()->sentence(rand(200, 500), true),
            'status' => fake()->randomElement(['Active', 'Inactive'])
        ];
    }
}
