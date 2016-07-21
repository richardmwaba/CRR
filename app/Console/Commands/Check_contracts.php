<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\User;
use Carbon\Carbon;

class check_contracts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contracts:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command checks for all users with expiring contracts per month and sends them a reminder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //gets 10 users from database
        User::chunk(10, function ($users) {

            //iterate over all users
            $today = \Carbon\Carbon::today();
            foreach ($users as $user) {
                //
                $expires = \Carbon\Carbon::parse($user->expires_on);
                $diff = $today->diffInMonths($expires, false);

                /*check for expiring contracts*/
                if ($diff < 6 AND $diff > 0) {


                    /*sends reminder if user has not submitted for renewal
                     *
                    *and sets contracts tracking state to Not available
                     *
                     *else keep sending monthly reminders until user submits contract for renewal
                     */
                    if ($user->contract_tracking != null AND $user->contract_tracking == "Renewed") {
                        Mail::send('Mails.reminder', ['user' => $user], function ($m) use ($user) {

                            $m->to($user->email, 'Me')->subject($user->first_name.', Your contract Expires soon');
                        });
                        $user->contract_tracking = "Not available";
                        $user->contract_status = "Expires soon";

                    } elseif ($user->contract_tracking != null AND $user->contract_tracking == "Not available") {
                        Mail::send('Mails.reminder', ['user' => $user], function ($m) use ($user) {

                            $m->to($user->email, 'Me')->subject($user->first_name.', Your contract Expires soon');
                        });


                    }

                    //else set the contract status to expired if it is
                } else{
                    $user->contract_status = "Expired";
                }

                //save record back to database
                $user->save();
            }
        });

        //Send a monthly email reminder of all expiring contracts to corresponding offices
        //get all users with expiring contracts
        $users = User::where('contract_status', '=', 'Expires soon')->get();

        //get email address to send reminders to
        $heads = User::whereIn('position', ['Dean of School', 'Head of Department', 'Contracts Officer'])->get();

        if($users->isEmpty()){
            //do nothing
        }else {

            //send mail to contracts officer email
            $c_officer = $heads->where('position', 'Contracts Officer')->first();
            Mail::send('Mails.contracts_to_be_renewed', ['users' => $users], function ($m) use ($c_officer) {

                $m->to($c_officer->email, 'Me')->subject($c_officer->first_name.', These contracts need your attention this month!');
            });
        }

       //get all Dean's
        $deans = $heads->where('position', 'Dean of School');

        //send them emails containing list of contracts under their department
        // which are waiting for their approval or submission to the contracts officer
        foreach ($deans as $dean){
            $under_this_dean = $users->where('school', $dean->school);
            if($under_this_dean->isEmpty()){
                //do nothing
            }
                else {
                    Mail::send('Mails.contracts_to_be_renewed', ['users' => $under_this_dean], function ($m) use ($dean) {

                        $m->to($dean->email, 'Me')->subject($dean->first_name.', These contracts need your attention this month!');
                    });
                }
        }


        //get all head's of department
        $hods = $heads->where('position', 'Head of Department');

        //send them emails containing list of contracts under their department
        // which are waiting for their approval or submission to the contracts officer
        foreach ($hods as $hod){
            $under_this_department = $users->where('department', $hod->department);
            if($under_this_department->isEmpty()){
                //do nothing
            }
            else {
                Mail::send('Mails.contracts_to_be_renewed', ['users' => $under_this_department], function ($m) use ($hod) {

                    $m->to($hod->email, 'Me')->subject($hod->first_name.', These contracts need your attention this month!');
                });
            }
        }

    }
}
