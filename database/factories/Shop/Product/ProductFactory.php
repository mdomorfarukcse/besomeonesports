<?php

namespace Database\Factories\Shop\Product;

use App\Models\Shop\Category\Category;
use App\Models\Shop\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'product_id' => unique_id(11,11). rand(111, 999). fake()->word(),
            'name' => fake()->words(5, true),
            'quantity' => rand(10,200),
            'purchase_price' => rand(100,299),
            'price' => rand(299,599),
            'colors' => json_encode([fake()->safeColorName(), fake()->safeColorName(), fake()->safeColorName(), fake()->safeColorName()]),
            'sizes' => json_encode(['S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'FREE SIZE']),
            'description' => fake()->realText(200),
            'status' => fake()->randomElement(['Active', 'Inactive'])
        ];
    }

    // Use afterCreating to attach divisions to events
    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            $categories = Category::inRandomOrder()->limit(rand(3,10))->get(); // Get 3 random categories
            $product->categories()->attach($categories);
        });
    }
}
