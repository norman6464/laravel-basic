<?php

namespace App\Providers;

use App\Events\ProductAddedEvent;
use App\Listeners\LogProductInformationListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ProductAddedEvent::class => [
            LogProductInformationListener::class,
        ],
    ];
    
    
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
