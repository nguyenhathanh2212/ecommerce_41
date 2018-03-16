<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Order\OrderInterface;
use Session;
use Mail;
use DB;
use App\Traits\Cart;
use App\Http\Requests\Ecommerce\OrderRequest;

class CheckoutController extends Controller
{
    use Cart;

    protected $productRepository;
    protected $orderRepository;

    public function __construct(
        ProductInterface $productRepository,
        OrderInterface $orderRepository
    ) {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }
    public function index()
    {
        try {
            $carts = $this->productRepository->getCarts();

            if (!count($carts)) {
                Session::flash('error', trans('lang.notThingInCart'));
                
                return view('ecommerce.checkout.notice');
            }

            $total = $this->getTotal($carts);
            
            return view('ecommerce.checkout.index', compact('total'));
        } catch (Exception $e) {
            return view('templates.ecommerce.404');
        }
    }

    public function order(OrderRequest $request)
    {
        try {
            $carts = $this->productRepository->getCarts();
            $total = $this->getTotal($carts);

            if (!$request->has('addinfo') || $request->addinfo) {
                $data = $request->only('fullname', 'numberphone', 'delivery_address');
            } else {
                $data['fullname'] = Auth::user()->fullname;
                $data['numberphone'] = Auth::user()->numberphone;
                $data['delivery_address'] = Auth::user()->delivery_address;
            }

            $data['user_id'] = Auth::user()->id;
            $data['email'] = Auth::user()->email;
            $data['delivery_method'] = $request->delivery_method == config('setting.direct') ? trans('lang.directPayment') : trans('lang.onlinePayment');
            $data['status'] = config('setting.status_default');
            $data['total'] = $total;
            $request->session()->put('checkoutOrder', $data);

            return view('ecommerce.checkout.order', compact('data'));
        } catch (Exception $e) {
            return view('templates.ecommerce.404');
        }
    }

    public function confirm()
    {
        try {
            if (!Session::has('checkoutOrder')) {
                return view('templates.ecommerce.404');
            }

            $data = Session::get('checkoutOrder');

            DB::transaction(function () use ($data) {
                $idCarts = $this->productRepository->getIdCarts();
                $order = $this->orderRepository->create($data);
                $this->orderRepository->createOrderProduct($order->id, $idCarts);
            });

            Mail::send(['html'=>'ecommerce.checkout.mail'], $data, function($message) use ($data) {
                $message->to($data['email'], $data['fullname']);
                $message->subject('Order product');
                $message->from('thanhtdk2212@gmail.com','Modern');
            });

            Session::forget('checkoutOrder');
            Session::forget('carts');
            Session::flash('success', trans('lang.orderSuccess'));
        } catch (Exception $e) {
            Session::flash('error', trans('lang.orderError'));
        }

        return view('ecommerce.checkout.notice');
    }
}
