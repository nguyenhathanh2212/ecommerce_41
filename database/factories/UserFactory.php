<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => 'secret',
        'remember_token' => str_random(10),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'avatar' => $faker->image(),
        'numberphone' => $faker->e164PhoneNumber,
        'delivery_address' => $faker->address,
        'is_admin' => false,
    ];
});

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => implode(' ', $faker->words(2)),
        'parent_id' => 0,
    ];
});

$factory->define(App\Models\Group::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Models\Option::class, function (Faker $faker) {
    return [
        'group_id' => $faker->numberBetween(1, 2),
        'option_name' => $faker->word,
    ];
});

$factory->define(App\Models\Group::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
        'user_id'=> App\Models\User::where('id', '<>', 0)->get()->random()->id,
        'total'=> rand(1,10000) * 1000,
        'fullname'=> $faker->name,
        'numberphone'=> $faker->e164PhoneNumber,
        'delivery_address'=> $faker->address,
        'delivery_method'=> $faker->word,
        'status'=> rand(0, 2),
    ];
});

$factory->define(App\Models\Picture::class, function (Faker $faker) {
    return [
        'product_id'=> App\Models\Product::all()->random()->id,
        'name'=> $faker->image($dir = '/tmp', $width = 640, $height = 480),
    ];
});

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'category_id' => App\Models\Category::where('parent_id', '<>', 0)->get()->random()->id,
        'user_id' => 1,
        'name' => implode(' ', $faker->words(2)),
        'preview' => $faker->text(rand(200, 400)),
        'description' => $faker->text(rand(1000, 2000)),
        'discount_percent' => $faker->numberBetween(1, 40),
        'quanlity' => $faker->numberBetween(0, 20),
        'status' => null,
        'price' => rand(1,10000) * 1000,
    ];
});
