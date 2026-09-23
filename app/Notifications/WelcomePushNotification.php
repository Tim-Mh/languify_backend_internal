<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Notification;

/**
 * The first push a learner ever receives, once their device is reachable.
 *
 * Push-only on purpose. WelcomeNotification already covers the email at signup
 * and cannot carry a push: it fires while the account is still being created,
 * and the app does not register its token until sign-in has completed, so there
 * is no device to send to yet.
 *
 * Sent from the sweep rather than from the registration endpoint. Sending it
 * inline would make a phone's token registration wait on an external push API,
 * and a token the service rejects is deleted on the spot, so the request could
 * destroy the row it had just written.
 *
 * It doubles as a live confirmation that the whole push chain works, which is
 * otherwise surprisingly hard to observe.
 */
class WelcomePushNotification extends Notification
{
    public function via(object $notifiable): array
    {
        return ['expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Reminders,
            'Notifications are on',
            'We will nudge you when your streak is at risk, your hearts refill, or a chest is ready.',
        )->deepLink('/home');
    }
}
