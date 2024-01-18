<?php

namespace Database\Seeders\Coach;

use App\Models\User;
use App\Models\Coach\Coach;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Database\Factories\Coach\CoachFactory;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function() {
            for ($i = 0; $i < 10; $i++) {
                $user = CoachFactory::factoryForModel(User::class)->create();

                $role = Role::where('name', 'coach')->first();
                if ($role) {
                    $user->assignRole($role);
                }

                Coach::create([
                    'user_id' => $user->id,
                    'coach_id' => unique_id(11,11).$i.rand(1,5000),
                    'first_name' => fake()->firstName(),
                    'last_name' => fake()->lastName(),
                    'position' => fake()->word(),
                    'birthdate' => fake()->date(),
                    'phone_number' => fake()->phoneNumber(),
                    'street_address' => fake()->streetAddress(),
                    'city' => fake()->city(),
                    'state' => fake()->words(2, true),
                    'postal_code' => fake()->postcode(),
                    'driver_license_no' => unique_id(11,11).$i.rand(1,5000),
                    'note' => fake()->sentence(10, true),
                    'status' => fake()->randomElement(['Active', 'Inactive', 'Banned'])
                ]);
            }
        });
    }
}
