<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function recipes()
    {
            return $this->hasMany('App\Models\Recipe','user_id');
    }

    public function votes()
    {
        return $this->hasMany('App\Models\Vote','user_id');
    }

    public static function getRecipesVotedFor($id)
    {
            $recipes = DB::table('recipes')
            ->join('votes', 'recipes.id', '=', 'votes.recipe_id')
            ->where('votes.user_id','=','' . $id)
            ->where('votes.vote','=','1')
            ->select(array('recipes.*', 'votes.vote'))
            ->paginate(9);
            
            return $recipes;
    }
    public static function getRecipesCreated($id)
    {
            $recipes = DB::table('recipes')
            ->where('user_id','=','' . $id)
            ->paginate(9);
            
            return $recipes;
    }
}
