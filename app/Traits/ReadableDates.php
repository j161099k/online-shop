<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

trait ReadableDates
{

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
