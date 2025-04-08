<?php

namespace Database\Factories;

use App\Models\Objective;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $storeTypes = ['cash', 'bank', 'products', 'other'];
        $amount = $this->faker->randomFloat(2, 100, 10000);
        
        return [
            'donator_name' => $this->faker->name(),
            'objective_id' => Objective::inRandomOrder()->first()->id ?? Objective::factory(),
            'amount' => $amount,
            'spent' => $this->faker->randomFloat(2, 0, $amount),
            'store' => $this->faker->randomElement($storeTypes),
        ];
    }
}