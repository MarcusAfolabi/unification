<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostNotification extends Notification
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
                    ->subject('New Stories from a Church Member - Please Read and Share')
                    ->line("Dear Admin, ")
                    ->line("I am writing to inform you that a new article has been published on the church website. Below is the summary; ")
                    ->line("Title: {$this->post->title}")
                    ->line("Intro: {$this->post->intro}")
                    ->line("When: {$this->post->created_at->diffForHumans()}")
                    ->line("Author: {$this->post->user->name}")
                    ->line("Status: Published")
                    ->line("This article provides valuable insight and information about the member's experiences and thoughts, and will be a valuable resource for other members of the Church.")
                    ->line('As the PRO of the Church, I wanted to make sure that you were aware of this new post and had the opportunity to review it. If you have any concerns or questions about the article, please do not hesitate to reach out to me.')
                    ->line('We appreciate the efforts of all members who contribute to our Church community, and we are grateful for the information that has been shared in this article. We hope that this post will be well received and will encourage others to share their own thoughts and experiences as well')
                    ->action('Read now', url('https://cnsunification.org'));
                     
    }

     
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
