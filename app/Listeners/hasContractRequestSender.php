<?php

namespace App\Listeners;

use App\Events\hasContract;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class hasContractRequestSender
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
     * @param  hasContract  $event
     * @return void
     */
    public function handle(hasContract $event)
    {
        //
    }
}
