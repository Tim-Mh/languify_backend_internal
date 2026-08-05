<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MotivationNotification extends Notification
{
    public function __construct(public int $streak) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("{$this->streak} days strong, keep it up!")
            ->view('emails.motivation', [
                'name' => $notifiable->full_name ?: 'there',
                'streak' => $this->streak,
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/dashboard',
            ]);
    }
}
