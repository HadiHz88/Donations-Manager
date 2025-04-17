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
        $vnd = Currency::where('code', 'VND')->first();

        $objectives = Objective::all();

        // Create USD donations
        Donation::factory()
            ->count(3)
            ->usd()
            ->create();

        // Create EUR donations
        Donation::factory()
            ->count(2)
            ->eur()
            ->create();

        // Create VND donations
        Donation::factory()
            ->count(2)
            ->vnd()
            ->create();

        // Create outcomes for some donations
        $donations = Donation::all();
        foreach ($donations as $donation) {
            // Create 1-2 outcomes for each donation
            $outcomeCount = fake()->numberBetween(1, 2);
            Outcome::factory()
                ->count($outcomeCount)
                ->forDonation($donation)
                ->create();
        }
    }
}