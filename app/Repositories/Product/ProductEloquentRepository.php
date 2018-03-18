<?php
namespace App\Repositories\Product;

use App\Repositories\EloquentRepository;
use App\Models\Product;
use App\Models\Picture;
use Session;
use Auth;

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

    public function getCarts()
    {
        if (Session::has('carts') && count(Session::get('carts'))) {
            foreach (Session::get('carts') as $id => $product) {
                $idProducts[] = $id;
            }

            return $this->model->whereIn('id', $idProducts)->get();
        }
        
        return [];
    }
    
    public function getReviews($id)
    {
        return $this->model->findOrFail($id)->users()->orderBy('reviews.created_at', 'DESC')->paginate(config('setting.paginate_review'));
    }

    public function addReview($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id)->users()->attach([Auth::user()->id => $columns]);
    }

    public function getRelatedProducts($category_id, $id)
    {
        return $this->model->where('category_id', $category_id)->where('id', '<>', $id)->take(config('setting.topSell'))->get();
    }

    public function search($text)
    {
        return $this->model->where('name', 'LIKE', '%' . $text . '%')->orderBy('created_at', 'DESC')->paginate(config('setting.paginate_admin'));
    }

    public function paginateProducts()
    {
        return $this->model->orderBy('created_at', 'DESC')->paginate(config('setting.paginate_admin'));
    }

    public function getIdCarts()
    {
        if (Session::has('carts') && count(Session::get('carts'))) {
            foreach (Session::get('carts') as $id => $product) {
                $idProducts[] = $id;
            }

            return $this->model->whereIn('id', $idProducts)->pluck('id');
        }
        
        return [];
    }

    public function searchByCategory($request)
    {
        return $this->model->
            where('category_id', $request->category_id)->
            where('name', 'LIKE', '%' . $request->text_search . '%')->
            orderBy('created_at', 'DESC')->
            paginate(config('setting.paginate_admin'));
    }
}
