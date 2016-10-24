<?php

use Illuminate\Database\Seeder;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Step::class,10000)->create();
    }
}
