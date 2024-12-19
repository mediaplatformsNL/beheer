<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->register(\Plugins\Requests\RequestsServiceProvider::class);
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
