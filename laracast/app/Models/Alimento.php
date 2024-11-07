<?php

namespace App\Models;

use Database\Factories\AlimentoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    /** @use HasFactory<\Database\Factories\AlimentoFactory> */

    use HasFactory;
    protected $table = 'alimentos';

    protected $fillable = [
        'name',
        'alimento_state',
        'alimento_type'
    ];

    public function AlimentoState()
    {
        return $this->belongsTo(AlimentoState::class, 'alimento_state');
    }

    public function AlimentoType()
    {
        return $this->belongsTo(AlimentoType::class, 'alimento_type');
    }
}
