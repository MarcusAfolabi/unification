<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;
 
    protected $contact;

    public function __construct(Contact $contact)
    {
       $this->contact = $contact;
        
    }
 
    public function via($notifiable)
    {
        return ['mail'];
    }
 
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New user contact via website')
                    ->line('Hello Admin,')
                    ->line('A new user has contacted you via the website. Here are the details:')
                    ->line("Name: {$this->contact->name}")
                    ->line("Email: {$this->contact->email}")
                    ->line("Phone: {$this->contact->phone}")
                    ->line("Subject: {$this->contact->subject}")
                    ->line("Message: {$this->contact->message}") 
                    ->action('View contact', url('https://cnsunification.org/contact'))
                    ->line('Please follow up with the user at your earliest convenience')
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
