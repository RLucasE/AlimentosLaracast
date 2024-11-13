<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\RolePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // Registra la política de RolePolicy para el modelo User
    ];

    public function boot()
    {
        // Aquí puedes definir gates personalizados si es necesario
    }
}
