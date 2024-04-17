<?php

namespace App\Mail\Administration\Player;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PlayerLoginCredentialMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $playerEmail;
    public $playerPassword;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $playerEmail, $playerPassword)
    {
        $this->data = $data;
        $this->playerEmail = $playerEmail;
        $this->playerPassword = $playerPassword;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            subject: 'Login Credential Of '. config('app.name'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.administration.player.credential',
            with: [
                'data' => $this->data,
                'playerEmail' => $this->playerEmail,
                'playerPassword' => $this->playerPassword
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
