<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartable()
    {
        return $this->morphTo();
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'cartable')
        ->withPivot('quantity', 'price');
    }

    public function combos()
    {
        return $this->morphedByMany(Combo::class, 'cartable')
        ->withPivot(['quantity', 'price']);
    }
}
