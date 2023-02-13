<?php

namespace App\Notifications;

use App\Models\Resource;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResourceNotification extends Notification
{
    use Queueable;

    protected $resource;
    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }

   
    public function via($notifiable)
    {
        return ['mail'];
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject("{$this->resource->name} Materials Available for Download")
                    ->line("We are delighted to inform you that new materials - {$this->resource->name} related to our Church activities have been made available for download.")
                    ->line('We believe that these materials will be of great benefit to you and your fellowship member for your spiritual growth. To access the materials, simply log in to your account on our Church website and navigate to the "CEC Resources" section.')
                    ->line('If you have any questions or difficulties downloading the materials, please do not hesitate to reach out to us for assistance.')
                    ->action('Download Here', url('https://cnsunification.org/resource'))
                    ->line('We are always striving to provide our members with the best resources and support, and we hope that you find these materials helpful.')
                    ->line('PRO, Cherubim and Seraphim Church ');
    }
 
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
