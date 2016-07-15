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

    public function expiring_contract_dialog($man_number)
    {

        $contract = User::firstOrNew(array('man_number' => $man_number));
        return view('HumanResource.expiring_contract_dialog')->with(array('user' => $contract));
    }


    //update and store new contract validity
    public function store(Request $request)
    {
        $newStatus = null;
        $contract = User::firstOrNew(array('man_number' => $request->man_number));

        //carbon adds the new contract length and current date instance to make expires_on date
        $today = Carbon::today();
        $today->addDays($request->contract_length);

        //check the validity of update and change the contract status value
        $difference = \Carbon\Carbon::now()->diffInMonths($today, false);
        if ($difference > 6) {
            $newStatus = "Valid";
        } elseif ($difference <= 6) {
            $newStatus = "Expires soon";
        } else {
            $newStatus = "Expired";
        }

        //set modified by
        $modified_by = Auth::user();

        //change fields respectively
        $contract->fill(['expires_on' => $today,
            'last_modified_by' => $modified_by->first_name, 'contract_tracking' => "Renewed", 'contract_status' => $newStatus]);
        $contract->save();

        //Send mail to user
        Mail::send('Mails.contract_updated', ['contract' => $contract], function ($m) use ($contract) {

            $m->to($contract->email, 'Me')->subject('Contract updated');
        });
        session()->flash('flash_message', $contract->fisrt_name . '\'s contract updated');
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
        return view('HumanResource.full_profile_info')->with(array('user' => $user));
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
                //code to send to notification to Hod
                break;
            case "Head of Department":
                $contract->contract_tracking = "Not been received";
                //code to send to notification to this user to acadamic staff
                break;
            case "Dean of School":
                $contract->contract_tracking = "Contracts Officer";
                //code to send to notification
                break;
            default :
                $contract->contract_tracking = "Waiting for HOD's acknowledgement";
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
            $contract->contract_tracking = "Waiting for Dean's acknowledgement";
            //remind the dean

        } else if ($position == "Dean of School") {
            $contract->contract_tracking = "Waiting for Contracts Officer's acknowledgement";
            //remind the contracts officer

        } else {
            $contract->contract_tracking = "Waiting for HOD's acknowledgement";
            //just send a reminder to corresponding officer
        }
        //code for reminder to hod

        $contract->save();
    }

    public function remind_user($man_number)
    {
        $contract = User::firstOrNew(array('man_number' => $man_number));
        //Send mail to new user
        Mail::send('Mails.user_reminder', ['contract' => $contract], function ($m) use ($contract) {

            $m->to($contract->email, 'Me')->subject('Have you submitted your contract for renewal?');
        });

    }

}
