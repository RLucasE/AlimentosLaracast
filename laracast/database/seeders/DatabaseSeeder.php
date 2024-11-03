<?php

namespace Database\Seeders;

use App\Models\AlimentoState;
use App\Models\Offer;
use App\Models\User;
use App\Models\UserType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alimento;
use App\Models\AlimentoType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        UserType::factory()->create([
            'user_type' => 'Com',
            'description' => 'Usurio Comprador'
        ])->make();

        UserType::factory()->create([
            'user_type' => 'Vend',
            'description' => 'Usurio Vendedor'
        ])->make();

        UserType::factory()->create([
            'user_type' => 'Adm',
            'description' => 'Usurio Administradaor'
        ])->make();

        AlimentoState::factory()->create([
            'description' => 'En revision'
        ]);

        AlimentoState::factory()->create([
            'description' => 'Aprobado'
        ]);

        AlimentoType::factory()->create([
            'name' => 'Bebidas no alcoholicas'
        ]);

        AlimentoType::factory()->create([
            'name' => 'Lacteo'
        ]);

        Alimento::factory()->create([
            'name' => 'Coca Cola'
        ]);

        Alimento::factory()->create([
            'name' => 'Dulce de Leche Ilolay'
        ]);

        User::factory(count: 20)->create();

        Offer::factory(10)->create();
    }
}
