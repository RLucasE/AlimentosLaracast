<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alimentos extends Model
{
    //
    protected $table = 'alimentos';
    protected $fillable = [
        'tipo'
    ];
}
