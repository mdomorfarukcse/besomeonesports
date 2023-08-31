<?php

namespace Database\Seeders\Role;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'developer',
            'admin',
            'coach',
            'player',
            'user',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);

            // Assign permissions to roles based on the group
            if ($role === 'developer') {
                $permissions = [
                    'sport.index',
                    'sport.create',
                    'sport.show',
                    'sport.update',
                    'sport.destroy',
                    
                    'venue.index',
                    'venue.create',
                    'venue.show',
                    'venue.update',
                    'venue.destroy',
                    
                    'coach.index',
                    'coach.create',
                    'coach.show',
                    'coach.update',
                    'coach.destroy',
                    
                    'player.index',
                    'player.create',
                    'player.show',
                    'player.update',
                    'player.destroy',
                    
                    'division.index',
                    'division.create',
                    'division.show',
                    'division.update',
                    'division.destroy',
                    
                    'season.index',
                    'season.create',
                    'season.show',
                    'season.update',
                    'season.destroy',
                    
                    'event.index',
                    'event.create',
                    'event.show',
                    'event.update',
                    'event.destroy',
                    
                    'team.index',
                    'team.create',
                    'team.show',
                    'team.update',
                    'team.destroy',
                    
                    'role.index',
                    'role.create',
                    'role.show',
                    'role.update',
                    'role.destroy',
                    
                    'permission.index',
                    'permission.create',
                    'permission.show',
                    'permission.update',
                    'permission.destroy',
                    
                    'shop_dashboard.index',
                    'shop_dashboard.create',
                    'shop_dashboard.show',
                    'shop_dashboard.update',
                    'shop_dashboard.destroy',
                    
                    'shop_order.index',
                    'shop_order.create',
                    'shop_order.show',
                    'shop_order.update',
                    'shop_order.destroy',
                    
                    'shop_product.index',
                    'shop_product.create',
                    'shop_product.show',
                    'shop_product.update',
                    'shop_product.destroy',
                    
                    'shop_category.index',
                    'shop_category.create',
                    'shop_category.show',
                    'shop_category.update',
                    'shop_category.destroy',
                ];
            } elseif ($role === 'admin') {
                $permissions = [
                    'sport.index',
                    'sport.create',
                    'sport.show',
                    'sport.update',
                    'sport.destroy',
                    
                    'venue.index',
                    'venue.create',
                    'venue.show',
                    'venue.update',
                    'venue.destroy',
                    
                    'coach.index',
                    'coach.create',
                    'coach.show',
                    'coach.update',
                    'coach.destroy',
                    
                    'player.index',
                    'player.create',
                    'player.show',
                    'player.update',
                    'player.destroy',
                    
                    'division.index',
                    'division.create',
                    'division.show',
                    'division.update',
                    'division.destroy',
                    
                    'season.index',
                    'season.create',
                    'season.show',
                    'season.update',
                    'season.destroy',
                    
                    'event.index',
                    'event.create',
                    'event.show',
                    'event.update',
                    'event.destroy',
                    
                    'team.index',
                    'team.create',
                    'team.show',
                    'team.update',
                    'team.destroy',
                    
                    'shop_dashboard.index',
                    'shop_dashboard.create',
                    'shop_dashboard.show',
                    'shop_dashboard.update',
                    'shop_dashboard.destroy',
                    
                    'shop_order.index',
                    'shop_order.create',
                    'shop_order.show',
                    'shop_order.update',
                    'shop_order.destroy',
                    
                    'shop_product.index',
                    'shop_product.create',
                    'shop_product.show',
                    'shop_product.update',
                    'shop_product.destroy',
                    
                    'shop_category.index',
                    'shop_category.create',
                    'shop_category.show',
                    'shop_category.update',
                    'shop_category.destroy',
                ];
            } elseif ($role === 'coach') {
                $permissions = [
                    'sport.index',
                    'sport.show',
                    
                    'venue.index',
                    'venue.show',
                    
                    'coach.index',
                    'coach.show',
                    'coach.update',
                    
                    'player.index',
                    'player.show',
                    
                    'division.index',
                    'division.show',
                    
                    'season.index',
                    'season.show',
                    
                    'event.index',
                    'event.show',
                    
                    'team.index',
                    'team.show',
                    
                    'shop_order.index',
                    'shop_order.create',
                    'shop_order.show',
                    
                    'shop_product.index',
                    'shop_product.show',
                    
                    'shop_category.index',
                    'shop_category.show',
                ];
            }  elseif ($role === 'player') {
                $permissions = [
                    'sport.index',
                    'sport.show',
                    
                    'venue.index',
                    'venue.show',
                    
                    'coach.index',
                    'coach.show',
                    
                    'player.index',
                    'player.show',
                    'player.update',
                    
                    'division.index',
                    'division.show',
                    
                    'season.index',
                    'season.show',
                    
                    'event.index',
                    'event.show',
                    
                    'team.index',
                    'team.show',
                    
                    'shop_order.index',
                    'shop_order.create',
                    'shop_order.show',
                    
                    'shop_product.index',
                    'shop_product.show',
                    
                    'shop_category.index',
                    'shop_category.show',
                ];
            } else {
                // Default permissions for other roles (e.g., 'user')
                $permissions = [
                    'sport.index',
                    'sport.show',
                    
                    'venue.index',
                    'venue.show',
                    
                    'coach.index',
                    'coach.show',
                    
                    'player.index',
                    'player.show',
                    'player.update',
                    
                    'division.index',
                    'division.show',
                    
                    'season.index',
                    'season.show',
                    
                    'event.index',
                    'event.show',
                    
                    'team.index',
                    'team.show',
                    
                    'shop_order.index',
                    'shop_order.create',
                    'shop_order.show',
                    
                    'shop_product.index',
                    'shop_product.show',
                    
                    'shop_category.index',
                    'shop_category.show',
                ];
            }

            $roleInstance = Role::findByName($role);
            $roleInstance->givePermissionTo($permissions);
        }
    }
}