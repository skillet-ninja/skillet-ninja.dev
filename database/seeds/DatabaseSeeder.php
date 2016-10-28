<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('ingredient_recipe')->delete();
        DB::table('recipe_tag')->delete();
        DB::table('steps')->delete();
        DB::table('tags')->delete();
        DB::table('ingredients')->delete();
        DB::table('votes')->delete();
        DB::table('recipes')->delete();
        DB::table('users')->delete();

        $this->call(UsersTableSeeder::class);
        $this->call(RecipesTableSeeder::class);
        $this->call(VotesTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(StepsTableSeeder::class);
        $this->call(RecipeTagTableSeeder::class);
        $this->call(IngredientRecipeTableSeeder::class);


        Model::reguard();
    }
}
