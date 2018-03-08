<?php
namespace App\Repositories\Product;

use App\Repositories\EloquentRepository;
use App\Models\Product;
use Session;

class ProductEloquentRepository extends EloquentRepository implements ProductInterface
{
    public function getModel()
    {
        return Product::class;
    }

    public function getSlider($limit = 0)
    {
        return $this->model->orderBy('discount_percent', 'DESC')->take($limit);
    }

    public function getSpecials($limit = 0)
    {
        return $this->model->orderBy('created_at', 'DESC')->orderBy('discount_percent', 'DESC')->take($limit)->get();
    }

    public function random($limit = 0)
    {
        return $this->model->inRandomOrder()->limit($limit);
    }

    public function getTopRates($limit = 0)
    {
        return $this->model->all()->sortByDesc('rate')->take($limit);
    }

    public function getOnSales($limit = 0)
    {
        return $this->model->orderBy('discount_percent', 'DESC')->take($limit)->get();
    }

    public function getHotDeal($limit = 0)
    {
        return $this->model->orderBy('discount_percent', 'DESC')->first();
    }

    public function getFeatures($limit = 0)
    {
        return $this->model->orderBy('created_at', 'DESC')->take($limit)->get();
    }

    public function getTopSells($limit = 0)
    {
        return $this->model->orderBy('quanlity', 'DESC')->take($limit)->get();
    }
}
