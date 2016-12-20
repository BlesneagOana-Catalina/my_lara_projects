<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	 protected $titlu;
	 protected $mesaj;
    public function __construct($t,$m)
    {
     $this->titlu=$t;
	 $this->mesaj=$m;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$data=['titlu' => $this->titlu,
               'mesaj' => $this->mesaj,
               ];
        return $this->view('emails',$data);
    }
}
