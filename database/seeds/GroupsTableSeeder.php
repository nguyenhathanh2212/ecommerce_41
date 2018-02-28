<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Group::class, 2)->create()->each(function ($group) {
            factory(App\Models\Option::class, 2)->create([
                'group_id' => $group->id,
            ]);
        });
    }
}
