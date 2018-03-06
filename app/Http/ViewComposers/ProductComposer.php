<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductComposer
{
    protected $product;

    public function __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function compose(View $view)
    {
        $view->with('topSells', $this->product->getTopSells(config('setting.topSell')));
        $view->with('features', $this->product->getFeatures(config('setting.topSell')));
        $view->with('hotDeal', $this->product->getHotDeal());
        $view->with('topBanners', $this->product->random(config('setting.banner')));
        $view->with('topRates', $this->product->getTopRates(config('setting.top')));
        $view->with('onSales', $this->product->getOnSales(config('setting.top')));
        $view->with('specialProducts', $this->product->getSpecials(config('setting.topSell')));
    }
}
