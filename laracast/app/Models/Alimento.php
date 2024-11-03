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
        'tipo'
    ];
}
