<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class TestListnerSubscriber
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
     * Handle user login events.
     */
    public function handleLogin($event = [])
    {
        Log::info('[ListnerSubscriber] => Handle Login: '.json_encode(['event' => $event, 'args' => func_get_args()]));
    }

    /**
     * Handle user logout events.
     */
    public function handleLogout($event = [])
    {
        Log::info('[ListnerSubscriber] => Handle Logout: '.json_encode(['event' => $event, 'args' => func_get_args()]));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen(
            'Web::Login',
            [TestListnerSubscriber::class, 'handleLogin']
        );

        $events->listen(
            'Web::Logout',
            [TestListnerSubscriber::class, 'handleLogout']
        );
    }
}
