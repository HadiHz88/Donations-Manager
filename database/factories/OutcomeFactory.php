<?php

namespace Database\Factories;

use App\Models\Outcome;
use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Outcome>
 */
class OutcomeFactory extends Factory
{
    protected $model = Outcome::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $paymentMethods = ['Bank Transfer', 'Cash', 'Check', 'Other'];

        return [
            'amount' => fake()->randomFloat(2, 500),
            'currency_id' => fake()->randomElement([1, 2, 3]), // Assuming you have currency IDs 1, 2, and 3
            'target_organization' => fake()->company(),
            'date_sent' => fake()->dateTimeBetween('-180 days', 'now'),
            'payment_method' => fake()->randomElement($paymentMethods),
            'notes' => fake()->sentence(),
        ];
    }
}
