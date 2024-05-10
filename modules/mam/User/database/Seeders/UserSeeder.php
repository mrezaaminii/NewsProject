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
        // Create the user
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt(12345678),
        ]);

        $superAdminRole = Role::where('name', 'super admin')->first();

        if ($superAdminRole) {
            $user->assignRole($superAdminRole);
        } else {
            $this->command->info('Super admin role does not exist.');
        }
    }
}
