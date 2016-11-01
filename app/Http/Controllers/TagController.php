<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Recipe;
use DB;

class TagController extends Controller
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
        $tags = explode(',', $request->tags);

        $recipe = Recipe::find($request->recipe_id);

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrNew(['tag'=>$tagName]);
            $tag->tag = $tagName;
            $tag->save();

            $recipe->tags()->attach($tag->id);
        }

            return redirect()->back();
    }







        $ingredientsDisplayed = DB::table('ingredients')
        ->join('ingredient_recipe', 'ingredients.id', '=', 'ingredient_recipe.ingredient_id')
        ->where('recipe_id', $recipeId)
        ->get();

        $tagsDisplayed = DB::table('tags')
        ->join('recipe_tag', 'tags.id', '=', 'recipe_tag.tag_id')
        ->where('recipe_id', $recipeId)
        ->get();

        $stepsDisplayed = DB::table('steps')
        ->where('recipe_id', $recipeId)
        ->get();

        $data = ['recipe_id' => $recipeId,
         'ingredientsDisplayed' => $ingredientsDisplayed,
          'stepsDisplayed' => $stepsDisplayed,
           'tagsDisplayed' => $tagsDisplayed];

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
