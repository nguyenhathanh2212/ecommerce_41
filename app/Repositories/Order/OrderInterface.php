<?php
namespace App\Repositories\Order;

interface OrderInterface
{
    public function getOrder();

    public function createOrderProduct($orderId, $idCarts = ['*']);
}
