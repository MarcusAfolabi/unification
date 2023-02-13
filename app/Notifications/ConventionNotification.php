<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConventionNotification extends Notification
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
                    ->subject('New Registration for Cherubim and Seraphim Church Unification Campus Fellowship Convention 2023')
                    ->line('Dear Admin,')
                    ->line('I hope this email finds you well. I am writing to notify you of a new registration for the Cherubim and Seraphim Church Unification Campus Fellowship Convention 2023. The registrant has completed the necessary steps and has made the payment to access their virtual ID.')
                    ->line('Please find attached a copy of the payment receipt for confirmation. Kindly cross-check the payment details against your records and update the convention database accordingly.')
                    ->line('If you require any further information or clarification, please do not hesitate to reach out to me.')
                    ->line('Thank you for your attention to this matter, and I look forward to hearing back from you soon.')
                    ->action('Preview registrant ', url('https://cnsunification.org/login'))
                    ->line('Best regards,');

    }

    
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
