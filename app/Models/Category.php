<?php

namespace App\Models;

use App\Traits\SecureId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, SecureId;

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
