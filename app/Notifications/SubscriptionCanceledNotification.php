<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriptionCanceledNotification extends Notification
{
    public function __construct(public string $planTitle, public bool $isFamilyOwner) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Billing,
            "Your {$this->planTitle} plan has ended",
            $this->isFamilyOwner
                ? 'Your family members lose access too. Your progress is safe.'
                : 'Your progress is safe. Come back any time.',
        )->deepLink('/shop');
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Your Languify {$this->planTitle} plan has ended")
            ->view('emails.subscription-canceled', [
                'name' => $notifiable->full_name ?: 'there',
                'planTitle' => $this->planTitle,
                'isFamilyOwner' => $this->isFamilyOwner,
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/subscription',
            ]);
    }
}
