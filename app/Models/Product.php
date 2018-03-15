<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'preview',
        'description',
        'discount_percent',
        'quanlity',
        'price',
        'status',
    ];

    protected $appends = [
        'rate',
        'customPrice',
        'specialPrice',
        'first_picture',
        'numberPrice',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity')->withTimestamps();
    }
    
    public function options()
    {
        return $this->belongsToMany(Option::class)->withPivot('quanlity', 'price')->withTimestamps();
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'reviews', 'product_id', 'user_id')->withPivot('content', 'rate')->withTimestamps();
    }

    public function getRateAttribute()
    {
        if (count($this->users)) {
            foreach ($this->users as $review) {
                $rates[] = $review->pivot->rate;
            }
            
            return array_sum($rates)/count($rates);
        }
        
        return config('setting.rate_start');
    }

    public function getCustomPriceAttribute()
    {
        return number_format($this->price, 0, '.', ',');
    }

    public function getNumberPriceAttribute()
    {
        return $this->price - ($this->price * $this->discount_percent) / 100;
    }

    public function getSpecialPriceAttribute()
    {
        return number_format($this->price - ($this->price * $this->discount_percent) / 100, 0, '.', ',');
    }

    public function getFirstPictureAttribute()
    {
        if ($this->pictures()->count()) {
            return $this->pictures->first()->picture;
        }

        return config('setting.product_picture_default');
    }
}
