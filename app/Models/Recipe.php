<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class Recipe extends Model
{
    protected $table = 'recipes';

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