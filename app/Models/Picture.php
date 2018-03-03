<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use File;

class Picture extends Model
{
    protected $fillable = [
        'product_id',
        'name',
    ];

    protected $appends = ['picture'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getPictureAttribute()
    {
        $pathFile = config('setting.fileUpload') . $this->attributes['name'];
        if (!File::exists(public_path($pathFile)) || empty($this->attributes['name'])) {
            return config('setting.product_picture_default');
        }

        return $pathFile; 
    }
}
