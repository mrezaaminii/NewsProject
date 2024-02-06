<?php

namespace mam\User\database\Seeders;

use Illuminate\Database\Seeder;
use mam\User\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt(12345678),
        ]);

        $user->givePermissionTo('permission super admin');
    }
}
