<?php

namespace App\Models;

use App\Traits\SecureId;
use App\Traits\ReadableDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{

    use HasFactory, SoftDeletes, ReadableDates, SecureId;

    protected $casts = [
        'delivered' => 'boolean',
    ];

    protected $hidden = [
        'updated_at',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
