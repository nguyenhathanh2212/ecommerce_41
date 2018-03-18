<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderInterface;
use Exception;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $orders = $this->orderRepository->getByStatus(0);

            return view('admin.order.index', compact('orders'));
        } catch (Exception $e) {
            return view('templates.admin.404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $order = $this->orderRepository->findOrFail($id);

            return view('admin.order.detail', compact('order'));
        } catch (Exception $e) {
            return view('templates.admin.404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showByStatus(Request $request)
    {
        try {
            $orders = $this->orderRepository->getByStatus($request->status);

            return view('admin.order.contentindex', compact('orders'));
        } catch (Exception $e) {
            return trans('lang.notFound');
        }
    }

    public function changeStatus($id)
    {
        try {
            $order = $this->orderRepository->findOrFail($id);

            if ($order->status == config('setting.processing')) {
                $this->orderRepository->setStatus($id, config('setting.delivering'));
            }

            if ($order->status == config('setting.delivering')) {
                $this->orderRepository->setStatus($id, config('setting.closed'));
            }

            return redirect()->back();
        } catch (Exception $e) {
            return trans('lang.error');
        }
    }
}
