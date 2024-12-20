<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartStatus extends Model
{
    /** @use HasFactory<\Database\Factories\CartStatusFactory> */
    use HasFactory;

    protected $primaryKey = 'cart_status';
}
