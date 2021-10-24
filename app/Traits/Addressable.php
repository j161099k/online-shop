<?php

namespace App\Traits;

use App\Models\Address;

trait Addressable 
{
    public function addresses() 
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}