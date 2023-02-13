<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post; 
    public function __construct(Post $post)
    {
    $this->post = $post;
    }

   
    public function build()
    {
        return $this->markdown('mail.post-mail')->subject('Your Chapter Fellowship Activity Stories is Now Published');
    }
}
