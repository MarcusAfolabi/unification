<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMemberNotification extends Notification implements ShouldQueue
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
                    ->line('Hey Admin.')
                    ->subject('New Member Added')
                    ->line('New Member Just Signed for Sub Convention.')
                    ->action('View Member', url('https://cnsunification.org/dashboard'))
                    ->line('Thank you for using our application!');
    }
 
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
