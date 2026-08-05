<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StreakBrokenNotification extends Notification
{
    public function __construct(public int $streak) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'expo'];
    }

    // Progress rather than Reminders on purpose: the reminders category is
    // the once-a-day nag slot, and burning it on the morning's bad news would
    // suppress the evening's "start a new streak" reminder.
    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Progress,
            "Your {$this->streak}-day streak ended",
            'Day 1 of the next one begins whenever you do.',
        )->deepLink('/streak');
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
