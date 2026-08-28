<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevoLead extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Lead $lead)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo lead 360 — '.$this->lead->nombre.' ('.$this->lead->telefono.')',
            replyTo: $this->lead->email ? [$this->lead->email] : null,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.nuevo-lead',
            with: ['lead' => $this->lead],
        );
    }
}
