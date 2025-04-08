<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Objective>
 */
class ObjectiveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $objectives = [
            'Education Fund',
            'Food Bank Support',
            'Housing Assistance',
            'Medical Care',
            'Clothing Drive',
            'Transportation Aid',
            'Utilities Support'
        ];
        
        return [
            'title' => $this->faker->unique()->randomElement($objectives)
        ];
    }
}