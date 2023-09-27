<?php

namespace App\Mail\Administration\Team;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TeamPlayerInfoToCoachMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $players;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $players)
    {
        $this->data = $data;
        $this->players = $players;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            subject: 'New Player Assigned on '. $this->data->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.administration.team.team_player_info_to_coach',
            with: [
                'data' => $this->data,
                'players' => $this->players,
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
