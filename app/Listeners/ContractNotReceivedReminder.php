<?php

namespace App\Listeners;

use App\Events\ContractNotReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class ContractNotReceivedReminder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ContractNotReceived  $event
     * @return void
     */
    public function handle(ContractNotReceived $event)
    {
        //
        if($event->user->contract_tracking == "Contracts Officer")
        switch (Auth()->user()->position) {

            case "Contracts Officer":
                $event->user->contract_tracking = "Hod's Office";
                break;
            case "Head of Department":
                $event->user->contract_tracking = "Not available";
                break;
            case "Dean of School":
                $event->user->contract_tracking = "Contracts Officer";
                break;
            default :
                $event->user->contract_tracking = "Not available";
                break;

        }

        $event->user->save();
    }
}
