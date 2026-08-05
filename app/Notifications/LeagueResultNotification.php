<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeagueResultNotification extends Notification
{
    /**
     * @param  'promoted'|'demoted'  $direction
     */
    public function __construct(public string $direction, public string $tierName) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $promoted = $this->direction === 'promoted';

        return (new MailMessage)
            ->subject($promoted ? "You've been promoted to {$this->tierName}!" : "You've dropped to {$this->tierName}")
            ->view('emails.league-result', [
                'name' => $notifiable->full_name ?: 'there',
                'promoted' => $promoted,
                'tierName' => $this->tierName,
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/leaderboard',
            ]);
    }
}
