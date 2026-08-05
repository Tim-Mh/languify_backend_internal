<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Sent when a plan reaches its period end in the manual-renewal model and the
 * account drops back to the free tier (see ExpireSubscriptions). Reassures the
 * user their progress is untouched and points them at renewing.
 */
class SubscriptionExpiredNotification extends Notification
{
    public function __construct(public string $planTitle) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Billing,
            "Your {$this->planTitle} plan has ended",
            'Your progress is untouched. Renew whenever you like.',
        )->deepLink('/shop');
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Your Languify {$this->planTitle} plan has ended")
            ->view('emails.subscription-expired', [
                'name' => $notifiable->full_name ?: 'there',
                'planTitle' => $this->planTitle,
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/store',
            ]);
    }
}
