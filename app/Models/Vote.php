<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function recipe()
    {
    	return $this->belongsTo(Recipe::class);
    }
    protected $fillable = ['recipe_id', 'user_id'];
}