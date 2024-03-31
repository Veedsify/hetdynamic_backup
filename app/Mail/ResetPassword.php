<?php

namespace App\Mail;

use App\Models\User;
use App\Models\GlobalSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    public User $user;
    public string $code;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, $code)
    {
        $this->user = $user;
        $this->code = $code;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: ' Reset Password -' . GlobalSetting::first()->site_name,
            from: new Address(GlobalSetting::first()->mail_address, GlobalSetting::first()->site_name),
            to: $this->user->email,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.resetpassword',
            with: [
                'user' => $this->user,
                'code' => $this->code,
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
