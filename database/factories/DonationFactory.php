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
            'reference_id' => 'DON-' . strtoupper(fake()->unique()->regexify('[A-Z0-9]{8}')),
            'donor_name' => fake()->name(),
            'amount' => fake()->randomFloat(2, 1000, 10000),
            'currency_id' => $currencies->random()->id,
            'objective_id' => $objectives->random()->id,
            'storage_location' => fake()->randomElement($storageLocations),
            'date_received' => fake()->dateTimeBetween('-6 months', 'now'),
        ];
    }

    public function usd()
    {
        return $this->state(function (array $attributes) {
            return [
                'currency_id' => Currency::where('code', 'USD')->first()->id,
            ];
        });
    }

    public function eur()
    {
        return $this->state(function (array $attributes) {
            return [
                'currency_id' => Currency::where('code', 'EUR')->first()->id,
            ];
        });
    }

    public function vnd()
    {
        return $this->state(function (array $attributes) {
            return [
                'currency_id' => Currency::where('code', 'VND')->first()->id,
            ];
        });
    }
}