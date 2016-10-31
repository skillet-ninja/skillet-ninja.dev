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

        // dd($request);
        $ingredient = Ingredient::firstOrCreate(['ingredient'=>$request->ingredient]);
        $amount = $request->amount;
        $recipe = Recipe::find($request->recipeId);
        
        $recipe->ingredients()->attach($ingredient->id, ['amount' => $amount]);

        // $data['recipe'] = $recipe;

        // return view('recipes/create')->with($data);

        return redirect()->back();

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
     * @param  int  $recipeId (NOT ingredient's)
     *  use recipe Id since we don't need ingredient id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $ingredient = Ingredient::firstOrCreate(['ingredient'=>$request->ingredient]);

        $recipe = Recipe::findOrFail($request->recipeId);

        $oldIngredient = Ingredient::findOrFail($request->ingredientId);


        if ($oldIngredient->ingredient != $ingredient->ingredient)
        {
            $recipe->ingredients()->detach($oldIngredient->id);

        } elseif ($oldIngredient->ingredient = $ingredient->ingredient)
        {
            $recipe->ingredients()->updateExistingPivot($ingredient->id, ['amount' => $request->amount]);
        }

        $recipe->ingredients()->attach($ingredient->id, ['amount' => $request->amount]);
        

        return redirect()->action('RecipesController@edit', $request->recipeId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // dd($request);
        
        $recipe = Recipe::findOrFail($request->recipeId);
        $recipe->ingredients()->detach($request->ingredientId);

        return redirect()->back();

    }


}
