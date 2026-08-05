<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
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
        return ['mail', 'expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        [$title, $body] = match ($this->stage) {
            3 => ['Your course misses you', 'Three days is easy to come back from. One short lesson today.'],
            7 => ['A week away already', 'Pick up where you left off — your progress is exactly as you left it.'],
            14 => ['Two weeks. Still saved.', 'Everything you learned is waiting. Start with a 3-minute lesson.'],
            default => ['Come back to Languify', 'Your course, streaks and gems are all still here.'],
        };

        return ExpoMessage::make(NotificationCategory::Reminders, $title, $body)
            ->deepLink('/home');
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
