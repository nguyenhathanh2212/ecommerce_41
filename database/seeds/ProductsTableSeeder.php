<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Product::class, 30)->create()->each(function ($product) {
            $faker = Faker\Factory::create();
            $user_id = App\Models\User::all()->random()->id;
            $product->users()->attach($user_id, [
                'content' => $faker->text,
                'rate' => rand(0, 5),
            ]);
            $option_id = App\Models\Option::all()->random()->id;
            $product->options()->attach($option_id, [
                'quanlity' => rand(0, 20),
                'price' => rand(1,10000) * 1000,
            ]);
            factory(App\Models\Picture::class, 2)->create([
                'product_id' => $product->id,
            ]);
        });
    }
}
