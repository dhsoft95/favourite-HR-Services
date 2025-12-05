<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[
            {
                "name":"super_admin",
                "guard_name":"web",
                "permissions":[
                    "view_application","view_any_application","create_application","update_application","restore_application","restore_any_application","replicate_application","reorder_application","delete_application","delete_any_application","force_delete_application","force_delete_any_application",
                    "view_job","view_any_job","create_job","update_job","restore_job","restore_any_job","replicate_job","reorder_job","delete_job","delete_any_job","force_delete_job","force_delete_any_job",
                    "view_role","view_any_role","create_role","update_role","delete_role","delete_any_role",
                    "view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user",
                    "page_Reports",
                    "widget_StatsOverview","widget_RecentApplicationsWidget",
                    "approve_application","reject_application","shortlist_application","schedule_interview","send_rejection_email"
                ]
            },
            {
                "name":"hr_manager",
                "guard_name":"web",
                "permissions":[
                    "view_application","view_any_application","update_application",
                    "approve_application","reject_application","shortlist_application","schedule_interview","send_rejection_email",
                    "view_job","view_any_job",
                    "view_user","view_any_user",
                    "page_Reports",
                    "widget_StatsOverview","widget_RecentApplicationsWidget"
                ]
            },
            {
                "name":"shortlister",
                "guard_name":"web",
                "permissions":[
                    "view_application","view_any_application",
                    "shortlist_application",
                    "widget_StatsOverview","widget_RecentApplicationsWidget"
                ]
            },
            {
                "name":"reviewer",
                "guard_name":"web",
                "permissions":[
                    "view_application","view_any_application","update_application",
                    "schedule_interview","send_rejection_email",
                    "widget_StatsOverview","widget_RecentApplicationsWidget"
                ]
            }
        ]';

        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn ($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
