<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Messages\MailMessage;

class InvitationEmail extends Mailable
{
    use Queueable, SerializesModels;


    public function content()
    {
        return (new MailMessage)
            ->subject('Invitation to Join Project')
            ->line('You have been invited to join a project.')
            ->action('Accept Invitation', 'https://example.com/accept-invitation')
            ->line('Your Project Team');
    }

}