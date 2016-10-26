<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Recipe;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recipesPerPage = 9;

        $recipes = Recipe::paginate($recipesPerPage);

        $data = array (
            'recipes'=>$recipes,
            );

        return view ('recipes.index')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, Recipe::$rules);

        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->servings = $request->servings;
        $recipe->overall_time = $request->overall_time;
        $recipe->summary = $request->summary;
        $recipe->image_url = $request->image_url;
        $recipe->user_id = Auth::id();
        $recipe->save();


        // Log::info('Inputs for create'.http_build_query($request->input()));

        // $request->session()->flash('SUCCESS_MESSAGE', 'Recipe was SAVED successfully');


        return redirect()->action('RecipesController@show', $recipe->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if($request->ajax()){
            $recipe = Recipe::findOrFail($id);
            $data = array ('recipe' => $recipe);
            return view ('layouts.partials.recipe-modal')->with($data);
        }

        $recipe = Recipe::find($id);
        $data['recipe'] = $recipe;
        $data['steps'] = $recipe->getSteps($id);
        // dd($data);
        return view('vca.vca')->with($data);
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
