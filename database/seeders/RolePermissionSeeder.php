<?php

namespace Database\Seeders;

use App\Models\FeatureAreas;
use App\Models\Notice;
use App\Models\PromotionMessage;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [
            'Role-View',
            'Role-Create',
            'Role-Edit',
            'Role-Delete',

            'User-View',
            'User-Create',
            'User-Edit',
            'User-Delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        $role = Role::firstOrCreate([
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);
        $role->syncPermissions($permissions);


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
        $customModels = [
            'LeadingTeam' => TeamMember::class,
            'BoardOfDirectors' => TeamMember::class,
            'Notice' => Notice::class,
            'Report' => Notice::class,
            'DarkBanner' => FeatureAreas::class,
            'MissionVision' => FeatureAreas::class,
            'Service' => Service::class,
            'Feature' => Service::class,
            'PromotionMessage' => PromotionMessage::class,
            'PlayStore' => PromotionMessage::class,

        ];

        $hiddenRealModels = [
            'TeamMember',
            'Notice',
            'FeatureAreas',
            'Service',
            'PromotionMessage',
        ];

        $models = array_keys($customModels);

        foreach (scandir(app_path('Models')) as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $modelName = str_replace('.php', '', $file);

            if (in_array($modelName, $hiddenRealModels)) {
                continue;
            }

            $models[] = $modelName;
        }

        return array_values(array_unique($models));
    }
}
