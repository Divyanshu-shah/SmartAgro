<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $email;
    public ?string $phone;
    public string $mailSubject;
    public string $contactMessage;

    public function __construct(string $name, string $email, ?string $phone, string $mailSubject, string $contactMessage)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->mailSubject = $mailSubject;
        $this->contactMessage = $contactMessage;
    }

    public function build()
    {
        return $this->subject('New Contact Form Submission: ' . $this->mailSubject)
                    ->replyTo($this->email)
                    ->view('emails.contact');
    }
}
