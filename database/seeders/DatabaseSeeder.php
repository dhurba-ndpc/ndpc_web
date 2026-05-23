<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Roles
        $superAdminRole = Role::firstOrCreate([
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);

        $adminRole = Role::firstOrCreate([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        // Super Admin User
        $superAdmin = User::firstOrCreate(
            [
                'email' => 'dhurba179@gmail.com',
            ],
            [
                'name' => 'Dhurba Sharma',
                'password' => Hash::make('123456789'),
            ]
        );

        $superAdmin->assignRole($superAdminRole);

        // Admin User
        $admin = User::firstOrCreate(
            [
                'email' => 'admin@gmail.com',
            ],
            [
                'name' => 'Admin User',
                'password' => Hash::make('123456789'),
            ]
        );

        $admin->assignRole($adminRole);
    }
}