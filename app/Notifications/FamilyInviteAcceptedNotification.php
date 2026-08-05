<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Models\User;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Sent to the family group owner — not the member who just joined (they get
 * the usual "you've joined!" toast in-app right after accepting).
 */
class FamilyInviteAcceptedNotification extends Notification
{
    public function __construct(public User $member) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        $memberName = $this->member->full_name ?: $this->member->email;

        return ExpoMessage::make(
            NotificationCategory::Family,
            "{$memberName} joined your Family plan",
            'They now have full access on your plan.',
        )->deepLink('/family');
    }

    public function toMail(object $notifiable): MailMessage
    {
        $memberName = $this->member->full_name ?: $this->member->email;

        return (new MailMessage)
            ->subject($memberName.' joined your Languify Family plan')
            ->view('emails.family-invite-accepted', [
                'ownerName' => $notifiable->full_name ?: 'there',
                'memberName' => $memberName,
                'memberEmail' => $this->member->email,
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/family',
            ]);
    }
}
