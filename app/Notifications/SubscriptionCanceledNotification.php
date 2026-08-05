<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriptionCanceledNotification extends Notification
{
    public function __construct(public string $planTitle, public bool $isFamilyOwner) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
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
