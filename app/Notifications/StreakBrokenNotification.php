<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StreakBrokenNotification extends Notification
{
    public function __construct(public int $streak) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your streak ended, start a new one today')
            ->view('emails.streak-broken', [
                'name' => $notifiable->full_name ?: 'there',
                'streak' => $this->streak,
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/dashboard',
            ]);
    }
}
