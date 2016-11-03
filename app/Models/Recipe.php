<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected static $rules = array(
        'name' => 'required|max:100',
        'servings' => 'required',
        'summary'=>'required',
        'difficulty'=>'required',
        'overall_time'=>'required',
        );

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    public function steps()
    {
        return $this->hasMany('App\Models\Step', 'recipe_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Models\Ingredient')->withPivot('amount')->withTimestamps();
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }


    public function getSteps($id) {

        return DB::table('steps')->where('recipe_id', $id)->orderBy('created_at', 'asc')->get();
    }


    public static function getSearchTerm($searchTerm){

        return self::where('name','LIKE','%' . $searchTerm .'%');
    }

    public static function sort($request){

        $recipesPerPage = 9;

        if (!empty($request->searchTerm)&&$request->sort == 'top_rated'){
            $recipes = Recipe::getSearchTerm($request->searchTerm)
            ->orderBy('vote_score', 'Desc')
            ->paginate($recipesPerPage);

            $data['recipes'] = $recipes;

            return $data;

        }else if (!empty($request->search_tag)&&$request->sort == 'top_rated'){
            $recipes = Recipe::join('recipe_tag', 'recipes.id', '=', 'recipe_tag.recipe_id')
            ->join('tags', 'recipe_tag.tag_id', '=', 'tags.id')
            ->where('tag','=',$request->search_tag)
            ->orderBy('vote_score', 'Desc')
            ->paginate($recipesPerPage);

            $data['search_tag'] = $request->search_tag;
            $data['recipes'] = $recipes;


            return $data;

        }else if($request->sort == 'top_rated'){

            $recipes = Recipe::orderBy('vote_score', 'Desc')
            ->paginate($recipesPerPage);

            $data['recipes'] = $recipes;

            return $data;

        }else if (!empty($request->searchTerm)&&$request->sort == 'difficulty'){

            $recipes = Recipe::getSearchTerm($request->searchTerm)
            ->orderByRaw("FIELD(difficulty, 'beginner', 'intermediate', 'advanced')" )
            ->paginate($recipesPerPage);

            $data['recipes'] = $recipes;

            return $data;

        }else if (!empty($request->search_tag)&&$request->sort=='difficulty') {
            $recipes = Recipe::join('recipe_tag', 'recipes.id', '=', 'recipe_tag.recipe_id')
            ->join('tags', 'recipe_tag.tag_id', '=', 'tags.id')
            ->where('tag','=',$request->search_tag)
            ->orderByRaw("FIELD(difficulty, 'beginner', 'intermediate', 'expert')" )
            ->paginate($recipesPerPage);

            $data['search_tag'] = $request->search_tag;
            $data['recipes'] = $recipes;

            return $data;
            
        }else if ($request->sort == 'difficulty'){


            $recipes = DB::table('recipes')
            ->orderByRaw("FIELD(difficulty, 'beginner', 'intermediate', 'expert')" )
            ->paginate($recipesPerPage);
            $data['recipes'] = $recipes;

            return $data;

        }else if (!empty($request->searchTerm)){


            $recipes = Recipe::getSearchTerm($request->searchTerm)
            ->paginate($recipesPerPage);

            $data['recipes'] = $recipes;

            return $data;

        }else if (!empty($request->search_tag)) {
            
            $recipes = Recipe::join('recipe_tag', 'recipes.id', '=', 'recipe_tag.recipe_id')
            ->join('tags', 'recipe_tag.tag_id', '=', 'tags.id')
            ->where('tag','=',$request->search_tag)
            ->paginate($recipesPerPage);

            $data['search_tag'] = $request->search_tag;
            $data['recipes'] = $recipes;

            return $data;
        }else{
            $recipes = Recipe::paginate($recipesPerPage);

            $data['recipes'] = $recipes;

            return $data;

        }
    }



    // vote logic begins here

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
    
    public function upvotes()
    {
        return $this->votes()->where('vote', '=', 1);
    }
    
    public function downvotes()
    {
        return $this->votes()->where('vote', '=', 0);
    }

    public function voteScore()
    {
        // find total upvotes
        $upvotes = $this->upvotes()->count();
        // find total downvotes
        $downvotes = $this->downvotes()->count();
        // return upvotes - downvotes
        return $upvotes - $downvotes;
    }
    
    public function userVote($userId)
    {
        return $this->votes()->where('user_id', '=', $userId)->first();
    }


        public static function calculateVoteScore()
    {
        $recipes = self::all();
        foreach ($recipes as $recipe) {
            $recipe->vote_score = $recipe->voteScore();
            $recipe->save();
        }
    }

}