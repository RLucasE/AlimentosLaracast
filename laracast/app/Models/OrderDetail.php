<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    /** @use HasFactory<\Database\Factories\OrderDetailFactory> */
    use HasFactory;

    protected $fillable = [
        'order',
        'offer',
        'cant',
        'price'
    ];

    public function offerT()
    {
        return $this->belongsTo(Offer::class, 'offer', 'id');
    }
}
