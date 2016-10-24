<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models.Recipe extends Model
{
    protected $table = 'recipes';

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }
	
	public function instruction()
    {
        return $this->hasMany('App\Models\Instruction', 'recipe_id');
    }

    public function ingredient()
    {
        return $this->hasMany('App\Models\Ingredient', 'recipe_id');
    }




}
