<?php

namespace App\Models;

use App\Traits\ReadableDates;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ReadableDates;

    protected $casts = [
        // 'created_at' => 'date:Y-M-d H:i:s',
        // 'updated_at' => 'date:Y-M-d H:i:s',
    ];

    public function providers()
    {
        return $this->belongsToMany(Provider::class);
    }

}
