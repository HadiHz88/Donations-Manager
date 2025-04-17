<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Objective;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $currencies = [
            ['code' => 'USD', 'name' => 'US Dollar', 'symbol' => '$', 'exchange_rate' => 1.0000],
            ['code' => 'EUR', 'name' => 'Euro', 'symbol' => '€', 'exchange_rate' => 0.8800],
            ['code' => 'VND', 'name' => 'Lebanese Pounds', 'symbol' => 'LBP', 'exchange_rate' => 89000.0000],
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }

        $objectives = [
            ['name' => 'Food and Water', 'description' => 'Providing food and clean water to those in need.'],
            ['name' => 'Medical Aid', 'description' => 'Offering medical assistance and healthcare services.'],
            ['name' => 'Education', 'description' => 'Supporting educational initiatives and resources.'],
            ['name' => 'Shelter', 'description' => 'Providing safe and secure housing for the homeless.'],
            ['name' => 'Clothing', 'description' => 'Distributing clothing to those in need.'],
        ];

        foreach ($objectives as $objective) {
            Objective::create($objective);
        }
    }
}
