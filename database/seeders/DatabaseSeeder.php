<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use App\Models\User;
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
        /**
         * Seed Demo users
         */
        User::factory()->admin()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        User::factory()->create([
            'name' => 'Test User2',
            'email' => 'test2@example.com',
        ]);

        /**
         * Seed Demo data
         */
        Listing::factory(10)->create([
            'by_user_id' => 1
        ]);
        Listing::factory(10)->create([
            'by_user_id' => 2
        ]);
    }
}
