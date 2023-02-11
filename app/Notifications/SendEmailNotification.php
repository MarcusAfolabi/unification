<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $details; 
    
    public function __construct($details)
    {
        $this->details=$details;
    } 
    public function via($notifiable)
    {
        return ['mail'];
    }
 
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($this->details['greeting'])
                    ->subject($this->details['subject'])
                    ->line($this->details['body'])
                    ->action($this->details['actiontext'], $this->details['actionurl'])
                    ->line($this->details['footer']);
    }
 
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
