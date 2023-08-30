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
                    'coach_id' => $this->generateUniqueID().$i,
                    'first_name' => fake()->firstName(),
                    'last_name' => fake()->lastName(),
                    'position' => fake()->word(),
                    'birthdate' => fake()->date(),
                    'phone_number' => fake()->phoneNumber(),
                    'street_address' => fake()->streetAddress(),
                    'city' => fake()->city(),
                    'state' => fake()->words(2, true),
                    'postal_code' => fake()->postcode(),
                    'usab_license_no' => $this->generateUniqueID().$i,
                    'note' => fake()->sentence(10, true),
                    'status' => fake()->randomElement(['Active', 'Inactive', 'Banned'])
                ]);
            }
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
