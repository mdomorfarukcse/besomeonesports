<?php

namespace Database\Seeders\Shop;

use Illuminate\Database\Seeder;
use App\Models\Shop\Category\Category;
use Database\Factories\Shop\Category\CategoryFactory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryFactory::factoryForModel(Category::class)->count(50)->create();
    }
}
