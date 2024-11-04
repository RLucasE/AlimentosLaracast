<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlimentoState extends Model
{
    /** @use HasFactory<\Database\Factories\AlimentoStateFactory> */
    use HasFactory;
    protected $table = 'alimento_states';

    public function alimentos()
    {
        return $this->hasMany(Alimento::class);
    }
}
