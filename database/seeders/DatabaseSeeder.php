<?php

namespace Database\Seeders;

use App\Models\Division\Division;
use App\Models\Event\Event;
use App\Models\Season\Season;
use App\Models\Shop\Category\Category;
use App\Models\Shop\Order\Order;
use App\Models\Shop\Product\Product;
use App\Models\Sport\Sport;
use App\Models\Team\Team;
use App\Models\User;
use App\Models\Venue\Venue;
use Database\Factories\Coach\CoachFactory;
use Database\Factories\Division\DivisionFactory;
use Database\Factories\Event\EventFactory;
use Database\Factories\Player\PlayerFactory;
use Database\Factories\Season\SeasonFactory;
use Database\Factories\Shop\CategoryFactory;
use Database\Factories\Shop\OrderFactory;
use Database\Factories\Shop\ProductFactory;
use Database\Factories\Sport\SportFactory;
use Database\Factories\Team\TeamFactory;
use Database\Factories\Venue\VenueFactory;
use Database\Seeders\Coach\CoachSeeder;
use Database\Seeders\Division\DivisionSeeder;
use Database\Seeders\Event\EventSeeder;
use Database\Seeders\Frontend\FaqSeeder;
use Database\Seeders\Frontend\SponsorSeeder;
use Database\Seeders\Player\PlayerSeeder;
use Database\Seeders\Season\SeasonSeeder;
use Database\Seeders\Shop\CategorySeeder;
use Database\Seeders\Shop\OrderSeeder;
use Database\Seeders\Shop\ProductSeeder;
use Database\Seeders\Sport\SportSeeder;
use Database\Seeders\Team\TeamSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\user\UserSeeder;
use Database\Seeders\Venue\VenueSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        $this->call(SportSeeder::class);
        $this->call(VenueSeeder::class);
        $this->call(CoachSeeder::class);
        $this->call(PlayerSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(SeasonSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(TeamSeeder::class);

        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(OrderSeeder::class);

        $this->call(FaqSeeder::class);
        $this->call(SponsorSeeder::class);

        // CoachFactory::factoryForModel(User::class)->count(10)->create();
        // PlayerFactory::factoryForModel(User::class)->count(10)->create();
        
        // TeamFactory::factoryForModel(Team::class)->count(10)->create();

        // CategoryFactory::factoryForModel(Category::class)->count(50)->create();
        // ProductFactory::factoryForModel(Product::class)->count(50)->create();
        // OrderFactory::factoryForModel(Order::class)->count(100)->create();
    }
}
