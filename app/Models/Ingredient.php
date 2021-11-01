<?php

namespace App\Models;

use App\Traits\SecureId;
use App\Traits\ReadableDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{

    use HasFactory, SoftDeletes, ReadableDates, SecureId;
    
    protected $casts = [
        // 'created_at' => 'date:Y-M-d H:i:s',
        // 'updated_at' => 'date:Y-M-d H:i:s',
    ];

    public function providers()
    {
        return $this->belongsToMany(Provider::class);
    }

}
