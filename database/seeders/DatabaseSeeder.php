<?php

namespace Database\Seeders;

// use Illuminate\database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use mam\User\database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    public static array $seeders = [];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (self::$seeders as $seeder){
            $this->call($seeder);
        }

        $this->callOnce(UserSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
