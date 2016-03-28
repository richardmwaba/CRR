<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    //

    public function update($man_number, Request $request)
    {

        $user = User::findOrFail($man_number);
        $user->save($request::all());
        return redirect();

    }

    public function destroy($man_number, Request $request)
    {

        $user = User::findOrFail($man_number);
        $user->delete();
        return redirect();
    }
}
