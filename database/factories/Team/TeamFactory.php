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
            'team_id' => $this->generateUniqueID(). rand(11, 99999). fake()->word(),
            'event_id' => rand(1, 9),
            'division_id' => rand(1, 9),
            'coach_id' => rand(1, 9),
            'name' => fake()->words(5, true),
            'gender' => fake()->randomElement(['Male','Female','Other']),
            'maximum_players' => rand(3,20),
            'description' => fake()->realText(200),
            'status' => fake()->randomElement(['Active', 'Inactive'])
        ];
    }

    // Use afterCreating to attach divisions to events
    public function configure()
    {
        return $this->afterCreating(function (Team $team) {
            $players = Player::inRandomOrder()->limit(rand(1, 3))->get(); // Get 3 random players
            $team->players()->attach($players);
        });
    }


    // Generate a unique ID with a minimum and maximum length of 10 characters
    private function generateUniqueID() {
        $length = 10;
        $timestampLength = 13; // Length of the timestamp in milliseconds
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
        // Get the current timestamp in milliseconds
        $timestamp = round(microtime(true) * 1000);
    
        // Convert the timestamp to a string and remove the decimal point
        $timestampString = str_replace('.', '', (string)$timestamp);
    
        // Calculate the number of characters needed to fill the remaining length
        $charactersNeeded = $length - $timestampLength;
    
        // Ensure we have enough characters to fill the length
        while (strlen($timestampString) < $charactersNeeded) {
            $randomCharacter = $characters[random_int(0, strlen($characters) - 1)];
            $timestampString .= $randomCharacter;
        }
    
        // Convert the timestamp to all capital letters
        $timestampString = strtoupper($timestampString);
    
        // Combine the timestamp with the random characters and take the first $length characters
        $uniqueID = substr($timestampString, 0, $length);
    
        return $uniqueID;
    }
}
