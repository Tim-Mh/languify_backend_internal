<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReEngagementNotification extends Notification
{
    /**
     * @param  int  $stage  days of inactivity: 3, 7, 14, or 30
     */
    public function __construct(public int $stage) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $name = $notifiable->full_name ?: 'there';

        return (new MailMessage)
            ->subject("We miss you at Languify, {$name}")
            ->view('emails.re-engagement', [
                'name' => $name,
                'stage' => $this->stage,
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/dashboard',
            ]);
    }
}
