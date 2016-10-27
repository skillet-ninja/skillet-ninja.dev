<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Recipe;

use DB;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rules = array(
        // 'ingredient' => 'required|max:100',
        // 'amount' => 'required',
        // );

        // $request->session()->flash('ERROR_MESSAGE', 'Ingredient was not saved.');
        // $this->validate($request, $rules);
        // $request->session()->forget('ERROR_MESSAGE');



        $ingredient = Ingredient::firstOrNew(['ingredient'=>$request->ingredient]);
        $ingredient->ingredient = $request->ingredient;
        $ingredient->save();

        $recipeId = $request->recipe_id;

        $amount = $request->amount;

        $recipe = Recipe::find($recipeId);

        $ingredientId = $ingredient->id;
        
        $recipe->ingredients()->attach($ingredientId, ['amount' => $amount]);

        $ingredientsDisplayed = DB::table('ingredients')
        ->join('ingredient_recipe', 'ingredients.id', '=', 'ingredient_recipe.ingredient_id')
        ->where('recipe_id', $recipeId)
        ->get();

        $data = ['recipe_id' => $recipeId, 'ingredientsDisplayed' => $ingredientsDisplayed];

        return view('recipes/create')->with($data);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
