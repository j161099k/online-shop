<?php

namespace App\Traits;

use Illuminate\Support\Facades\Crypt;

trait SecureId
{
    public function getIdAttribute($value) 
    {
        return Crypt::encrypt($value);
    }
}
