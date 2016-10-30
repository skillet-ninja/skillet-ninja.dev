<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Ingredient extends Model
{

	protected $fillable = array('ingredient', 'ingredient');
	
    protected $table = 'ingredients';

    public function recipes()
    {
    	return $this->belongsToMany('App\Models\Recipe')->withPivot('amount')->withTimestamps();
    }

    
}



