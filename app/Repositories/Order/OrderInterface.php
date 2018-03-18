<?php
namespace App\Repositories\Order;

interface OrderInterface
{
    public function getOrder();

    public function createOrderProduct($orderId, $idCarts = ['*']);

    public function getByStatus($status);

    public function setStatus($id, $status);
}
