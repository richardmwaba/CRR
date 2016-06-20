<?php

namespace App\Http\Controllers;

use App\Events\ContractReceived;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Mail;

class ContractController extends Controller
{

    //show contract information
    public function contract_info()
    {
        $contract = User::firstOrNew(array('man_number' => Auth()->user()->man_number));
        $today = \Carbon\Carbon::today();
        $expires = \Carbon\Carbon::parse($contract->expires_on);
        $diff = $today->diffInMonths($expires, false);
        return view('Contracts.contract_info')->with(array('diff' => $diff, 'contract' => $contract));
    }


    //update and store new contract validity
    public function store(Request $request)
    {

        $contract = User::firstOrNew(array('man_number' => $request->man_number));

        //carbon adds the new contract length and current date instance to make expires_on date
        $today = Carbon::today();
        $today->addDays($request->contract_length);

        //set modified by
        $modified_by = Auth::user();
        $contract->fill(['man_number' => $request->man_number, 'expires_on' => $today, 'last_modified_by' => $modified_by->first_name]);
        $contract->save();

        //Send mail to new user
        Mail::send('Mails.contract_updated', ['contract' => $contract], function ($m) use ($contract) {

            $m->to($contract->email, 'Me')->subject('Contract update');
        });

        return Redirect::action('HomeController@index');

    }

    public function showContract($userMan)
    {

        $contract = User::firstOrNew(array('man_number' => $userMan));

        return view('Contracts.contract')->with(array('man_number' => $userMan, 'contract' => $contract));

    }

    public function full_profile($userMan)
    {

        $user = User::firstOrNew(array('man_number' => $userMan));
        $today = \Carbon\Carbon::today();
        $expires = \Carbon\Carbon::parse($user->expires_on);
        $diff = $today->diffInMonths($expires, false);
        return view('HumanResource.full_profile_info')->with(array('diff' => $diff, 'user' => $user));
    }

    public function contract_received($man_number)
    {

        $contract = User::firstOrNew(array('man_number' => $man_number));
        switch (Auth()->user()->position) {

            case "Contracts Officer":
                $contract->contract_tracking = "Contracts Office";
                //code to send to notification
                break;
            case "Head of Department":
                $contract->contract_tracking = "HOD's Office";
                //code to send to notification
                break;
            case "Dean of School":
                $contract->contract_tracking = "Dean's Office";
                //code to send to notification
                break;
            default :
                $contract->contract_tracking = "In progress...";
                break;

        }
        $contract->save();
        return response()->json($contract->contract_tracking);

    }

    public function contract_not_received($man_number)
    {

        $contract = User::firstOrNew(array('man_number' => $man_number));
        switch (Auth()->user()->position) {

            case "Contracts Officer":
                $contract->contract_tracking = "HOD's Office";
                //code to send to notification
                break;
            case "Head of Department":
                $contract->contract_tracking = "Not been received";
                //code to send to notification to this user
                break;
            case "Dean of School":
                $contract->contract_tracking = "Contracts Officer";
                //code to send to notification
                break;
            default :
                $contract->contract_tracking = "In progress...";
                //code to send to notification
                break;

        }

        $contract->save();
        return response()->json($contract->contract_tracking);

    }

    public function contract_submitted($man_number)
    {
        //send reminder to corresponding office

        $contract = User::firstOrNew(array('man_number' => $man_number));
        $position = Auth()->user()->position;
        if ($position == "Head of Department") {
            $contract->contract_tracking = "Waiting for Contract's approval";
            //remind contracts officer
        } else if($position == "Contracts Officer") {
            $contract->contract_tracking = "Waiting for Dean's approval";

        }else if($position == "Dean of School") {
                $contract->contract_tracking = "Contracts Office";
        }else{
            $contract->contract_tracking = "Waiting for Dean's approval";
            //just send a reminder to corresponding officer
        }
        //code for reminder to hod

        $contract->save();
    }

}
