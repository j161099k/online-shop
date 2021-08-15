<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function combos()
    {
        return $this->belongsToMany(Combo::class);
    }

    public function orders()
    {
        return $this->morphToMany(Order::class, 'orderable');
    }
}
