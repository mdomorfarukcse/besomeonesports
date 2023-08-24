<?php

namespace Database\Seeders\Venue;

use App\Models\Venue\Venue;
use Illuminate\Database\Seeder;
use Database\Factories\Venue\VenueFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VenueFactory::factoryForModel(Venue::class)->count(10)->create();
    }
}
