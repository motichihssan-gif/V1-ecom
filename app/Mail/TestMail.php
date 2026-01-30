<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->view('emailc')
            ->subject($this->data['subject'] ?? 'Nouveau message de contact')
            ->with([
                'name' => $this->data['name'] ?? '',
                'email' => $this->data['email'] ?? '',
                'phone' => $this->data['phone'] ?? '',
                'msg' => $this->data['message'] ?? ''
            ]);
    }

    public function attachments(): array
    {
        return [];
    }
}
