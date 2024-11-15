<?php

namespace Database\Factories;

use App\Models\Alimento;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'description' => fake()->text(),
            'price' => fake()->numberBetween(300, 1500),
            'cant' => fake()->numberBetween(1, 10),
            'alimento_num' => Alimento::inRandomOrder()->first()->id,
        ];
    }
}
