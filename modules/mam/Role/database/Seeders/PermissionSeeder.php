<?php

namespace mam\Role\database\Seeders;

use Illuminate\Database\Seeder;
use mam\Role\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Permission::$permissions as $permission){
            \Spatie\Permission\Models\Permission::findOrCreate($permission);
        }
    }
}
