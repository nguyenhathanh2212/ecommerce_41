<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'description',
        'discount_percent',
        'quanlity',
        'status',
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
        return $this->belongsToMany(Order::class, 'order_product', 'order_id', 'product_id')->withTimestamps();
    }
    
    public function options()
    {
        return $this->belongsToMany(Option::class, 'option_product', 'option_id', 'product_id')->withPivot('quanlity', 'price')->withTimestamps();
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'reviews', 'user_id', 'product_id')->withPivot('content', 'rate')->withTimestamps();
    }
}
