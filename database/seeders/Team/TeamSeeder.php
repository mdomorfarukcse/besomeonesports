<?php

namespace Database\Seeders\Team;

use App\Models\Team\Team;
use Illuminate\Database\Seeder;
use Database\Factories\Team\TeamFactory;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamFactory::factoryForModel(Team::class)->count(10)->create();
    }
}
