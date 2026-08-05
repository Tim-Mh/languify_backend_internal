<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Deliberately NOT ShouldQueue — see OtpNotification's docblock; the reset
 * code is equally latency-sensitive.
 */
class PasswordResetNotification extends Notification
{
    public function __construct(public string $otp) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Reset Your Password - Languify')
            ->greeting('Hello '.($notifiable->full_name ?? 'there').'!')
            ->line('We received a request to reset your Languify password.')
            ->line('Your password reset code is:')
            ->line('**'.$this->otp.'**')
            ->line('This code is valid for 10 minutes.')
            ->line('If you did not request a password reset, no further action is required.')
            ->salutation("Best Regards,\nLanguify Team");
    }
}
