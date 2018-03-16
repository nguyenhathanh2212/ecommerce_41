<?php

namespace App\Traits;

use Session;

trait Cart {
    public function getTotal($carts) {
        $total = config('setting.num0');
        foreach ($carts as $id => $cart) {
            $total += $cart->numberPrice * Session::get('carts')[$cart->id]['quanlity'];
        }

        return $total;
    }
}
