<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Contract;

class ContractController extends Controller
{
    //

    public function updateContract(ContractRequest $request, $user){

        $modified_by = Auth::user;
        $contract = Contract::firstOrCreate($user->man_number);
        $contract->fill(['man_number'=>$user->man_number, 'renewed_on' => $request->renewed_at,
            'expires_on' => $request->expires_on, 'last_modified_by' => $modified_by->first_name]);

    }

    public function showContract($user){

        $contract = Contract::findOrFail($user->man_number);

        return view('Contracts.contract')->with($contract);

    }

}
