<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public function addressable()
    {
        return $this->morphTo();
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'addressable');
    }

    public function providers()
    {
        return $this->morphedByMany(Provider::class, 'addressable');
    }

    public function orders()
    {
        return $this->morphToMany(Order::class, 'addressable');
    }

}
