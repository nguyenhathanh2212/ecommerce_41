<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Product\ProductInterface;

class ProductComposer
{
    protected $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function compose(View $view)
    {
        $view->with('topSells', $this->productRepository->getTopSells(config('setting.topSell')));
        $view->with('features', $this->productRepository->getFeatures(config('setting.topSell')));
        $view->with('hotDeal', $this->productRepository->getHotDeal());
        $view->with('topBanners', $this->productRepository->random(config('setting.banner')));
        $view->with('topRates', $this->productRepository->getTopRates(config('setting.top')));
        $view->with('onSales', $this->productRepository->getOnSales(config('setting.top')));
        $view->with('specialProducts', $this->productRepository->getSpecials(config('setting.topSell')));
        $view->with('carts', $this->productRepository->getCarts());
    }
}
