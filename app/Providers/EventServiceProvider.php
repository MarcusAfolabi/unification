<?php

namespace App\Providers;

use App\Events\ItemStored;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use App\Listeners\SendItemStoredNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    
    
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ItemStored::class => [
            SendItemStoredNotification::class,
        ], 
        
    ];
 
    public function boot()
    {
        RateLimiter::for('notifications', function (Request $request) {
            return Limit::perSeconds(2)->every(20);
        });
    } 

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
