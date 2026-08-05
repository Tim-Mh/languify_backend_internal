<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentFailedNotification extends Notification
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
            'Your payment did not go through',
            'Update your card to keep premium access.',
        )->deepLink('/shop');
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Action needed: your Languify payment failed')
            ->view('emails.payment-failed', [
                'name' => $notifiable->full_name ?: 'there',
                'planTitle' => $this->planTitle,
                'isFamilyOwner' => $this->isFamilyOwner,
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/subscription',
            ]);
    }
}
