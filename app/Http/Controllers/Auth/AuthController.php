<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    protected $redirectAfterLogout = 'auth/logoutView';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->redirectPath = '/profile';
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    // public function check(Request $request)
    // {
    //     $users = App\User::withTrashed()->whereEmail($request->email)->first();

    //     foreach ($users as $user) {
    //         if ($request->email==$user->email){
    //             var_dump('got it');
    //         }
    //     }


    // }

    public function postRegister(Request $request)
    {
        $users = User::onlyTrashed()
                ->where('email', $request->email)
                ->get();

        if ($users!=null) {
            $users = User::onlyTrashed()
            ->where('email', $request->email)
            ->restore();
            return view('welcome');
        }else{

            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );
            }

            Auth::login($this->create($request->all()));

            return redirect($this->redirectPath());
        }
    }
}
