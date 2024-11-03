<?php

namespace Database\Factories;

use App\Models\AlimentoState;
use App\Models\AlimentoType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alimento>
 */
class AlimentoFactory extends Factory
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
            'name' => 'Coca cola',
            'alimento_state' => AlimentoState::inRandomOrder()->first()->id,
            'alimento_type' => AlimentoType::inRandomOrder()->first()->id
        ];
    }
}
