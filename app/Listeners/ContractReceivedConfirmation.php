<?php

namespace App\Listeners;

use App\Events\ContractReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;
use App\User;

class ContractReceivedConfirmation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        //
        $this->mailer = $mailer;

    }

    /**
     * Handle the event.
     *
     * @param  ContractReceived  $event
     * @return void
     */
    public function handle(ContractReceived $event)
    {
        //
        if ($event->user->contract_tracking == "Contracts Officer"){
            switch (Auth()->user()->position) {

                case "Contracts Officer":
                    $event->user->contract_tracking = "Hod's Office";
                    //add code to notify hod
                    break;
                case "Head of Department":
                    $event->user->contract_tracking = "Not available";
                    //
                    break;
                case "Dean of School":
                    $event->user->contract_tracking = "Contracts Officer";
                    //
                    break;
                default :
                    $event->user->contract_tracking = "Not available";
                    //
                    break;

            }
    }else {

            switch (Auth()->user()->position) {

                case "Contracts Officer":
                    $event->user->contract_tracking = "Contracts Office";
                    break;
                case "Head of Department":
                    $event->user->contract_tracking = "HOD's Office";
                    break;
                case "Dean of School":
                    $event->user->contract_tracking = "Dean's Office";
                    break;
                default :
                    $event->user->contract_tracking = "Not available";
                    break;

            }
        }

        $event->user->save();
        //add code to notify user
        
    }
}
