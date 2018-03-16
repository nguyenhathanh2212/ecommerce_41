<?php
namespace App\Repositories\Category;

use App\Repositories\EloquentRepository;
use App\Models\Category;
use App\Models\Product;

class CategoryEloquentRepository extends EloquentRepository implements CategoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function getParents()
    {
        return $this->model->where('parent_id', config('setting.parent_category'))->get();
    }

    public function getProducts($id, $paginate, $order = 'name')
    {
        $category = $this->model->findOrFail($id);

        $orderBy = 'ASC';

        if ($order == 'nameZA') {
            $order = 'name';
            $orderBy = 'DESC';
        }

        if ($order == 'priceHL') {
            $order = 'price';
            $orderBy = 'DESC';
        }

        if (count($category->subCategories)) {
            $products = Product::whereIn('category_id', $category->subCategories()->pluck('id'))->orderBy($order, $orderBy)->paginate($paginate);
        } else {
            $products = $category->products()->orderBy($order)->paginate($paginate);
        }

        return $products;
    }

    public function getSubCategories($parent_id)
    {
        return $this->model->findOrFail($parent_id)->subCategories;
    }

    public function getIdParents()
    {
        return $this->model->where('parent_id', config('setting.parent_category'))->pluck('name', 'id');
    }

    public function getIdFirstSubCategories($id)
    {
        return $this->model->findOrFail($id)->subCategories->pluck('name', 'id');
    }
}
