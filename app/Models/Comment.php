<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'parent_id',
        'email',
        'name',
        'product_id',
        'content',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }
}
