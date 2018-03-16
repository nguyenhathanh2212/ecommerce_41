<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Exception;
use App\Repositories\Order\OrderInterface;
use Session;

class ProfileController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    
    public function index()
    {
        $histories = Session::has('histories') ? Session::get('histories') : [];

        return view('ecommerce.profile.index', compact('histories'));
    }

    public function showOrder()
    {
        try {
            $orders = $this->orderRepository->getOrder();
            

            return view('ecommerce.profile.listorder', compact('orders'));
        } catch (Exception $e) {
            return view('templates.ecommerce.404');
        }
    }

    public function showOrderDetail($id)
    {
        try {
            $order = $this->orderRepository->findOrFail($id);

            return view('ecommerce.profile.orderdetail', compact('order'));
        } catch (Exception $e) {
            return view('templates.ecommerce.404');
        }
    }
}
