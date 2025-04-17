<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $currencies = [
            ['name' => 'US Dollar', 'symbol' => '$'],
            ['name' => 'Euro', 'symbol' => 'eu'],
            ['name' => 'Lebanese Pound', 'symbol' => 'L.B.P.']
        ];

        return [
            'name' => $this->faker->unique()->randomElement($currencies)['name'],
            'symbol' => $this->faker->unique()->randomElement($currencies)['symbol'],
        ];
    }
}
