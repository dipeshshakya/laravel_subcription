<?php

namespace App\Listeners;

use App\Events\Subscriber;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminSubscriberListener
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
     * @param  Subscriber  $event
     * @return void
     */
    public function handle(Subscriber $event)
    {
        //
//        dd($event);
        return $event;
    }
}
