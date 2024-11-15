<?php

namespace Database\Seeders;

use App\Models\Adress;
use App\Models\AlimentoState;
use App\Models\EstadoDir;
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
            'name' => 'Coca Cola',
            'alimento_state' => 1,
            'alimento_type' => 1
        ]);

        Alimento::factory()->create([
            'name' => 'Dulce de Leche Ilolay',
            'alimento_state' => 1,
            'alimento_type' => 1
        ]);

        Alimento::factory()->create([
            'name' => 'Leche',
            'alimento_state' => 2,
            'alimento_type' => 1
        ]);

        Alimento::factory()->create([
            'name' => 'Jamon',
            'alimento_state' => 1,
            'alimento_type' => 2
        ]);

        Alimento::factory()->create([
            'name' => 'Speed',
            'alimento_state' => 1,
            'alimento_type' => 1
        ]);

        User::factory()->create([
            'name' => 'Lucas Ricalde',
            'email' => "vendedor@gmail.com",
            'password' => 387387,
            'user_type' => 'Vend'
        ]);

        User::factory()->create([
            'name' => 'Lucas Ricalde',
            'email' => "adm@gmail.com",
            'password' => 387387,
            'user_type' => 'Adm'
        ]);

        User::factory()->create([
            'name' => 'Lucas Ricalde',
            'email' => "com@gmail.com",
            'password' => 387387,
            'user_type' => 'Com'
        ]);

        EstadoDir::factory()->create([
            'estado_dir' => 'Rev',
            'description' => 'La direccion esta en revision'
        ]);

        EstadoDir::factory()->create([
            'estado_dir' => 'Apr',
            'description' => 'La direccion esta aprobada'
        ]);

        Adress::factory()->create([
            'ciudad' => 'SALTA',
            'cod_post' => 4400,
            'calle' => 'Av. Bolivia 400',
            'numero' => 1,
            'piso' => 1,
            'estado' => 'Apr',
            'user_num' => User::where('email', 'vendedor@gmail.com')->first()
        ]);

        $vendId = User::where('email', 'vendedor@gmail.com')->first()->id;
        $venAdress = Adress::where('user_num', $vendId)->first()->id;

        Offer::factory()->create([
            'user_num' => $vendId,
            'offer_adress' => $venAdress
        ]);
    }
}
