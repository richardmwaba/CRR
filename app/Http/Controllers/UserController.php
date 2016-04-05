<?php

namespace App\Http\Controllers;

use App\Staff_info;
use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;
use Auth;

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
        #$user = User::findOrFail(1);
        return view('profile.edit')->with('user', $user);


    }

    public function store(Request $request){

        $user = ($request::all());
        Staff_info::create($request::all());
        return redirect('profile.profile');

    }
}
