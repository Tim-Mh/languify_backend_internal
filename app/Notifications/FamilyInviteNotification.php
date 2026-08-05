<?php

namespace App\Notifications;

use App\Models\FamilyInvite;
use App\Models\User;
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

    public function via(object $notifiable): array
    {
        return ['mail'];
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
