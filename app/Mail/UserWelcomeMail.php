<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;

class UserWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $validatedData;
    public $resetLink;

    public function __construct($user, $validatedData, $resetLink)
    {
        $this->user = $user;
        $this->validatedData = $validatedData;
        $this->resetLink = $resetLink;
    }

    public function build()
    {
        return $this->subject('Welcome To Our Website')
                    ->view('backend.emails.user-welcome');
    }
}