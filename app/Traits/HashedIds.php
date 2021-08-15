<?php

namespace App\Traits;

use Vinkla\Hashids\Facades\Hashids;

/**
 *  
 */
trait HashedIds
{
    public function getIdAttribute($value) {
        return Hashids::encode($value);
    }
}
