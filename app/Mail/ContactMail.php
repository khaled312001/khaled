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

    /** @var string */
    public $name;
    /** @var string */
    public $email;
    /**
     * NOTE: Mailable already declares $subject without a type. We must NOT
     * redeclare it with a typed property (PHP 8.4 fatal error).
     */
    public $subject;
    /** @var string */
    public $body;
    /** @var array */
    public $details = [];

    public function __construct($name, $email, $subject, $message, array $details = [])
    {
        $this->name    = (string) $name;
        $this->email   = (string) $email;
        $this->subject = (string) $subject;
        $this->body    = (string) $message;
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
