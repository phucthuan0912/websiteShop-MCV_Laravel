<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;
    private $data = [];
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data =$data;
    }

    /**
     * tiêu đề mail sẽ là:
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cambo Tutorial Mail',
        );
    }

    /**
     * giao diện email.
     */
    public function content(): Content
    {
        return new Content(
            view: 'frontend.sendMail.index',
            with: ['data' => $this->data]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
