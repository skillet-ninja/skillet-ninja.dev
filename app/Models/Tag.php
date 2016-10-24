<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	protected $table = 'tags';

    public function recipes()
    {
    	return $this->belongsToMany('App\Models\Recipe');
    }
}
