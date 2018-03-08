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

        if (count($category->subCategories)) {
            $products = Product::whereIn('category_id', $category->subCategories()->pluck('id'))->orderBy($order)->paginate($paginate);
        } else {
            $products = $category->products()->orderBy($order)->paginate($paginate);
        }

        return $products;
    }
}
