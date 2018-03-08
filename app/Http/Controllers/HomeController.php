<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\Product\ProductInterface;

class HomeController extends Controller
{
    protected $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $sliders = $this->productRepository->getSlider(config('setting.sliders_number'));

        return view('ecommerce.index.index', compact('sliders'));
    }
}
