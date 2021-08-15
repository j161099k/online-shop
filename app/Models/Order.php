<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    public function products()
    {
        return $this->morphedByMany(Product::class, 'orderable');
    }

    public function combos()
    {
        return $this->morphedByMany(Combo::class, 'orderable');
    }

    public function addresses()
    {
        return $this->belongsTo(Address::class);
    }

}
