<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Notification;

/**
 * A yearly plan renews in a few days. A charge nobody remembers agreeing to
 * is how chargebacks and one-star reviews happen; a heads-up costs one push
 * and reads as honesty. Only for yearly plans — monthly renewals are too
 * frequent to announce without becoming noise.
 */
class SubscriptionRenewalReminderNotification extends Notification
{
    public function __construct(public string $planTitle, public int $daysUntil) {}

    public function via(object $notifiable): array
    {
        return ['expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        $when = $this->daysUntil <= 1 ? 'tomorrow' : "in {$this->daysUntil} days";

        return ExpoMessage::make(
            NotificationCategory::Billing,
            "Your {$this->planTitle} plan renews {$when}",
            'Manage or cancel any time from the shop.',
        )->deepLink('/shop');
    }
}
