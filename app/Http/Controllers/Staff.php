<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use App\Contract;

class Staff extends Controller
{
    //

    public function staff_view(){

        $currentUser = Auth::user();
        $user = User::where('department', '=', $currentUser->department)->get();
        #return view('Staff.staff')->with(array('user' => $user));
        return view('Staff.staff_view')->with(array('user' => $user));
    }

    public function add_new_form(){
        return view('auth.add_new');
    }
}
