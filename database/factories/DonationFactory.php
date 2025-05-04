<?php

namespace Database\Factories;

use App\Models\Donation;
use App\Models\Currency;
use App\Models\Objective;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    protected $model = Donation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $currencies = Currency::all();
        $objectives = Objective::all();
        $storageLocations = ['Bank', 'Safe', 'Warehouse', 'Food Bank', 'Storage Unit'];

        return [
            'donor_name' => fake()->name(),
            'amount' => fake()->randomFloat(2, 1000, 10000),
            'currency_id' => $currencies->random()->id,
            'objective_id' => $objectives->random()->id,
            'storage_location' => fake()->randomElement($storageLocations),
            'date_received' => fake()->dateTimeBetween('-180 days', 'now'),
        ];
    }
}
