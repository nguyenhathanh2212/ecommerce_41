<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

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
        'password',
        'is_admin',
        'delivery_address',
        'provider',
        'provider_id',
        'check_information',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['fullname'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'reviews', 'user_id', 'product_id')->withPivot('content', 'rate')->withTimestamps();
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getFullNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getCheckInformationAttribute()
    {
        if ($this->fullname && $this->numberphone && $this->delivery_address) {
            return config('setting.true');
        }

        return config('setting.false');
    }

}
