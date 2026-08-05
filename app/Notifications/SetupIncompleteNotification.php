<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Notification;

/**
 * The "finish your setup" nudge: sent once, a few hours after registration,
 * to an account that signed up but never picked a language. Push-only — a
 * half-registered user is holding the phone the app is installed on, and the
 * welcome email they already got covers the mail side.
 */
class SetupIncompleteNotification extends Notification
{
    public function via(object $notifiable): array
    {
        return ['expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Reminders,
            'Pick a language to start',
            'Your account is ready. Choose what to learn and the path builds itself.',
        )->deepLink('/(setup)');
    }
}
