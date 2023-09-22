<?php

namespace Database\Seeders\League;

use App\Models\League\League;
use Illuminate\Database\Seeder;
use Database\Factories\League\LeagueFactory;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LeagueFactory::factoryForModel(League::class)->count(10)->create();
    }
}
