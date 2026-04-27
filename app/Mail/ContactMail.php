<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $email;
    public string $subject;
    public string $body;
    public array $details;

    public function __construct(string $name, string $email, string $subject, string $message, array $details = [])
    {
        $this->name    = $name;
        $this->email   = $email;
        $this->subject = $subject;
        $this->body    = $message;
        $this->details = $details;
    }

    public function envelope(): Envelope
    {
        // Sanitize name: strip control chars, brackets, quotes — these break RFC 2822
        $cleanName = trim(preg_replace('/[\r\n<>"\(\)\[\]]/', '', (string) $this->name));
        $cleanName = $cleanName === '' ? 'Website Visitor' : $cleanName;

        // Validate email; fall back to a placeholder if missing/invalid
        $cleanEmail = filter_var($this->email, FILTER_VALIDATE_EMAIL)
            ?: 'noreply@khaledahmed.net';

        return new Envelope(
            subject: '[Project Brief] ' . $this->subject,
            replyTo: [new Address($cleanEmail, $cleanName)],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
            with: [
                'name'    => $this->name,
                'email'   => $this->email,
                'subject' => $this->subject,
                'body'    => $this->body,
                'details' => $this->details,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
