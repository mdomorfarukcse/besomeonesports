<?php

namespace App\Mail\Administration\League;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class LeaguePlayerRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $league;
    public $player;
    public $invoice_number;

    /**
     * Create a new message instance.
     */
    public function __construct($league, $player, $invoice_number)
    {
        $this->league = $league;
        $this->player = $player;
        $this->invoice_number = $invoice_number;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            subject: 'League Registration Completed on '. config('app.name'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.administration.league.player_registration',
            with: [
                'league' => $this->league,
                'player' => $this->player,
                'invoice_number' => $this->invoice_number,
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
