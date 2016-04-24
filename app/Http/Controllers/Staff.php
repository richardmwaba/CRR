<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;

class Staff extends Controller
{
    //

    public function viewStaff(){
        $currentUser = Auth::user();
        $user = User::where('department', '=', $currentUser->department);
        return view('Staff.staff')->with('user', $user);
    }
}
