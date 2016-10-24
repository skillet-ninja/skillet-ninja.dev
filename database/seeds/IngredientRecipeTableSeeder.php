<?php

use Illuminate\Database\Seeder;

class IngredientRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$recipeIds = DB::table('recipes')->lists('id');

    	$pivots = [];

    	foreach($recipeIds as $recipeId){
    		//randomly select 2 to 12 ingredients
    		for($index = 0; $index < mt_rand(2,12); $index++){
    			$pivots[]= [
    				'recipe_id' = $recipeId,
    				'ingredient_id' = App\Models\Ingredient::all()->random()->id,
    				'amount' = mt_rand(1,20)." unit",
    			];
    		}
    	}

    	DB::table('ingredient_recipe')->insert($pivots);
    }

}
