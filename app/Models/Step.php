<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    protected $table = 'steps';

    public function recipe()
    {
    	return $this->belongsTo('App\Models\Recipe', 'recipe_id', 'id');
    }
}
