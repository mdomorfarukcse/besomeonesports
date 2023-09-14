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
                    'first_name' => fake()->firstName(),
                    'last_name' => fake()->lastName(),
                    'birthdate' => fake()->date(),
                    'contact_number' => fake()->phoneNumber(),
                    'street_address' => fake()->streetAddress(),
                    'city' => fake()->city(),
                    'state' => fake()->words(2, true),
                    'postal_code' => fake()->postcode(),
                    'extended_address' => fake()->address(),
                    'father_name' => fake()->name(),
                    'father_email' => fake()->safeEmail(),
                    'father_contact' => fake()->phoneNumber(),
                    'mother_name' => fake()->name(),
                    'mother_email' => fake()->safeEmail(),
                    'mother_contact' => fake()->phoneNumber(),
                    'guardian_relation' => fake()->randomElement(['Father', 'Mother', 'Brother']),
                    'guardian_name' => fake()->name(),
                    'guardian_email' => fake()->safeEmail(),
                    'guardian_contact' => fake()->phoneNumber(),
                    'status' => fake()->randomElement(['Active', 'Inactive', 'Banned'])
                ]);
            }
        });
    }
}
