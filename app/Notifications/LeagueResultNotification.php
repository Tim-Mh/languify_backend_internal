<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
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
        return ['mail', 'expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        $promoted = $this->direction === 'promoted';

        return ExpoMessage::make(
            NotificationCategory::League,
            $promoted ? "Promoted to {$this->tierName}!" : "You dropped to {$this->tierName}",
            $promoted
                ? 'A new week, a tougher league. Defend your spot.'
                : 'A new week starts now. Climb back up.',
        )->deepLink('/leaderboard');
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
