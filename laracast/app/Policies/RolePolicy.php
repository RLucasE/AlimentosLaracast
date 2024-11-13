<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function isAdm(User $user): bool
    {
        //

        return $user->user_type === 'Adm';
    }


    public function isCom(User $user): bool
    {
        //
        return $user->user_type == 'Com';
    }


    public function isVend(User $user): bool
    {
        //
        return $user->user_type == 'Vend';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        //
        return false;
    }
}
