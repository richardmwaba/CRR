<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Contract;
use Illuminate\Support\Facades\Redirect;

class ContractController extends Controller
{

    //show contract information
    public function contract_info()
    {
        $contract = Contract::firstOrNew(array('man_number' => Auth()->user()->man_number));
        $today = \Carbon\Carbon::today();
        $expires = \Carbon\Carbon::parse($contract->expires_on);
        $diff = $today->diffInMonths($expires, false);
        return view('Contracts.contract_info')->with(array('diff'=> $diff, 'contract' => $contract));
    }
    //

    public function store(Request $request){

        $modified_by = Auth::user();
        $contract = Contract::firstOrNew(array('man_number' =>$request->man_number));
        $contract->fill(['man_number'=>$request->man_number, 'renewed_on' => $request->renewed_on,
            'expires_on' => $request->expires_on, 'last_modified_by' => $modified_by->first_name]);
        $contract->save();

        return Redirect::action('UserController@staff_view');

    }

    public function showContract($userMan){

        $contract = Contract::firstOrNew(array('man_number' =>$userMan));

        return view('Contracts.contract')->with(array('man_number'=> $userMan, 'contract' => $contract));

    }

}
