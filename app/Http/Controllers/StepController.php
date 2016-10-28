<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Step;
use App\Models\Recipe;
use DB;

class StepController extends Controller
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
        // 'title' => 'required|max:100',
        // 'url'   => 'required|url',
        // 'content'=>'required',
        // );

        // $request->session()->flash('ERROR_MESSAGE', 'Post was not saved.');
        // $this->validate($request, $rules);
        // $request->session()->forget('ERROR_MESSAGE');

        $step = new Step;
        $step->recipe_id = $request->recipe_id;
        $step->step = $request->step;
        $step->image_url = $request->image_url;
        $step->video_url = $request->video_url;
        $step->video_url = $request->time;
        $step->save();

        $recipeId = $request->recipe_id;

        $ingredientsDisplayed = DB::table('ingredients')
        ->join('ingredient_recipe', 'ingredients.id', '=', 'ingredient_recipe.ingredient_id')
        ->where('recipe_id', $recipeId)
        ->get();

        $stepsDisplayed = DB::table('steps')
        ->where('recipe_id', $recipeId)
        ->get();

        $tagsDisplayed = DB::table('tags')
        ->join('recipe_tag', 'tags.id', '=', 'recipe_tag.tag_id')
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
