<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
 

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $models = $this->getModels();

        $actions = ['View', 'Create', 'Edit', 'Delete'];

        $allPermissions = [];

        foreach ($models as $model) {
            foreach ($actions as $action) {
                $permission = Permission::firstOrCreate([
                    'name' => "{$model}-{$action}",
                    'guard_name' => 'web',
                ]);

                $allPermissions[] = $permission->name;
            }
        }

        $this->command->info('Permissions seeded successfully.');
    }
    public function getModels()
    {
        $models = [];
        $path = app_path('Models');

        foreach (scandir($path) as $file) {
            if ($file !== '.' && $file !== '..') {
                $models[] = str_replace('.php', '', $file);
            }
        }

        return $models;
    }
}
