<?php

namespace Database\Seeders\Event;

use App\Models\Division\Division;
use App\Models\Event\Event;
use Illuminate\Database\Seeder;
use Database\Factories\Event\EventFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventFactory::factoryForModel(Event::class)->count(10)->create();
    }
}
