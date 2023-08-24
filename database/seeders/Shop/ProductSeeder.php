<?php

namespace Database\Seeders\Shop;

use Illuminate\Database\Seeder;
use App\Models\Shop\Product\Product;
use Database\Factories\Shop\Product\ProductFactory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductFactory::factoryForModel(Product::class)->count(50)->create();
    }
}
