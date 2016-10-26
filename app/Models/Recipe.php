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
        return $this->belongsToMany('App\Models\Ingredient');
    }
	
	public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }


    public function getSteps($id) {
        // return Step::where('recipe_id', $this->id);
        return DB::table('steps')->where('recipe_id', $id)->orderBy('created_at', 'asc')->get();
    }

}