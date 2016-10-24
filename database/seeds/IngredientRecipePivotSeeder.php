<?php

use Illuminate\Database\Seeder;

class IngredientRecipePivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\IngredientRecipePivot::class,1000)->create();
    }
}
