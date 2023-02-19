<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\ItemStored;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ItemStoredNotification;

class SendItemStoredNotification
{
    use InteractsWithQueue;
    public function __construct()
    {
        //
    }


    public function handle(ItemStored $event)
    {
        $users = User::all();

        Notification::send($users, new ItemStoredNotification());
        $notification = new ItemStoredNotification($users);

        // Check if the rate limit for notifications has been reached
        if (!RateLimiter::tooManyAttempts('notifications', 10)) {
            Notification::send($users, $notification);

            // Increment the rate limiter for notifications
            RateLimiter::hit('notifications');
        }
    }
}
