<?php

namespace App\Models;

use App\Traits\Addressable;
use App\Traits\ReadableDates;
use App\Traits\SecureId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasFactory, SoftDeletes, Addressable, ReadableDates, SecureId;

    public function ingredients()
    {
        $this->belongsToMany(Ingredient::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
