<?php
namespace App\Repositories\Category;

interface CategoryInterface
{
    public function getParents();
    
    public function getProducts($id, $paginate, $order = 'name');
}
