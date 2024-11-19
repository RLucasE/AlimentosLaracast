<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    /** @use HasFactory<\Database\Factories\OfferFactory> */
    use HasFactory;

    protected $fillable = [
        'user_num',
        'alimento_num',
        'description',
        'offer_adress',
        'estado',
        'price',
        'cant'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_num');
    }

    public function alimento()
    {
        return $this->belongsTo(Alimento::class, 'alimento_num');
    }
}
