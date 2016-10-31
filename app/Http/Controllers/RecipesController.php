<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Recipe;
use App\Models\Vote;
use App\User;
use App\Models\Tag;
use App\Models\Ingredient;
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
            $recipes = Recipe::getSearchTerm($request->searchTerm)->paginate($recipesPerPage);

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

        $request->session()->flash('ERROR_MESSAGE', 'Recipe was not saved.');
        $this->validate($request, Recipe::$rules);
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

        return view('vca.vca')->with($data);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        if($request->ajax()){


            $recipe = Recipe::findOrFail($id);
            $data['recipe'] = $recipe;
            // dd($recipe);

            if ($request->ingredient != null)
            {
                $ingredient = $recipe->ingredients->find($request->ingredientId);
                $data['ingredient'] = $ingredient;
            }

            if ($request->step != null)
            {
                $step = $recipe->steps->find($request->stepId);
                $data['step']= $step;   
            }


            // bring up appropriate modal for editing

            if($request->recipe)
            {
                return view ('layouts.partials.modal-edit-recipe')->with($data);

            } elseif ($request->ingredient)
            {
                return view ('layouts.partials.modal-edit-ingredient')->with($data);

            } elseif ($request->addIngredient)
            {
                return view ('layouts.partials.modal-add-ingredient')->with($data);

            } elseif ($request->step)
            {
                return view ('layouts.partials.modal-edit-step')->with($data);

            } elseif ($request->addStep)
            {
                return view ('layouts.partials.modal-add-step')->with($data);
            }
        }

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
        // $request->session()->flash('ERROR_MESSAGE', 'Recipe was not saved.');
        // $this->validate($request, Recipe::$rules);
        // $request->session()->forget('ERROR_MESSAGE');

        $recipe = Recipe::findOrFail($id);
        $recipe->name = $request->name;
        $recipe->servings = $request->servings;
        $recipe->overall_time = $request->overall_time;
        $recipe->summary = $request->summary;
        $recipe->difficulty = $request->difficulty;
        $recipe->image_url = $request->image_url;
        $recipe->notes = $request->notes;
        $recipe->save();

        // $request->session()->flash('SUCCESS_MESSAGE', 'Recipe was SAVED successfully');

        return redirect()->action('RecipesController@edit', $recipe->id);
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





    public function addVote(Request $request)
    {
        $vote = Vote::firstOrCreate(['recipe_id' => $request->recipe_id, 'user_id' => $request->user_id]);

        $vote->user_id = $request->user_id;
        $vote->recipe_id = $request->recipe_id;
        $vote->vote = 1;
        $vote->save();
        $recipe = $vote->recipe;
        $recipe->vote_score = $recipe->voteScore();
        $recipe->save();

        return redirect()->action('RecipesController@index');
    }

    public function downVote(Request $request)
    {
        $vote = Vote::firstOrCreate(['recipe_id' => $request->recipe_id, 'user_id' => $request->user_id]);

        $vote->user_id = $request->user_id;
        $vote->recipe_id = $request->recipe_id;
        $vote->vote = 0;
        $vote->save();
        $recipe = $vote->recipe;
        $recipe->vote_score = $recipe->voteScore();
        $recipe->save();

        return redirect()->action('RecipesController@index');
    }

}