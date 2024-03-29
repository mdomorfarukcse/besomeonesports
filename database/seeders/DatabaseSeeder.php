<?php

namespace Database\Seeders;

use Database\Seeders\Coach\CoachSeeder;
use Database\Seeders\Court\CourtSeeder;
use Database\Seeders\Division\DivisionSeeder;
use Database\Seeders\League\LeagueSeeder;
use Database\Seeders\Frontend\FaqSeeder;
use Database\Seeders\Frontend\SponsorSeeder;
use Database\Seeders\Permission\PermissionsTableSeeder;
use Database\Seeders\Player\PlayerSeeder;
use Database\Seeders\Role\RolesTableSeeder;
use Database\Seeders\Season\SeasonSeeder;
use Database\Seeders\Shop\CategorySeeder;
use Database\Seeders\Shop\ProductSeeder;
use Database\Seeders\Sport\SportSeeder;
use Database\Seeders\Team\TeamSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\User\UserSeeder;
use Database\Seeders\Venue\VenueSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DivisionSeeder::class);
        
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(SportSeeder::class);
        $this->call(VenueSeeder::class);
        $this->call(CourtSeeder::class);
        $this->call(CoachSeeder::class);
        $this->call(PlayerSeeder::class);
        $this->call(SeasonSeeder::class);
        $this->call(LeagueSeeder::class);
        $this->call(TeamSeeder::class);

        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        // $this->call(OrderSeeder::class);

        $this->call(FaqSeeder::class);
        $this->call(SponsorSeeder::class);
    }
}
