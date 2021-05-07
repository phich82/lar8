<?php

namespace App\Listeners;

use App\Events\GlobalEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GlobalListener
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
     * @param  GlobalEvent  $event
     * @return void
     */
    public function handle(GlobalEvent $event)
    {
        Log::info('[Listener][Global] => '.json_encode($event->data));
    }
}
