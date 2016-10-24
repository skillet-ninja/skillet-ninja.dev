<?php

use Illuminate\Database\Seeder;

class RecipeTagTableSeeder extends Seeder
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
    		//randomly select 1 to 5 tags
    		for($index = 0; $index < mt_rand(1,5); $index++){
    			$pivots[]= [
    				'recipe_id' = $recipeId,
    				'tag_id' = App\Models\Tag::all()->random()->id,
    			];
    		}
    	}

    	DB::table('recipe_tag')->insert($pivots);
    }
}
