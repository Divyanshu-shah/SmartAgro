<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IdentificationFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $email;
    public ?string $phone;
    public ?string $farmSize;
    public string $cropType;
    public string $pestProblem;
    public string $symptoms;
    public ?string $pesticideUsed;
    public array $imagePaths;

    public function __construct(
        string $name,
        string $email,
        ?string $phone,
        ?string $farmSize,
        string $cropType,
        string $pestProblem,
        string $symptoms,
        ?string $pesticideUsed,
        array $imagePaths = []
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->farmSize = $farmSize;
        $this->cropType = $cropType;
        $this->pestProblem = $pestProblem;
        $this->symptoms = $symptoms;
        $this->pesticideUsed = $pesticideUsed;
        $this->imagePaths = $imagePaths;
    }

    public function build()
    {
        $mail = $this->subject('New Pest Identification Request from ' . $this->name)
                     ->replyTo($this->email)
                     ->view('emails.identification');

        // Attach uploaded images
        foreach ($this->imagePaths as $path) {
            if (file_exists($path)) {
                $mail->attach($path);
            }
        }

        return $mail;
    }
}
