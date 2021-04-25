<?php

namespace App\Providers;

use Illuminate\Cache\FileStore;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Define 'environment' cache driver
        $this->app->booting(function () {
            Cache::extend('environment', function ($app) {
                $config = config('cache.stores.environment');
                return Cache::repository(
                    new FileStore($app['files'], $config['path'], $config['permission'] ?? null)
                );
            });
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
