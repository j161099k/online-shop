<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function addresses() 
    {
        return $this->morphToMany(Address::class, 'addressable');
    }

/*     public function orders()
    {
        return DB::table('addressables')
        ->select('orders.id', 
                'addresses.address', 
                'users.name as username',
                'orders.details', 
                'orders.total',
                'orders.created_at',
                'orders.updated_at')
        ->join('orders', 'orders.addressable_id', '=', 'addressables.id')
        ->join('addresses', 'addresses.id', '=', 'addressables.address_id')
        ->join('users', function($join){
            $join->on('addressable_id');
        });
    } */

}
