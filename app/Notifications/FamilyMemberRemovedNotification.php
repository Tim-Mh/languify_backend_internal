<?php

namespace App\Notifications;

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
        return ['mail'];
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
