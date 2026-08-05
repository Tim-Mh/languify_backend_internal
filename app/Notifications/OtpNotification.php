<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Deliberately NOT ShouldQueue — OTP delivery is latency-sensitive (the user
 * is actively waiting to type the code in), and queued mail on this app's
 * QUEUE_CONNECTION=database setup would wait for the next cron-driven
 * `queue:work` tick. Sent synchronously instead, same as PasswordResetNotification.
 */
class OtpNotification extends Notification
{
    public function __construct(public string $otp) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your Languify verification code')
            ->view('emails.otp', [
                'name' => $notifiable->full_name ?: 'there',
                'otp' => $this->otp,
                'expiresMinutes' => 10,
            ]);
    }
}
