<?php

namespace App\Listeners;

use App\Events\TestQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestQueueListener implements ShouldQueue
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
     * @param  TestQueue  $event
     * @return void
     */
    public function handle(TestQueue $event)
    {
        Log::info('[Listener][Queue] => '.json_encode($event->data));
    }

    /**
     * Determine whether the listener should be queued.
     *
     * @param  \App\Events\OrderCreated  $event
     * @return bool
     */
    public function shouldQueue(TestQueue $event)
    {
        return ($event->data['subtotal'] ?? 0) >= 5000;
    }
}
