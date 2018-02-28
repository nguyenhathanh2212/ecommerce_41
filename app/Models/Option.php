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
        return $this->belongsToMany(Product::class)->withPivot('quanlity', 'price')->withTimestamps();
    }
    
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
