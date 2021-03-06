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

        $data = Recipe::sort($request);

        $data['searchTerm'] = $request->searchTerm;
        $data['search_tag'] = $request->search_tag;


        
        return view('recipes.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        if($request->recipe)
        {
            return view ('layouts.partials._recipe-add');

        }

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

        if (empty($request->image_url)) {
            $request->image_url = '/assets/img/RecipeDefault.png';
        }

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
        $recipe->tutorial_url = $request->tutorial_url;
        $recipe->user_id = $request->user_id;
        $recipe->notes = $request->notes;
        $recipe->save();
        $data['recipe'] = $recipe;

        $request->session()->flash('SUCCESS_MESSAGE', 'Recipe was SAVED successfully');


        return redirect("recipes/".$recipe->id."/edit")->with($data);
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
            $data['vca'] = $request->vca;
            return view ('layouts.partials._recipe')->with($data);
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


            $recipe = Recipe::find($id);
            $data['recipe'] = $recipe;

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
                return view ('layouts.partials._recipe-edit')->with($data);

            } elseif ($request->ingredient)
            {
                return view ('layouts.partials._ingredient-edit')->with($data);

            } elseif ($request->addIngredient)
            {
                return view ('layouts.partials._ingredient-add')->with($data);

            } elseif ($request->step)
            {
                return view ('layouts.partials._step-edit')->with($data);

            } elseif ($request->addStep)
            {
                return view ('layouts.partials._step-add')->with($data);
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
        
        $recipe = Recipe::find($id);
        $userId = $recipe->user_id;

        $recipe->steps()->delete();
        $recipe->votes()->delete();
        $recipe->ingredients()->detach();
        $recipe->tags()->detach();

        $recipe->delete();

        return redirect()->action('UsersController@show', $userId) ;

    }

// These functions are for voting up and down

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

        return back();
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

        return back();
    }
}