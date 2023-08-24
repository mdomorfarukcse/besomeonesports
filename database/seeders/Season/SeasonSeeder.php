<?php

namespace Database\Seeders\Season;

use App\Models\Season\Season;
use Illuminate\Database\Seeder;
use Database\Factories\Season\SeasonFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeasonFactory::factoryForModel(Season::class)->count(10)->create();
    }
}
