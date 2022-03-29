<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'loan_type' => Arr::random(array_keys(loan_type())),
            'loan_terms' => $this->faker->numberBetween(1, 10),
            'installment_amount' => $this->faker->numberBetween(5000, 100000),
            'user_id' => User::all()->except(1)->random()->id,
        ];
    }
}
