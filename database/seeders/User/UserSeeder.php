<?php
namespace Database\Seeders\user;

use App\Models\User;
use App\Models\Coach\Coach;
use Illuminate\Support\Str;
use App\Models\Player\Player;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a developer
        $developer = User::create([
            'name' => 'Demo developer',
            'email' => 'developer@mail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'birthdate' => fake()->date(),
            'contact_number' => fake()->phoneNumber(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->words(2, true),
            'postal_code' => fake()->postcode(),
        ]);
        // Assign a role to the developer
        $developerRole = Role::findByName('developer');
        $developer->assignRole($developerRole);
        
        
        // Create a admin
        $admin = User::create([
            'name' => 'Demo Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'birthdate' => fake()->date(),
            'contact_number' => fake()->phoneNumber(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->words(2, true),
            'postal_code' => fake()->postcode(),
        ]);
        // Assign a role to the admin
        $adminRole = Role::findByName('admin');
        $admin->assignRole($adminRole);
        

        // Create a coach
        $coach = User::create([
            'name' => 'Demo Coach',
            'email' => 'coach@mail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        // Assign a role to the coach
        $coachRole = Role::findByName('coach');
        $coach->assignRole($coachRole);
        Coach::create([
            'user_id' => $coach->id,
            'coach_id' => unique_id(11, 11),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'position' => fake()->word(),
            'birthdate' => fake()->date(),
            'phone_number' => fake()->phoneNumber(),
            'street_address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->words(2, true),
            'postal_code' => fake()->postcode(),
            'driver_license_no' => unique_id(),
            'note' => fake()->sentence(10, true),
            'status' => fake()->randomElement(['Active', 'Inactive', 'Banned'])
        ]);

        
        
        // Create a Referee
        $referee = User::create([
            'name' => 'Demo Referee',
            'email' => 'referee@mail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'birthdate' => fake()->date(),
            'contact_number' => fake()->phoneNumber(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->words(2, true),
            'postal_code' => fake()->postcode(),
        ]);
        // Assign a role to the Referee
        $refereeRole = Role::findByName('referee');
        $referee->assignRole($refereeRole);

        
        
        // Create a guardian
        $guardian = User::create([
            'name' => 'Demo Guardian',
            'email' => 'guardian@mail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'birthdate' => fake()->date(),
            'contact_number' => fake()->phoneNumber(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->words(2, true),
            'postal_code' => fake()->postcode(),
        ]);
        // Assign a role to the guardian
        $guardianRole = Role::findByName('guardian');
        $guardian->assignRole($guardianRole);
        

        // Create a player
        $player = User::create([
            'name' => 'Demo Player',
            'email' => 'player@mail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        // Assign a role to the player
        $playerRole = Role::findByName('player');
        $player->assignRole($playerRole);
        Player::create([
            'user_id' => $player->id,
            'player_id' => unique_id(),
            'division_id' => rand(1,10),
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
            'status' => 'Active',
        ]);
        

        // Create a user
        $user = User::create([
            'name' => 'Demo User',
            'email' => 'user@mail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'birthdate' => fake()->date(),
            'contact_number' => fake()->phoneNumber(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->words(2, true),
            'postal_code' => fake()->postcode(), 
        ]);
        // Assign a role to the user
        $userRole = Role::findByName('user');
        $user->assignRole($userRole);
    }
}
