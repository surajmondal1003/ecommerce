<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailSubscription extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data=[])
    {
        // $this->user=$user;
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.emailsubscription') ->with([
            'activation_link' => $this->data['activation_link'],
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            
        ]);
    }
}
