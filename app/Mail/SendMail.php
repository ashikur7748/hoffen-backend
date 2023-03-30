<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fullname = '';
    public $email = '';
    public $phone = '';
    public $massage = '';

    public function __construct($fullname,$email,$phone,$massage)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->phone = $phone;
        $this->massage = $massage;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Hoffen Website',
        );
    }

    public function content()
    {
        return new Content(
            view: 'email_template.email',
        );
    }

    public function attachments()
    {
        return [];
    }
}
