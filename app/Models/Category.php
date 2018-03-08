<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
    ];

    protected $appends = ['numberOfProduct'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function getNumberOfProductAttribute()
    {
        if ($this->subCategories) {
            $count = config('setting.num0');
            foreach ($this->subCategories as $subCategory) {
                $count += count($subCategory->products);
            }
            
            return $count;
        } else {
            return count($this->products);
        }
    }
}
