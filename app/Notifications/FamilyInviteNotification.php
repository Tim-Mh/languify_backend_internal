<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Models\FamilyInvite;
use App\Models\User;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Sent to an email address that may not have a Languify account yet (via
 * Notification::route('mail', $email)->notify(...) in FamilyService::invite()),
 * so this can't rely on a $notifiable User model. Not queued, matching
 * OtpNotification/PasswordResetNotification — this app runs QUEUE_CONNECTION
 * ambiguously enough (see CLAUDE.md) that synchronous delivery is the safer
 * default for any mail the user is actively expecting.
 */
class FamilyInviteNotification extends Notification
{
    public function __construct(public FamilyInvite $invite, public User $owner) {}

    /**
     * An address with no account behind it can only be emailed. Someone who
     * already has Languify installed gets it on their phone as well, which is
     * where they are far more likely to see it — an invite that only arrives by
     * email is an invite that sits unread.
     */
    public function via(object $notifiable): array
    {
        return $notifiable instanceof User ? ['mail', 'expo'] : ['mail'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        $ownerName = $this->owner->full_name ?: $this->owner->email;

        return ExpoMessage::make(
            NotificationCategory::Family,
            'Family plan invitation',
            $ownerName.' invited you to their Languify Family plan.',
        )->deepLink('/family');
    }

    public function toMail(object $notifiable): MailMessage
    {
        $joinUrl = rtrim(config('app.frontend_url'), '/').'/family/join/'.$this->invite->token;
        $ownerName = $this->owner->full_name ?: $this->owner->email;

        return (new MailMessage)
            ->subject($ownerName.' invited you to their Languify Family plan')
            ->view('emails.family-invite', [
                'ownerName' => $ownerName,
                'inviteEmail' => $this->invite->email,
                'joinUrl' => $joinUrl,
            ]);
    }
}
