<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditRequest;
use App\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class UserController extends Controller
{
    //

    protected $redirectTo = "/";


    public function staff_view(){

        return view('Front.contract_info');

    }


    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit')->with('user', $user);


    }

    public function store(EditRequest $request){


        $user = Auth::user();
        $user1 = Staff::findOrFail($user->id);

        //check if user has correct old password

        if(Hash::check($request->password_old, $user->password)){

            $user1->fill(['email'=>$request->email, 'password'=>bcrypt($request->password),
                'first_name'=>$request->first_name, 'last_name'=>$request->last_name, 'other_names'=>$request->other_names, 'nationality'=>$request->nationality, 'department'=>$request->department]);

            $user1->save();
            return 'success!';

        }else {

            return view('profile.edit')->with('user', $user);
            #$user1->department = $request->department;
        }

    }

    public function register(){
        

    }
}
