<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\Outcome;
use App\Models\Currency;
use App\Models\Objective;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get currencies and objectives
        $usd = Currency::where('code', 'USD')->first();
        $eur = Currency::where('code', 'EUR')->first();
        $vnd = Currency::where('code', 'LBP')->first();

        $objectives = Objective::all();

        // Create USD donations
        Donation::factory()
            ->count(3)
            ->create();

        // Create EUR donations
        Donation::factory()
            ->count(2)
            ->create();

        // Create VND donations
        Donation::factory()
            ->count(2)
            ->create();

        // Create outcomes
        Outcome::factory(4)->create();
    }
}
