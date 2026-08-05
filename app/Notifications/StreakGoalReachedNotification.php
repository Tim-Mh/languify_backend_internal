<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Notification;

/**
 * The learner hit the streak goal they chose for themselves at setup —
 * distinct from StreakMilestoneNotification's fixed chest thresholds. Fired
 * from the lesson that crosses the goal, so it lands while the phone is
 * already in hand. Push-only for the same reason.
 */
class StreakGoalReachedNotification extends Notification
{
    public function __construct(public int $days) {}

    public function via(object $notifiable): array
    {
        return ['expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Rewards,
            "{$this->days} days — you hit your goal",
            'The streak goal you set yourself, done. Keep it rolling?',
        )->deepLink('/streak');
    }
}
