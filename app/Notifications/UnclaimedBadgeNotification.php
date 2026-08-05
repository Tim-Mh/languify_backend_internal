<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Notification;

/**
 * Badges are claimed manually from the profile and nothing in the app
 * announces that one is claimable — this closes that gap. Sent from the
 * hourly sweep at most once a week while anything is waiting. Push-only:
 * "you have a badge" is a glance-and-tap message, not an email.
 */
class UnclaimedBadgeNotification extends Notification
{
    public function __construct(public int $count) {}

    public function via(object $notifiable): array
    {
        return ['expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Rewards,
            $this->count === 1 ? 'You have a badge to claim' : "You have {$this->count} badges to claim",
            'Gems, XP and hearts come with it. Collect it on your profile.',
        )->deepLink('/profile');
    }
}
