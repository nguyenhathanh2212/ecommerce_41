<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Category\CategoryInterface;

class CategoryComposer
{
    protected $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    public function compose(View $view)
    {
        $view->with('parentCategories', $this->categoryInterface->getParents());
    }
}
