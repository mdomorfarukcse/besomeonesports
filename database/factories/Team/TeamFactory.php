<?php

namespace Database\Factories\Team;

use App\Models\Player\Player;
use App\Models\Team\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'team_id' => unique_id(11, 11). rand(11, 99999). fake()->word(),
            'event_id' => rand(1, 10),
            'division_id' => rand(1, 9),
            'coach_id' => rand(1, 9),
            'name' => ucfirst(fake()->words(3, true)),
            'gender' => fake()->randomElement(['Male','Female','Other']),
            'maximum_players' => rand(10, 15),
            'description' => fake()->realText(200),
            'status' => fake()->randomElement(['Active', 'Inactive'])
        ];
    }

    // Use afterCreating to attach divisions to events
    public function configure()
    {
        return $this->afterCreating(function (Team $team) {
            $players = Player::inRandomOrder()->limit(rand(1, 10))->get();
            $team->players()->attach($players);
        });
    }
}
