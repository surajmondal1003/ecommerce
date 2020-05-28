<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $sender_email,$receiver_email,$inputName,$inputMessage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $sender_email,string $receiver_email,string $inputName,string $inputMessage )
    {
        //
        $this->sender_email=$sender_email;
        $this->receiver_email=$receiver_email;
        $this->inputName=$inputName;
        $this->inputMessage=$inputMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.messagesubscription') ->with([
            'sender_email' => $this->sender_email,
            'receiver_email' => $this->receiver_email,
            'inputName' => $this->inputName,
            'inputMessage' => $this->inputMessage,
        ]);
    }
}
