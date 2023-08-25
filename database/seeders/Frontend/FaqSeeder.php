<?php

namespace Database\Seeders\Frontend;

use App\Models\Faq\Faq;
use Illuminate\Database\Seeder;
use Database\Factories\Faq\FaqFactory;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FaqFactory::factoryForModel(Faq::class)->count(20)->create();
    }
}
