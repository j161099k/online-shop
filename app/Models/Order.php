<?php

namespace App\Models;

use App\Traits\ReadableDates;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ReadableDates;

    protected $casts = [
        'delivered' => 'boolean',
    ];

    protected $hidden = [
        'updated_at',
    ];

    public function orderables()
    {
        return $this->morphTo();
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'orderable')
            ->withPivot(['quantity', 'price']);
    }

    public function combos()
    {
        return $this->morphedByMany(Combo::class, 'orderable')
            ->withPivot(['quantity', 'price']);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
