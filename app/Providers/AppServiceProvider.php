<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use App\Lib\AiProviderManager;
use App\Models\Model;
use Schema, View;
use App\Models\{
    Preference,
    Permission
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Check boot method is loaded or not.
     *
     * @var boolean
     */
    public $isBooted;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Guard $auth)
    {
        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'concept');

    }
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('all-image', function () {
            return objectStorage()->allFiles('uploads');
        });
        
        $this->app->singleton('image-directories', function () {
            return objectStorage()->allDirectories('public');
        });

        $this->app->singleton('aiprovidermanager', function ($app) {
            return new AiProviderManager;
        });
    }
}
