<?php

use Illuminate\Database\Seeder;

class TagPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TagPivot::class,1000)->create();
    }
}
