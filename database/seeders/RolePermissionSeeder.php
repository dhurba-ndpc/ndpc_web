<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define Models
        $models = ['Banner'];

        // Define Actions
        $actions = ['view', 'create', 'edit', 'delete'];

        $permissions = [];

        // Create Permissions Dynamically
        foreach ($models as $model) {
            foreach ($actions as $action) {
                $permissions[] = Permission::firstOrCreate([
                    'name' => $model . '.' . $action
                ]);
            }
        }

        // Roles
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        

        // Assign Permissions

        // Super Admin → All permissions
        $superAdmin->syncPermissions($permissions);

        
    }
}
