<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationPost extends Notification
{
    use Queueable;

    
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
 
    public function via($notifiable)
    {
        return ['mail'];
    }
 
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Dear Isokan')
                    ->line("We are excited to inform you that a new post {$this->post->title} by  has been added to the platform. As you are aware, our platform allows members to post videos, audios, writeups, and even sell books and non-eatable items.")
                    ->line("We encourage all members to take advantage of this feature and share content that will inspire, educate, and uplift fellow members. Whether it's a testimony, a song, a sermon, or a product you'd like to sell, this is a great opportunity to share it with our community.")
                    ->line('Please note that all posts must adhere to the values and teachings of the Cherubim and Seraphim Church. We expect all members to maintain a respectful and uplifting tone in all posts and comments.')
                    ->line("We hope you find the new post informative and inspiring. If you have any questions or concerns, please don't hesitate to contact us.")
                    ->line('Thank you for being a part of the Cherubim and Seraphim Church Unification Campus Fellowship platform.')
                    ->action('Read now', url('https://cnsunification.org'));
    }
 
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
