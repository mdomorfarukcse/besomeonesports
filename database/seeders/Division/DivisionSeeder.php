<?php

namespace Database\Seeders\Division;

use Illuminate\Database\Seeder;
use App\Models\Division\Division;
use Database\Factories\Division\DivisionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DivisionFactory::factoryForModel(Division::class)->count(10)->create();
    }
}
