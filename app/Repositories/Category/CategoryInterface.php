<?php
namespace App\Repositories\Category;

interface CategoryInterface
{
    public function getParents();
    
    public function getProducts($id, $paginate, $order = 'name');

    public function getSubCategories($parent_id);

    public function getIdParents();

    public function getIdFirstSubCategories($id);
}
