<?php

namespace App\Models;

use App\Traits\SecureId;
use App\Traits\Orderable;
use App\Traits\ReadableDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    use HasFactory, SoftDeletes, Orderable, ReadableDates, SecureId;

    public function combos()
    {
        return $this->belongsToMany(Combo::class);
    }
}
