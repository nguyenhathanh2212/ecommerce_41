<?php
namespace App\Repositories\Order;

use App\Repositories\EloquentRepository;
use App\Models\Order;
use Session;
use Auth;

class OrderEloquentRepository extends EloquentRepository implements OrderInterface
{
    public function getModel()
    {
        return Order::class;
    }

    public function getOrder()
    {
    	return Auth::user()->orders()->orderBy('created_at', 'DESC')->paginate(config('setting.paginate'));
    }

    public function createOrderProduct($orderId, $idCarts = ['*'])
    {
        foreach ($idCarts as $id) {
            $this->model
                ->findOrFail($orderId)
                ->products()
                ->attach([$id => ['quantity' => Session::get('carts')[$id]['quanlity']]]);
        }
    }

    public function getByStatus($status)
    {
        return $this->model->
            where('status', $status)->
            paginate(config('setting.paginate_admin'));
    }

    public function setStatus($id, $status)
    {
        return $this->model->findOrFail($id)->update(['status' => $status]);
    }
}
