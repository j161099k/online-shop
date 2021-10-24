<?php

namespace App\Models;

use App\Traits\Orderable;
use App\Traits\ReadableDates;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Orderable;
    use ReadableDates;

    public function combos()
    {
        return $this->belongsToMany(Combo::class);
    }
}
