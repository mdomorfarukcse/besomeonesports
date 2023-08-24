<?php

namespace Database\Seeders\Sport;

use App\Models\Sport\Sport;
use Illuminate\Database\Seeder;
use Database\Factories\Sport\SportFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SportFactory::factoryForModel(Sport::class)->count(10)->create();
    }
}
