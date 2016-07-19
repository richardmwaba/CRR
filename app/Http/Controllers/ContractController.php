<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
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
    public function store(Request $request, $man_number)
    {
        $newStatus = null;
        $contract = User::firstOrNew(array('man_number' => $man_number));

        //carbon adds the new contract length and current date instance to make expires_on date
        $today = Carbon::today();
        $today->addDays($request->contract_length);

        //check the validity of update and change the contract status value
        $difference = Carbon::now()->diffInMonths($today, false);
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
        'last_modified_by' => $modified_by->first_name,
        'contract_tracking' => "Renewed",
        'contract_status' => $newStatus]);
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

        return view('Contracts.contract')->with(array('contract' => $contract));

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

                //code to send to notification to this user
                Mail::send('Mails.contract_tracking_change', ['contract' => $contract], function ($m) use ($contract) {

                    $m->to($contract->email, 'Me')->subject('You have an update on your contract');
                });
                break;
            case "Head of Department":
                $contract->contract_tracking = "HOD's Office";

                //code to send to notification
                Mail::send('Mails.contract_tracking_change', ['contract' => $contract], function ($m) use ($contract) {

                    $m->to($contract->email, 'Me')->subject('You have an update on your contract');
                });
                break;
            case "Dean of School":
                $contract->contract_tracking = "Dean's Office";

                //code to send to notification
                MMail::send('Mails.contract_tracking_change', ['contract' => $contract], function ($m) use ($contract) {

                    $m->to($contract->email, 'Me')->subject('You have an update on your contract');
                });
                break;
            default :
                $contract->contract_tracking = "Waiting for HOD's acknowledgement";
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

                //fetch Deans's email address
                $match = ['position' => 'Dean of School', 'school' => $contract->school];
                $thisDean = User::where($match)->first();

                ///restore the tracking status to previous state
                $contract->contract_tracking = "Dean's Office";
                $contract->put('from','Contracts Officer');

                //remind the dean
                Mail::send('Mails.contract_not_received', ['contract' => $contract], function ($m) use ($thisDean) {

                    $m->to($thisDean->email, 'Me')->subject('Contract has not been received');
                });
                
                break;
            case "Head of Department":

                //restore the tracking status to previous state
                $contract->contract_tracking = "Not available";
                $contract->put('from', 'Head of Department');
                
                //notify user that his contract has not been received
                Mail::send('Mails.contract_not_received', ['contract' => $contract], function ($m) use ($contract) {

                    $m->to($contract->email, 'Me')->subject('Contract has not been received');
                });
                
                break;
            case "Dean of School":
                
                //restore the tracking status to previous state
                $contract->contract_tracking = "HOD's Office";
                $contract->put('from', 'Dean of School');

                //fetch hod's email address
                $match = ['position' => 'Head of Department', 'department' => $contract->department];
                $thisHod = User::where($match)->first();

                //remind the hod
                Mail::send('Mails.contract_not_received', ['contract' => $contract], function ($m) use ($thisHod) {

                    $m->to($thisHod->email, 'Me')->subject('Contract has not been received');
                });
                
                break;
            default :
                $contract->contract_tracking = "Not available";
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

        //check who is submitting this contract and send to receiver a reminder
        if ($position == "Head of Department") {

            //fetch Deans's email address
            $match = ['position' => 'Dean of School', 'school' => $contract->school];
            $thisDean = User::where($match)->first();

            //change tracking status
            $contract->contract_tracking = "Waiting for Dean's acknowledgement";

            //remind the dean
            Mail::send('Mails.contract_submitted', ['contract' => $contract], function ($m) use ($thisDean) {

                $m->to($thisDean->email, 'Me')->subject('A new contract has been submitted to you');
            });

        } else if ($position == "Dean of School") {

            //fetch contract officer's email address
            $contractOff = User::where('position', 'Contracts Officer')->first();

            //change tracking status
            $contract->contract_tracking = "Waiting for Contracts Officer's acknowledgement";
            //remind the contracts officer
            Mail::send('Mails.contract_submitted', ['contract' => $contract], function ($m) use ($contractOff) {

                $m->to($contractOff->email, 'Me')->subject('A new contract has been submitted to you');
            });


        } else {
            //fetch hod's email address
            $match = ['position' => 'Head of Department', 'department' => $contract->department];
            $thisHod = User::where($match)->first();

            //change tracking status
            $contract->contract_tracking = "Waiting for Contracts Officer's acknowledgement";
            
            //remind the hod
            Mail::send('Mails.contract_submitted', ['contract' => $contract], function ($m) use ($thisHod) {

                $m->to($thisHod->email, 'Me')->subject('A new contract has been submitted to you');
            });
            
        }
        //save model
        $contract->save();
    }

    public function remind_user($man_number)
    {
        $contract = User::firstOrNew(array('man_number' => $man_number));
        //Send mail to new user
        Mail::send('Mails.user_reminder', ['contract' => $contract], function ($m) use ($contract) {

            $m->to($contract->email, 'Me')->subject($contract->first_name . ', Your contract has not yet been received.');
        });

    }

}
