<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlimentoType extends Model
{
    /** @use HasFactory<\Database\Factories\AlimentoTypeFactory> */
    use HasFactory;

    public function alimentos()
    {
        return $this->hasMany(Alimento::class);
    }
}
