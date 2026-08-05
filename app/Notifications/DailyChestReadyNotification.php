<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Notification;

/**
 * The daily chest came off cooldown. Only sent to learners who claimed one
 * in the last two days — chest-engaged people who would want to know — and
 * marked low priority: it must never take the day's last cap slot from a
 * streak-at-risk push. Push-only by nature; nobody wants this as email.
 */
class DailyChestReadyNotification extends Notification
{
    public function via(object $notifiable): array
    {
        return ['expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Rewards,
            'Your daily chest is ready',
            'Free gems waiting. One tap.',
        )->deepLink('/rewards')->lowPriority();
    }
}
