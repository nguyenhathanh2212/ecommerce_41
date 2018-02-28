<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Category::class, 5)->create()->each(function ($parentCategory) {
            factory(App\Models\Category::class, 2)->create([
                'parent_id' => $parentCategory->id,
            ]);
        });
    }
}
