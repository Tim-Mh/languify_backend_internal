<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Notification;

/**
 * Hearts regenerated back to full after running dry mid-lesson. Aimed at
 * exactly the learner who was playing, ran out, and left — the marker is
 * cleared the moment they complete any lesson, so someone who came back on
 * their own never gets it. Push-only: the moment has passed within hours.
 */
class HeartsFullNotification extends Notification
{
    public function via(object $notifiable): array
    {
        return ['expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Progress,
            'Your hearts are full again',
            'Pick up where you left off.',
        )->deepLink('/home');
    }
}
