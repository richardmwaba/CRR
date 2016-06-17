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
        $user = User::firstOrNew(array('man_number' => $event->user->man_number));

        switch (Auth()->user()->position){

            case "Contracts Officer":
                $user->contract_tracking = "Contracts Office";
                break;
            case "Head of Department":
                $user->contract_tracking = "HOD's Office";
                break;
            case "Dean of School":
                $user->contract_tracking = "Dean's Office";
                break;
            default :
                $user->contract_tracking = "Not available";
                break;

        }
        $user->save();
    }
}
