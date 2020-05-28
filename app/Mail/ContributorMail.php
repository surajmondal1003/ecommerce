<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContributorMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $sender_email,$receiver_email,$inputName,$data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $sender_email,string $receiver_email,string $inputName,
                                string $inputPhone,$data=[])
    {
        //
        $this->sender_email=$sender_email;
        $this->receiver_email=$receiver_email;
        $this->inputName=$inputName;
        $this->inputPhone=$inputPhone;
        // $this->uploadContent=$uploadContent;
        // $this->uploadImage=$uploadImage;
        $this->data=$data; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contributormail') ->with([
            'sender_email' => $this->sender_email,
            'receiver_email' => $this->receiver_email,
            'inputName' => $this->inputName,
            'inputPhone' => $this->inputPhone,
        ])->attach($this->data['uploadContent']->getRealPath(),
                [
                    'as' => $this->data['uploadContent']->getClientOriginalName(),
                    'mime' => $this->data['uploadContent']->getClientMimeType(),
                ])
        ->attach($this->data['uploadImage']->getRealPath(),
                [
                    'as' => $this->data['uploadImage']->getClientOriginalName(),
                    'mime' => $this->data['uploadImage']->getClientMimeType(),
                ]);
    }
}
