<?php

namespace Plugins\Requests;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Plugins\Requests\Middleware\AuthenticateApi;
use Illuminate\Support\Facades\File;

class RequestsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/Routes/api.php');
        
        // Load views
        $this->loadViewsFrom(__DIR__.'/Views', 'requests');

        // Merge de configuration
        $this->mergeConfigFrom(
            __DIR__.'/config.php', 'requests'
        );

        // Register the middleware
        Route::aliasMiddleware('auth.api', AuthenticateApi::class);
    }
}