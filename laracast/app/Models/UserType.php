<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    /** @use HasFactory<\Database\Factories\UserTypeFactory> */
    use HasFactory;

    protected $primaryKey = 'user_type';
    // public $incrementing = false; // Esto debe ser falso si 'user_type' no es autoincremental
    // protected $keyType = 'string';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
