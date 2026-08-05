<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Notification;

/**
 * The Sunday-evening league nudge: the week settles at Monday's rollover, and
 * this tells a learner sitting on either edge that tonight still matters —
 * on track to promote (defend the spot) or projected to demote (one lesson
 * could save it). The weekly LeagueResultNotification reports what happened;
 * this one fires while it can still be changed. Push-only: by Monday an
 * email about "tonight" would be stale.
 */
class LeagueZoneNotification extends Notification
{
    /**
     * @param  'promotion'|'demotion'  $zone
     */
    public function __construct(public string $zone) {}

    public function via(object $notifiable): array
    {
        return ['expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        $promotion = $this->zone === 'promotion';

        return ExpoMessage::make(
            NotificationCategory::League,
            $promotion ? "You're on track for promotion" : "You're about to drop a tier",
            $promotion
                ? 'The week ends tonight. Hold your spot.'
                : 'The week ends tonight. One lesson could save your place.',
        )->deepLink('/leaderboard');
    }
}
