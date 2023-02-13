<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SignupNotification extends Notification
{
    use Queueable;

    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

   
    public function via($notifiable)
    {
        return ['mail'];
    }

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Member Registration.')
                    ->line('Dear Admin,')
                    ->line('I hope this email finds you well. I am writing to inform you that a new member has registered on our website. The details of the new member are as follows:')
                    ->line("Name: {$this->user->name} ")
                    ->line("Email: {$this->user->email} ")
                    ->line("Status: {$this->user->fellowship_status} ")
                    ->line("Date of Registration:: {$this->user->created_at->diffForHumans()} ")                     
                    ->line('Thank you for your attention to this matter, and I look forward to hearing back from you soon.')
                    ->action('Preview Member', url('https://cnsunification.org'))
                    ->line('Best regards,');
    }

    
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
