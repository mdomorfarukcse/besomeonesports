<?php

namespace Database\Seeders\Court;

use App\Models\Court\Court;
use Database\Factories\Court\CourtFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourtFactory::factoryForModel(Court::class)->count(100)->create();
    }
}
