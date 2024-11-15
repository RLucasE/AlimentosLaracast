<?php

namespace App\Providers;

use App\Models\Adress;
use App\Models\User;
use App\Policies\RolePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

use function PHPUnit\Framework\isNull;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::policy(User::class, RolePolicy::class);
        Gate::define('new-adress', function (User $user) {
            return Adress::where('user_num', $user->id)->get()->first() === null;
        });
    }
}
