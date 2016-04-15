<?php

namespace App\Http\Controllers;

use App\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class UserController extends Controller
{
    //

    public function __construct(){

        $this->middleware('auth');
        #$this->middleware('auth', ['only'=>'edit']); altanative for specific method
        ##$this->middleware('auth', ['except'=>'edit']); altanative for specific method
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit')->with('user', $user);


    }

    public function store(Request $request){

        $user = Auth::user();
        $user1 = Staff::findOrFail($user->id);
        if(Hash::check($request->passwordCheck, $user->password)){

            $user1->fill(['email'=>$request->email, 'password'=>bcrypt($request->password), 'first_name'=>$request->first_name, 'last_name'=>$request->last_name, 'other_names'=>$request->other_names, 'nationality'=>$request->nationality, 'department'=>$request->department]);
            $user1->save();
            return 'success!';

        }else {

            return view('profile.edit')->with('user', $user);
            #$user1->department = $request->department;
        }

    }
}
