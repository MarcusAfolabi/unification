<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewPostNotification extends Notification implements ShouldQueue
{
    use Queueable;
 
    public function __construct()
    {
        //
    }
 
    public function via($notifiable)
    {
        return ['mail'];
    }
 
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->from('noreply@cnsunification.org', 'Cherubim and Seraphim Church Unification Campus Fellowship')
                    ->subject('New Post Notification')
                    ->line('We have published a new post for you on isokan website')
                    ->action('Read It Here', url('https://cnsunification.org'))
                    ->line('Once again, We hope to edify your spirit and soul with blessed instrument of heaven!');
    }
 
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
