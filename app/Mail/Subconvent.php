<?php

namespace App\Mail;

use App\Models\Subconvention;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Subconvent extends Mailable
{
    use Queueable, SerializesModels;

    public $subconvention;
    public function __construct(Subconvention $subconvention)
    {
        $this->subconvention = $subconvention;
    }

   
    public function build()
    {
        return $this->markdown('mail.subconvention')
                    ->subject('Cherubim and Seraphim Church Unification Campus Fellowship Subconvention 2023')
                    ;

    }
}
