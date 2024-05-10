<?php

namespace mam\Role\database\Seeders;

use Illuminate\Database\Seeder;
use mam\Role\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        foreach (Permission::$permissions as $permission) {
            \Spatie\Permission\Models\Permission::findOrCreate($permission);
        }
    }
}
