<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    public function ingredients()
    {
        $this->belongsToMany(Ingredient::class);
    }

    public function addresses()
    {
        return $this->morphToMany(Address::class, 'addressable');
    }
}
