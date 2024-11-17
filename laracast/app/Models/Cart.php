<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;
    protected $fillable = [
        'offer_num',
        'comp_num',
        'vend_num',
        'cant'
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_num', 'id');  // Cambia 'offer_num' y 'id' según los nombres correctos de tus campos
    }

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vend_num', 'id');
    }
}
