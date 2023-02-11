<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeEmailNotification extends Notification 
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
                    ->subject('Welcome Message from CEC PRO')
                    ->attach('assets/images/isokan_logo.png')
                    ->greeting('Hi Dear,')
                    ->line('I welcome you to the CHERUBIM AND SERAPHIM UNIFICATION CAMPUS FELLOWSHIP WEBSITE. It is a great privilege and honour to have you here. The grace that brought you here will keep you.')
                    ->line('This website is solely for the edification of the saints, updates on the events concerning the fellowships under
                    this body and also dissemination of information about the body as a whole.')
                    ->line('I will beseech you all to abide by the rules and regulations set for the websites. There are many benefits to derive
                    from this website both spiritually and physically.')
                    ->line('There are spiritual videos, audio and books you can download for your spiritual growth. We have daily prayer and
                    daily scripture exposition you can practise and also meditate on before you start your daily activity.')
                    ->line('For you to be partakers of the development of this website, you need to tell your fellow members and alumni to join
                    this train so that they can also benefit from all that you will benefit from on this website.')
                    ->line('Once again, I welcome you to this website and I pray that the grace of God will continue to be sufficient for you.') 
                    ->action('Proceed to Payment', url('https://cnsunification.org/payment'))
                    ->line('Isokan ni ooo! 🤗');
    }
 
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
