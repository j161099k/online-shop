<?php

namespace App\Models;

use App\Traits\ReadableDates;
use App\Traits\SecureId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes, ReadableDates, SecureId;
 
    protected $hidden = [
        'addressable_id',
        'addressable_type',
    ];
    
    protected $casts = [
        'created_at' => 'date:Y-M-d H:i:s',
        'updated_at' => 'date:Y-M-d H:i:s',
    ];

    public function addressable()
    {
        return $this->morphTo();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
