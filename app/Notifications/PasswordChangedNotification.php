<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordChangedNotification extends Notification
{
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your Languify password was changed')
            ->view('emails.password-changed', [
                'name' => $notifiable->full_name ?: 'there',
                'email' => $notifiable->email,
                'changedAt' => now($notifiable->timezone ?: config('app.timezone'))->format('F j, Y \a\t g:i A'),
                'resetUrl' => rtrim(config('app.frontend_url'), '/').'/forgot-password',
            ]);
    }
}
