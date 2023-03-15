<?php

namespace App\Mail;

use App\Models\Postlike;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LikeMail extends Mailable
{
    use Queueable, SerializesModels;

    // public $like; 
     
    public function __construct(public Postlike $like)
    {
        $this->like = $like;
    }

    
    public function build()
    {
        return $this
        ->subject('Wow, You are now a Star ✨')
        ->markdown('mail.like-mail');
    }
}
