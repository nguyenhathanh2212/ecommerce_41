<?php
namespace App\Repositories\Picture;

use App\Repositories\EloquentRepository;
use App\Models\Picture;
use Session;

class PictureEloquentRepository extends EloquentRepository implements PictureInterface
{
    public function getModel()
    {
        return Picture::class;
    }
}
