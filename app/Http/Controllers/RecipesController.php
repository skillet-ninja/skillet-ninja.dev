<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Recipe;
use DB;

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

        if (isset($request->searchTerm))
        {
            $recipes = Recipe::getSearchTerm($request->searchTerm)->paginate(9);

        } else
        {
            $recipes = Recipe::paginate($recipesPerPage);
        }

        $data['searchTerm'] = $request->searchTerm;
        $data['recipes'] = $recipes;

        
        return view('recipes.index', $data);

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

        $rules = array(
        'name' => 'required|max:100',
        'servings' => 'required',
        'summary'=>'required',
        'difficulty'=>'required',
        'overall_time'=>'required',
        );

        $request->session()->flash('ERROR_MESSAGE', 'Recipe was not saved.');
        $this->validate($request, $rules);
        $request->session()->forget('ERROR_MESSAGE');

        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->servings = $request->servings;
        $recipe->overall_time = $request->overall_time;
        $recipe->summary = $request->summary;
        $recipe->difficulty = $request->difficulty;
        $recipe->image_url = $request->image_url;
        $recipe->user_id = $request->user()->id;
        $recipe->notes = $request->notes;
        $recipe->save();

        $request->session()->flash('SUCCESS_MESSAGE', 'Recipe was SAVED successfully');


        return view('recipes/create', ['recipe_id'=>$recipe->id]);
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
            $data['recipe'] = $recipe;
            $data['continue'] = $request->continue;
            return view ('layouts.partials.recipe-modal')->with($data);
        }

        $recipe = Recipe::findOrFail($id);
        $data['recipe'] = $recipe;
        $data['steps'] = $recipe->getSteps($id);
        $data['continue'] = $request->continue;
        // dd(count($data['steps']));

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
        $recipe = Recipe::findOrFail($id);
        $data['recipe'] = $recipe;

        return view ('recipes.edit')->with($data);
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