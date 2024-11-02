<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\User;
use App\Models\UserType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        User::factory(20)->create();

        Offer::factory(20)->create();
    }
}
