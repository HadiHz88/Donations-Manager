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
        $donation = Donation::inRandomOrder()->first() ?? Donation::factory()->create();
        $paymentMethods = ['Bank Transfer', 'Cash', 'Check', 'Other'];
        
        return [
            'reference_id' => 'OUT-' . strtoupper(fake()->unique()->regexify('[A-Z0-9]{8}')),
            'amount' => fake()->randomFloat(2, 500, $donation->amount),
            'currency_id' => $donation->currency_id,
            'target_organization' => fake()->company(),
            'source_donation_id' => $donation->id,
            'source_donation_ref' => $donation->reference_id,
            'date_sent' => fake()->dateTimeBetween('-60 days', 'now'),
            'payment_method' => fake()->randomElement($paymentMethods),
            'notes' => fake()->sentence(),
            'receipt_received' => fake()->boolean(),
        ];
    }

    public function forDonation(Donation $donation)
    {
        return $this->state(function (array $attributes) use ($donation) {
            return [
                'currency_id' => $donation->currency_id,
                'source_donation_id' => $donation->id,
                'source_donation_ref' => $donation->reference_id,
                'amount' => fake()->randomFloat(2, 500, $donation->amount),
            ];
        });
    }
}