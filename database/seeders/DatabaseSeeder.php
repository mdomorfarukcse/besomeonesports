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
use Illuminate\Database\Seeder;
use Database\Seeders\user\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        SportFactory::factoryForModel(Sport::class)->count(10)->create();
        // VenueFactory::factoryForModel(Venue::class)->count(10)->create();
        // CoachFactory::factoryForModel(User::class)->count(10)->create();
        // PlayerFactory::factoryForModel(User::class)->count(10)->create();
        // DivisionFactory::factoryForModel(Division::class)->count(10)->create();
        // SeasonFactory::factoryForModel(Season::class)->count(10)->create();
        // EventFactory::factoryForModel(Event::class)->count(10)->create();
        // TeamFactory::factoryForModel(Team::class)->count(10)->create();

        // CategoryFactory::factoryForModel(Category::class)->count(50)->create();
        // ProductFactory::factoryForModel(Product::class)->count(50)->create();
        // OrderFactory::factoryForModel(Order::class)->count(100)->create();
    }
}
