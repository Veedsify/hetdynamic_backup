<?php

namespace App\Mail;

use App\Models\Contact;
use App\Models\GlobalSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Symfony\Component\Finder\Glob;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public Contact $contact;

    /**
     * Create a new message instance.
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Request From ' . GlobalSetting::first()->site_name,
            from: new Address(config("mail.from.address"), GlobalSetting::first()->site_name),
            to: GlobalSetting::first()->admin_email,
            bcc: GlobalSetting::first()->support_mail_address,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
            with: [
                'user' => $this->contact,
                'site_data' => GlobalSetting::first()
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
