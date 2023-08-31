<?php
namespace Database\Seeders\user;

use App\Models\User;
use Illuminate\Support\Str;
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
        ]);

        // Assign a role to the admin
        $adminRole = Role::findByName('admin');
        $admin->assignRole($adminRole);
    }
}
