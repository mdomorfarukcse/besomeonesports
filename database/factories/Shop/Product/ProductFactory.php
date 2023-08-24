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
            'product_id' => $this->generateUniqueID(). rand(111, 999). fake()->word(),
            'name' => fake()->words(10, true),
            'quantity' => rand(10,200),
            'purchase_price' => fake()->randomDigit(),
            'price' => fake()->randomDigit(),
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


    // Generate a unique ID with a minimum and maximum length of 10 characters
    private function generateUniqueID() {
        $length = 10;
        $timestampLength = 13; // Length of the timestamp in milliseconds
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
        // Get the current timestamp in milliseconds
        $timestamp = round(microtime(true) * 1000);
    
        // Convert the timestamp to a string and remove the decimal point
        $timestampString = str_replace('.', '', (string)$timestamp);
    
        // Calculate the number of characters needed to fill the remaining length
        $charactersNeeded = $length - $timestampLength;
    
        // Ensure we have enough characters to fill the length
        while (strlen($timestampString) < $charactersNeeded) {
            $randomCharacter = $characters[random_int(0, strlen($characters) - 1)];
            $timestampString .= $randomCharacter;
        }
    
        // Convert the timestamp to all capital letters
        $timestampString = strtoupper($timestampString);
    
        // Combine the timestamp with the random characters and take the first $length characters
        $uniqueID = substr($timestampString, 0, $length);
    
        return $uniqueID;
    }
}
