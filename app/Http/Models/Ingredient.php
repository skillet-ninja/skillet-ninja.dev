<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredient_recipe_pivot';

    public function recipe()
    {
    	return $this->belongsTo('App\Models\Recipe', 'recipe_id', 'id');
    }
}
