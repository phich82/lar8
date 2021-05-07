<?php

namespace App\Providers;

use Throwable;
use App\Events\TestEvent;
use App\Events\GlobalEvent;
use App\Events\TestQueue;
use App\Listeners\DemoListener;
use App\Listeners\TestListener;
use App\Listeners\GlobalListener;
use App\Listeners\SampleListener;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Redis;
use Illuminate\Auth\Events\Registered;

use App\Listeners\TestListenerSubscriber;
use App\Listeners\TestQueueListener;

use function Illuminate\Events\queueable;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        TestQueue::class => [
            TestQueueListener::class,
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        TestListenerSubscriber::class,
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

        // Event with queue via closure
        // Run: php artisan queue:work redis --queue=podcasts
        // Where: redis: queue connection name, podcasts: queue name
        // When dispatch event of GlobalEvent (GlobalEvent::dispatch()), this queue will run
        Event::listen(
            queueable(function (GlobalEvent $event) {
                Redis::set('test', 'demo');
                $data = [
                    "Get value of 'test' key from redis servcer" => Redis::get('test'),
                    "Event data" => $event->data ?? null
                ];
                echo "Data => ".json_encode($data, JSON_PRETTY_PRINT)."\n";
            })
            ->catch(function (GlobalEvent $event, Throwable $e) {
                echo "[Error]: ".$e->getMessage();
            })
            ->onConnection('redis')
            ->onQueue('podcasts')
            ->delay(now()->addSeconds(10))
        );
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
