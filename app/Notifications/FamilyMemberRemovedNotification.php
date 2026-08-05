<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FamilyMemberRemovedNotification extends Notification
{
    /**
     * @param  'removed'|'left'  $reason
     */
    public function __construct(public string $ownerName, public string $reason) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Family,
            $this->reason === 'left'
                ? "You've left {$this->ownerName}'s Family plan"
                : "You've been removed from {$this->ownerName}'s Family plan",
            'Your progress is safe. You can get your own plan any time.',
        )->deepLink('/shop');
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->reason === 'left'
                ? "You've left {$this->ownerName}'s Family plan"
                : "You've been removed from {$this->ownerName}'s Family plan")
            ->view('emails.family-member-removed', [
                'name' => $notifiable->full_name ?: 'there',
                'ownerName' => $this->ownerName,
                'reason' => $this->reason,
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/subscription',
            ]);
    }
}
