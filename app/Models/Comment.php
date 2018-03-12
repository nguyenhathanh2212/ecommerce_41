<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'parent_id',
        'product_id',
        'user_id',
        'content',
    ];

    protected $appends = ['sub_comments'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subComments()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

    public function getSubCommentsAttribute()
    {
        return $this->subComments()->orderBy('created_at', 'DESC')->get();
    }
}
