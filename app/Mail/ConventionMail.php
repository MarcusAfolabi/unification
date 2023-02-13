<?php

namespace App\Mail;

use App\Models\Convention;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConventionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $convention; 

    public function __construct(Convention $convention)
    {
        $this->convention = $convention;
    }
 
    public function build()
    {
        return $this->markdown('mail.convention-mail')
                    ->subject('Cherubim and Seraphim Church Unification Campus Fellowship Convention 2023 - ID Payment Information')
                    ;
    }
}
