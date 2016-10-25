<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }
	
	public function step()
    {
        return $this->hasMany('App\Models\Step', 'recipe_id')->withPivot('amount')->withTimeStamps();
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Models\Ingredient');
    }
	
	public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
