<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Order::class, 10)->create()->each(function ($order) {
            for($index = 0; $index < rand(1, 3); $index++) {
                $product_id = App\Models\Product::all()->random()->id;
                $order->products()->attach($product_id, [
                    'quantity'=> rand(0, 10),
                ]);
            }
        });
    }
}
