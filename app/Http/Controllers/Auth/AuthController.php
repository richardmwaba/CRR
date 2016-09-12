<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Mail;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
   /*public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
   */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'man_number'=> 'required|unique:users|integer',
           'position' => 'required',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return  User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'man_number' => $data['man_number'],
            'position' => $data['position'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

            
            //Send mail to new user
            $password = $data['password'],
            Mail::send('Mails.new_user', ['password' => $password], function ($m) use ($data) {

                $m->to($data['email'], 'Me')->subject('Complete registration');
            })
            

        ]);

    }
}
