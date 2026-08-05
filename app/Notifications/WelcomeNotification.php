<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Sent once, on first-ever account creation only — from
 * AuthController::verifyOtp() (email/password signup) and from
 * SocialAuthController's Google/Apple callbacks (only on their "brand new
 * user" branch, never on an existing-user login/link).
 */
class WelcomeNotification extends Notification
{
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Welcome to Languify, let\'s get started!')
            ->view('emails.welcome', [
                'name' => $notifiable->full_name ?: 'there',
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/dashboard',
            ]);
    }
}
