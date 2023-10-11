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
            'guardian',
            'player',
            'user',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);

            // Assign permissions to roles based on the group
            if ($role === 'developer') {
                $permissions = [
                    'dashboard.index',
                    'dashboard.create',
                    'dashboard.show',
                    'dashboard.update',
                    'dashboard.destroy',
                    
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
                    
                    'court.index',
                    'court.create',
                    'court.show',
                    'court.update',
                    'court.destroy',
                    
                    'coach.index',
                    'coach.create',
                    'coach.show',
                    'coach.update',
                    'coach.destroy',
                    
                    'guardian.index',
                    'guardian.create',
                    'guardian.show',
                    'guardian.update',
                    'guardian.destroy',
                    
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
                    
                    'league.index',
                    'league.create',
                    'league.show',
                    'league.update',
                    'league.destroy',
                    
                    'league_registration.index',
                    'league_registration.create',
                    'league_registration.show',
                    'league_registration.update',
                    'league_registration.destroy',
                    
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
                    
                    'schedule.index',
                    'schedule.create',
                    'schedule.show',
                    'schedule.update',
                    'schedule.destroy',

                    'blog.index',
                    'blog.create',
                    'blog.show',
                    'blog.update',
                    'blog.destroy',
                    
                    'news.index',
                    'news.create',
                    'news.show',
                    'news.update',
                    'news.destroy',

                    'sponsor.index',
                    'sponsor.create',
                    'sponsor.show',
                    'sponsor.update',
                    'sponsor.destroy',

                    'gallery.index',
                    'gallery.create',
                    'gallery.show',
                    'gallery.update',
                    'gallery.destroy',

                    'video.index',
                    'video.create',
                    'video.show',
                    'video.update',
                    'video.destroy',

                    'ads.index',
                    'ads.create',
                    'ads.show',
                    'ads.update',
                    'ads.destroy',
                ];
            } elseif ($role === 'admin') {
                $permissions = [
                    'dashboard.index',
                    'dashboard.create',
                    'dashboard.show',
                    'dashboard.update',
                    'dashboard.destroy',
                    
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
                    
                    'court.index',
                    'court.create',
                    'court.show',
                    'court.update',
                    'court.destroy',
                    
                    'coach.index',
                    'coach.create',
                    'coach.show',
                    'coach.update',
                    'coach.destroy',
                    
                    'guardian.index',
                    'guardian.create',
                    'guardian.show',
                    'guardian.update',
                    'guardian.destroy',
                    
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
                    
                    'league.index',
                    'league.create',
                    'league.show',
                    'league.update',
                    'league.destroy',
                    
                    'league_registration.index',
                    'league_registration.create',
                    'league_registration.show',
                    'league_registration.update',
                    'league_registration.destroy',
                    
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
                    
                    'schedule.index',
                    'schedule.create',
                    'schedule.show',
                    'schedule.update',
                    'schedule.destroy',

                    'blog.index',
                    'blog.create',
                    'blog.show',
                    'blog.update',
                    'blog.destroy',
                    
                    'news.index',
                    'news.create',
                    'news.show',
                    'news.update',
                    'news.destroy',

                    'sponsor.index',
                    'sponsor.create',
                    'sponsor.show',
                    'sponsor.update',
                    'sponsor.destroy',

                    'gallery.index',
                    'gallery.create',
                    'gallery.show',
                    'gallery.update',
                    'gallery.destroy',

                    'video.index',
                    'video.create',
                    'video.show',
                    'video.update',
                    'video.destroy',

                    'ads.index',
                    'ads.create',
                    'ads.show',
                    'ads.update',
                    'ads.destroy',
                ];
            } elseif ($role === 'coach') {
                $permissions = [
                    'dashboard.index',

                    'player.index',
                    'player.show',
                    
                    'league.index',
                    'league.show',
                    
                    'league_registration.index',
                    'league_registration.create',
                    'league_registration.show',
                    
                    'team.index',
                    'team.show',
                    
                    'shop_order.index',
                    'shop_order.create',
                    'shop_order.show',
                    
                    'shop_product.index',
                    'shop_product.show',
                    
                    'shop_category.index',
                    'shop_category.show',
                    
                    'schedule.index',
                    'schedule.show',
                ];
            } elseif ($role === 'guardian') {
                $permissions = [
                    'dashboard.index',

                    'player.index',
                    'player.create',
                    'player.show',
                    'player.update',
                    
                    'league.index',
                    'league.show',
                    
                    'league_registration.index',
                    'league_registration.create',
                    'league_registration.show',
                    
                    'team.index',
                    'team.show',
                    
                    'shop_order.index',
                    'shop_order.create',
                    'shop_order.show',
                    
                    'shop_product.index',
                    'shop_product.show',
                    
                    'shop_category.index',
                    'shop_category.show',
                    
                    'schedule.index',
                    'schedule.show',
                ];
            }  elseif ($role === 'player') {
                $permissions = [
                    'dashboard.index',
                    
                    'coach.index',
                    'coach.show',
                    
                    'league.index',
                    'league.show',
                    
                    'league_registration.index',
                    'league_registration.create',
                    'league_registration.show',
                    
                    'team.index',
                    'team.show',
                    
                    'shop_order.index',
                    'shop_order.create',
                    'shop_order.show',
                    
                    'shop_product.index',
                    'shop_product.show',
                    
                    'shop_category.index',
                    'shop_category.show',
                    
                    'schedule.index',
                    'schedule.show',
                ];
            } else {
                // Default permissions for other roles (e.g., 'user')
                $permissions = [
                    'dashboard.index',
                    
                    'league.index',
                    'league.show',
                    
                    'shop_order.index',
                    'shop_order.create',
                    'shop_order.show',
                    
                    'shop_product.index',
                    'shop_product.show',
                    
                    'shop_category.index',
                    'shop_category.show',
                    
                    'schedule.index',
                    'schedule.show',
                ];
            }

            $roleInstance = Role::findByName($role);
            $roleInstance->givePermissionTo($permissions);
        }
    }
}