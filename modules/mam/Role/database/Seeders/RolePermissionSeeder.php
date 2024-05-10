<?php

namespace mam\Role\database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use mam\Role\Models\Permission as PermissionModel;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = Permission::all();

        $roles = [
            'سوپر ادمین' => [PermissionModel::PERMISSION_SUPER_ADMIN,PermissionModel::PERMISSION_PANEL,PermissionModel::PERMISSION_USERS,PermissionModel::PERMISSION_CATEGORIES,PermissionModel::PERMISSION_ROLES],
            'پشتیبانی سایت' => [PermissionModel::PERMISSION_PANEL,PermissionModel::PERMISSION_USERS,PermissionModel::PERMISSION_CATEGORIES],
            'اپراتور' => [PermissionModel::PERMISSION_USERS,PermissionModel::PERMISSION_CATEGORIES,PermissionModel::PERMISSION_ROLES],
            'نویسنده' => [PermissionModel::PERMISSION_AUTHORS],
        ];

        foreach ($roles as $roleName => $permissionNames) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $rolePermissions = $permissions->whereIn('name', $permissionNames);
            $role->syncPermissions($rolePermissions);
        }
    }
}
