<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;

class HomeController extends Controller
{
    protected $product;

    public function __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $sliders = $this->product->getSlider(config('setting.sliders_number'));

        return view('ecommerce.index.index', compact('sliders'));
    }
}
