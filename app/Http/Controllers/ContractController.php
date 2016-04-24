<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Contract;
use Illuminate\Support\Facades\Redirect;

class ContractController extends Controller
{
    //

    public function store(Request $request){

        $modified_by = Auth::user();
        $contract = Contract::firstOrNew(array('man_number' =>$request->man_number));
        $contract->fill(['man_number'=>$request->man_number, 'renewed_on' => $request->renewed_on,
            'expires_on' => $request->expires_on, 'last_modified_by' => $modified_by->first_name]);
        $contract->save();

        return Redirect::action('Staff@viewStaff');

    }

    public function showContract($userMan){

        $contract = Contract::firstOrNew(array('man_number' =>$userMan));

        return view('Contracts.contract')->with(array('man_number'=> $userMan, 'contract' => $contract));

    }

}
