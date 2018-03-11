<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductInterface;
use Session;
use Exception;

class CartController extends Controller
{
    protected $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        try {
            $carts = $this->productRepository->getCarts();
            $total = config('setting.num0');
            foreach ($carts as $cart) {
                $total += $cart->numberPrice * Session::get('carts')[$cart->id]['quanlity'];
            }

            return view('ecommerce.cart.index', compact('total'));
        } catch (Exception $e) {
            return view('templates.ecommerce.404');
        }
    }

    public function addCart(Request $request)
    {
        try {
            $carts = $request->session()->has('carts') ? $request->session()->get('carts') : [];
            $id = $request->id;
            $quanlity = $request->quanlity;
            array_key_exists($id, $carts) ? $carts[$id]['quanlity'] += $quanlity : $carts[$id]['quanlity'] = $quanlity;
            $request->session()->put('carts', $carts);

            return view('ecommerce.cart.cart');
        } catch (Exception $e) {
            return trans('lang.error');
        }
    }

    public function delete(Request $request)
    {
        try {
            $sessionCarts = Session::get('carts');
            unset($sessionCarts[$request->id]);
            Session::put('carts', $sessionCarts);
            $carts = $this->productRepository->getCarts();
            $total = config('setting.num0;');
            foreach ($carts as $cart) {
                $total += $cart->numberPrice * Session::get('carts')[$cart->id]['quanlity'];
            }

            return view('ecommerce.cart.content', compact('total'));
        } catch (Exception $e) {
            return trans('lang.error');
        }
    }

    public function changeQuanlity(Request $request)
    {
        try {
            $sessionCarts = Session::get('carts');
            $sessionCarts[$request->id]['quanlity'] = $request->quanlity;
            Session::put('carts', $sessionCarts);
            $carts = $this->productRepository->getCarts();
            $total = config('setting.num0;');
            foreach ($carts as $cart) {
                $total += $cart->numberPrice * Session::get('carts')[$cart->id]['quanlity'];
            }

            return view('ecommerce.cart.content', compact('total'));
        } catch (Exception $e) {
            return trans('lang.error');
        }
    }
}
