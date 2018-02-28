<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 1)->create([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
            'password' => 'admin',
        ]);
        factory(App\Models\User::class, 20)->create()->each(function ($user) {
            $product_id = rand(1, 30);
            $faker = Faker\Factory::create();
            $user->comments()->create([
                'user_id' => $user->id,
                'product_id' => $product_id,
                'parent_id' => 0,
                'content' => $faker->text,
            ]);
        });
    }
}
