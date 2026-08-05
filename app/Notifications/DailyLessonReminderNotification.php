<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DailyLessonReminderNotification extends Notification
{
    public function __construct(public int $streak) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Reminders,
            $this->streak > 0
                ? "Your {$this->streak}-day streak is at risk"
                : "Ready for today's lesson?",
            $this->streak > 0
                ? 'One lesson keeps it alive. It takes about 3 minutes.'
                : 'Start a new streak. Day 1 begins whenever you do.',
        )->deepLink('/home');
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->streak > 0 ? "Don't lose your {$this->streak}-day streak!" : "You haven't learned today yet")
            ->view('emails.daily-lesson-reminder', [
                'name' => $notifiable->full_name ?: 'there',
                'streak' => $this->streak,
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/dashboard',
            ]);
    }
}
