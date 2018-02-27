<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'group_id',
        'option_name',
    ];
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'option_product', 'option_id', 'product_id')->withPivot('quanlity', 'price')->withTimestamps();
    }
}
