<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Sent to every member of a Family group when the OWNER's subscription
 * cancels — distinct from SubscriptionCanceledNotification, which goes to
 * the owner themselves.
 */
class FamilyPlanCanceledNotification extends Notification
{
    public function __construct(public string $ownerName) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("{$this->ownerName}'s Languify Family plan has ended")
            ->view('emails.family-plan-canceled', [
                'name' => $notifiable->full_name ?: 'there',
                'ownerName' => $this->ownerName,
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/subscription',
            ]);
    }
}
