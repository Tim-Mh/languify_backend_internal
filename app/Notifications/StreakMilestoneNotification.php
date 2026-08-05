<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StreakMilestoneNotification extends Notification
{
    public function __construct(public int $streak) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Rewards,
            "{$this->streak} days. Chest unlocked.",
            'Open your streak chest to collect the reward.',
        )->deepLink('/rewards');
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("{$this->streak}-day streak reward unlocked!")
            ->view('emails.streak-milestone', [
                'name' => $notifiable->full_name ?: 'there',
                'streak' => $this->streak,
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/streak',
            ]);
    }
}
