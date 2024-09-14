<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([JenisUserSeeder::Class]);
        $this->call([UserRolePermissionSeeder::Class]);

        // $this->call([JenisOPDSeeder::Class]);
        // $this->call([OpdSeeder::Class]);
        // $this->call([PangkatSeeder::Class]);
        // $this->call([UserDetailSeeder::Class]);
    }
}
