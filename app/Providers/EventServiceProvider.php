<?php

namespace App\Providers;

use App\Events\GlobalEvent;
use App\Events\TestEvent;
use App\Listeners\DemoListener;
use App\Listeners\GlobalListener;
use App\Listeners\SampleListener;
use App\Listeners\TestListener;
use App\Listeners\TestListnerSubscriber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

/**
 * Subscribe to multiple events from within the subscriber class itself
 * Allowing you to define several event handlers within a single class.
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        TestEvent::class => [
            TestListener::class,
            DemoListener::class,
            SampleListener::class,
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        TestListnerSubscriber::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(GlobalEvent::class, [GlobalListener::class, 'handle']);

        // Define an event as 'admin:test'
        Event::listen('admin:test', function ($eventName, $data = []) {
            Log::info('[Event:admin:test] => '.json_encode([$eventName, $data]));
            Log::info('[Event:admin:test][args] => '.json_encode(func_get_args()));
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    // public function shouldDiscoverEvents()
    // {
    //     return true;
    // }

    /**
     * Get the listener directories that should be used to discover events.
     *
     * @return array
     */
    // protected function discoverEventsWithin()
    // {
    //     return [
    //         $this->app->path('Listeners'),
    //     ];
    // }
}
