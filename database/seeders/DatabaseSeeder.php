<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Super Admin Role
        $role = Role::firstOrCreate([
            'name' => 'Super Admin'
        ]);

        // Create User
        $user = User::firstOrCreate(
            [
                'email' => 'dhurba179@gmail.com',
            ],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('123456789'),
            ]
        );

        // Assign Role
        $user->assignRole($role);
    }
}
