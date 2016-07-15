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
            foreach ($users as $user) {
                //
                $today = \Carbon\Carbon::today();
                $expires = \Carbon\Carbon::parse($user->expires_on);
                $diff = $today->diffInMonths($expires, false);

                /*check for expiring contracts*/
                if ($diff <= 6) {


                    /*sends reminder if user has not submitted for renewal
                     *
                    *and sets contracts tracking state to Not available
                     *
                     *else keep sending monthly reminders until user submits contract for renewal
                     */
                    if ($user->contract_tracking != null AND $user->contract_tracking == "Renewed") {
                        Mail::send('Mails.user_reminder', ['user' => $user], function ($m) use ($user) {

                            $m->to($user->email, 'Me')->subject('Renew your contract!');
                        });
                        $user->contract_tracking = "Not available";
                        $user->contract_status = "Expires soon";

                    } elseif ($user->contract_tracking != null AND $user->contract_tracking == "Not available") {
                        Mail::send('Mails.user_reminder', ['user' => $user], function ($m) use ($user) {

                            $m->to($user->email, 'Me')->subject('Renew your contract!');
                        });


                    }

                    //else set the contract status to expired if it is
                } elseif ($diff <= 0) {
                    $user->contract_status = "Expired";
                }

                //save record back to database
                $user->save();
            }
        });

        //code to send monthly reminder of all expiring contracts to contracts office
        $users = User::where('contract_status', '=', 'Expires soon')->get();

        //get contracts officer email address
        $user = User::firstOrNew(array('position' => 'Contracts Officer'));

        //send monthly email to dean

        /*send monthly email to HOD
        $hods = User::firstOrNew(array('position' => 'Head of Department'));
        foreach($users as $user){
            foreach($hods as $)
            if($user->department == );
        }
         */

        //send the mail
        Mail::send('Mails.contracts_to_be_renewed', ['users' => $users], function ($m) use ($user) {

            $m->to($user->email, 'Me')->subject('Contracts need renewal!');
        });
    }
}
