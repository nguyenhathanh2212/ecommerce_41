<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'avatar',
        'numberphone',
        'email',
        'passwprd',
        'delivery_address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'reviews', 'user_id', 'product_id')->withPivot('content', 'rate')->withTimestamps();
    }
}
