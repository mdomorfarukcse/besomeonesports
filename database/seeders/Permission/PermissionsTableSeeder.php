<?php

namespace Database\Seeders\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            'dashboard',
            'sport',
            'venue',
            'court',
            'coach',
            'referee',
            'guardian',
            'player',
            'division',
            'season',
            'league',
            'league_registration',
            'team',
            'role',
            'permission',
            'shop_dashboard',
            'shop_order',
            'shop_product',
            'shop_category',
            'schedule',
            'ads',

            // Frontend
            'sponsor',
            'partner',
            'video',
            'blog',
            'gallery',
            'news',
            'contact',

            // Settings
            'settings',
        ];

        foreach ($groups as $group) {
            $permissions = [
                'index',
                'create',
                'show',
                'update',
                'destroy',
            ];

            foreach ($permissions as $permission) {
                $permissionName = "{$group}.{$permission}";
                
                Permission::create([
                    'name' => $permissionName,
                    'group_name' => $group,
                ]);
            }
        }
    }
}