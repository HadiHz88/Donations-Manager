<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\Objective;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create 4 objectives
        Objective::factory(4)->create();

        // Create 10 donations
        Donation::factory( 4)->create();
    }
}