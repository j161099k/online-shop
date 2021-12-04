<?php

namespace App\Traits;

use App\Models\Cart;

trait Cartable 
{
    public function carts()
    {
        return $this->morphMany(Cart::class, 'cartable');
    }
}