<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $sender_email,$receiver_email,$inputName,$inputPhone,$inputMessage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $sender_email,string $receiver_email,string $inputName,string $inputPhone,string $inputMessage )
    {
        //
        $this->sender_email=$sender_email;
        $this->receiver_email=$receiver_email;
        $this->inputName=$inputName;
        $this->inputPhone=$inputPhone;
        $this->inputMessage=$inputMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contactubscription') ->with([
            'sender_email' => $this->sender_email,
            'receiver_email' => $this->receiver_email,
            'inputName' => $this->inputName,
            'inputPhone' => $this->inputPhone,
            'inputMessage' => $this->inputMessage,
        ]);
    }
}
