<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'fullname',
        'numberphone',
        'delivery_address',
        'delivery_method',
        'status',
    ];

    protected $appends = [
        'status_custom'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }

    public function getStatusCustomAttribute()
    {
        if ($this->status == config('setting.processing')) {
            return trans('lang.processing');
        }

        if ($this->status == config('setting.delivering')) {
            return trans('lang.delivering');
        }

        return trans('lang.closed');
    }
}
