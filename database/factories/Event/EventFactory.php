<?php

namespace Database\Factories\Event;

use App\Models\Event\Event;
use App\Models\Division\Division;
use App\Models\Venue\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'season_id' => rand(1, 9),
            'sport_id' => rand(1, 9),
            'name' => fake()->words(5, true),
            'registration_fee' => fake()->randomDigit(),
            'start' => fake()->date(),
            'end' => fake()->date(),
            'description' => fake()->realText(200),
            'status' => fake()->randomElement(['Active', 'Inactive'])
        ];
    }

    // Use afterCreating to attach divisions to events
    public function configure()
    {
        return $this->afterCreating(function (Event $event) {
            $divisions = Division::inRandomOrder()->limit(10)->get(); // Get 10 random divisions
            $event->divisions()->attach($divisions);
            
            $venues = Venue::inRandomOrder()->limit(10)->get(); // Get 10 random venues
            $event->venues()->attach($venues);
        });
    }
}
