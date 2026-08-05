<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Notification;

/**
 * A subscriber's monthly streak freeze quietly saved their streak overnight.
 * Telling them does two jobs: "do a lesson today, the freeze only covered
 * yesterday", and showing their subscription earning its keep. Low priority —
 * good news never outranks the day's real sends.
 */
class StreakFreezeUsedNotification extends Notification
{
    public function __construct(public int $streak) {}

    public function via(object $notifiable): array
    {
        return ['expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Progress,
            "A streak freeze saved your {$this->streak}-day streak",
            'It covered yesterday only — one lesson today keeps the streak yours.',
        )->deepLink('/streak')->lowPriority();
    }
}
