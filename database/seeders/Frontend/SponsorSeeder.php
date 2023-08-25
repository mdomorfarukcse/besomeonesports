<?php

namespace Database\Seeders\Frontend;

use App\Models\Sponsor\Sponsor;
use Database\Factories\Sponsor\SponsorFactory;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SponsorFactory::factoryForModel(Sponsor::class)->count(10)->create();
    }
}
