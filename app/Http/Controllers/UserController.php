<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests\EditRequest;
use App\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    protected $redirectTo = "/";


    public function staff_view(){

            $currentUser = Auth::user();
            $user = User::where('department', '=', $currentUser->department)->get();
            #return view('Staff.staff')->with(array('user' => $user));
            return view('Staff.staff_view')->with(array('user' => $user));

    }


    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit')->with('user', $user);


    }

    public function add_new_form(){
        return view('auth.add_new');
    }

    public function store(EditRequest $request){


        $user = Auth::user();
        $user1 = Staff::findOrFail($user->id);

        //check if user has correct old password

        if(Hash::check($request->password_old, $user->password)){

            $user1->fill(['email'=>$request->email, 'password'=>bcrypt($request->password),
                'first_name'=>$request->first_name, 'last_name'=>$request->last_name,
                'other_names'=>$request->other_names, 'nationality'=>$request->nationality,
                'department'=>$request->department]);

            $user1->save();
            if(Auth::user()->position!='HOD')
            return Redirect('/home');
            else
                Return Redirect::action('UserController@staff_view');

        }else {

            return view('profile.edit')->with('user', $user);
            #$user1->department = $request->department;
        }

    }

    //creates a new user record
    public function store_new_user(Request $data){

        $this->validate($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'man_number'=> 'required|min:8|max:8',
            'position'=>'required'
        ]);

        User::create(['first_name' => $data->first_name, 'last_name'=> $data->last_name,
            'email'=>$data->email, 'password' => bcrypt($data->password), 'man_number'=>$data->man_number, 'position'=> $data->position]);

        return Redirect::action('UserController@staff_view');

    }
}
