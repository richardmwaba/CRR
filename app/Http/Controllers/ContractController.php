<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;

class ContractController extends Controller
{

    //show contract information
    public function contract_info()
    {
        $contract = User::firstOrNew(array('man_number' => Auth()->user()->man_number));
        $today = \Carbon\Carbon::today();
        $expires = \Carbon\Carbon::parse($contract->expires_on);
        $diff = $today->diffInMonths($expires, false);
        return view('Contracts.contract_info')->with(array('diff'=> $diff, 'contract' => $contract));
    }
    //

    public function store(Request $request){

        $contract = User::firstOrNew(array('man_number' =>$request->man_number));
        
        //carbon adds the new contract length and current date instance to make expires_on date
        $today = Carbon::today();
        $today->addDays($request->contract_length);

        $modified_by = Auth::user();
        $contract->fill(['man_number'=>$request->man_number, 'expires_on' => $today, 'last_modified_by' => $modified_by->first_name]);
        $contract->save();

        return Redirect::action('HomeController@index');

    }

    public function showContract($userMan){

        $contract = User::firstOrNew(array('man_number' =>$userMan));

        return view('Contracts.contract')->with(array('man_number'=> $userMan, 'contract' => $contract));

    }

    public function full_profile($userMan){

        $user = User::firstOrNew(array('man_number' =>$userMan));
        $today = \Carbon\Carbon::today();
        $expires = \Carbon\Carbon::parse($user->expires_on);
        $diff = $today->diffInMonths($expires, false);
        return view('HumanResource.full_profile_info')->with(array('diff'=> $diff, 'user' => $user));
    }

}
