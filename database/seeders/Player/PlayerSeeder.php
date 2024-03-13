<?php

namespace Database\Seeders\Player;

use App\Models\User;
use App\Models\Player\Player;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Database\Factories\Player\PlayerFactory;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function() {
            for ($i = 0; $i < 10; $i++) {
                $user = PlayerFactory::factoryForModel(User::class)->create();

                $role = Role::where('name', 'player')->first();
                if ($role) {
                    $user->assignRole($role);
                }

                Player::create([
                    'user_id' => $user->id,
                    'player_id' => unique_id().$i,
                    'division_id' => rand(1,10),
                    'first_name' => fake()->firstName(),
                    'last_name' => fake()->lastName(),
                    'birthdate' => fake()->date(),
                    'contact_number' => fake()->phoneNumber(),
                    'grade' => fake()->realText(10),
                    'shirt_size' => fake()->realText(10),
                    'short_size' => fake()->realText(10),
                    'street_address' => fake()->streetAddress(),
                    'city' => fake()->city(),
                    'state' => fake()->words(2, true),
                    'postal_code' => fake()->postcode(),
                    'extended_address' => fake()->address(),
                    'guardian1_name' => fake()->name(),
                    'guardian1_email' => fake()->safeEmail(),
                    'guardian1_contact' => fake()->phoneNumber(),
                    'guardian1_relationship' => fake()->name(),
                    
                    'status' => fake()->randomElement(['Active', 'Inactive', 'Banned'])
                ]);
            }
        });
    }
}
