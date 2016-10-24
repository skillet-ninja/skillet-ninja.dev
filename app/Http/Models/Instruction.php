<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    protected $table = 'cooking_instructions';

    public function recipe()
    {
    	return $this->belongsTo('App\Models\Recipe', 'recipe_id', 'id');
    }

    
}
