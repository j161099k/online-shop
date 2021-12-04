<?php

namespace App\Models;

use App\Traits\Quantity;
use App\Traits\SecureId;
use App\Traits\Cartable;
use App\Traits\ReadableDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Combo extends Model
{
    use HasFactory, SoftDeletes, Cartable, ReadableDates, SecureId;

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot(['quantity']);
    }
}
