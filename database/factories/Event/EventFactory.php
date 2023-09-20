<?php

namespace Database\Factories\Event;

use Carbon\Carbon;
use App\Models\Event\Event;
use App\Models\Venue\Venue;
use Illuminate\Support\Str;
use App\Models\Player\Player;
use App\Models\Division\Division;
use Illuminate\Support\Facades\DB;
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
            'name' => ucfirst(fake()->words(3, true)),
            'registration_fee' => rand(199, 599),
            'start' => Carbon::today()->addDays(rand(1, 30))->format('Y-m-d'),
            'end' => Carbon::today()->addDays(rand(31, 60))->format('Y-m-d'),
            'description' => fake()->realText(2000),
            'status' => fake()->randomElement(['Active', 'Inactive'])
        ];
    }

    // Use afterCreating to attach divisions to events
    public function configure()
    {
        return $this->afterCreating(function (Event $event) {
            $divisions = Division::inRandomOrder()->limit(rand(1, 10))->get();
            $event->divisions()->attach($divisions);
            
            $venues = Venue::inRandomOrder()->limit(rand(1, 10))->get();
            $event->venues()->attach($venues);

            $players = Player::inRandomOrder()->limit(rand(1, 10))->get();
            foreach ($players as $player) {
                // Generate a unique transaction_id
                $transactionId = Str::random(20) . unique_id() . rand(11, 99999) . Str::random(5);

                // Check if the transaction_id already exists in the database
                while (DB::table('event_player')->where('transaction_id', $transactionId)->exists()) {
                    $transactionId = Str::random(20) . unique_id() . rand(11, 99999) . Str::random(5);
                }

                $event->players()->attach($player, [
                    'paid_by' => rand(1, 2),
                    'total_paid' => rand(199, 599),
                    'transaction_id' => $transactionId,
                    'invoice_number' => $transactionId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }
}
