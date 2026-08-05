<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriptionConfirmedNotification extends Notification
{
    /**
     * @param  int|null  $amountCents  the amount actually charged (may differ
     *                                 from the catalog price, e.g. a coupon)
     */
    public function __construct(
        public string $planTitle,
        public ?int $amountCents = null,
        public ?string $currency = null,
        public ?string $interval = null,
        public ?string $expiresAt = null,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        return ExpoMessage::make(
            NotificationCategory::Billing,
            "Your {$this->planTitle} plan is active",
            'Welcome aboard — everything is unlocked.',
        )->deepLink('/shop');
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Your Languify {$this->planTitle} plan is confirmed")
            ->view('emails.subscription-confirmed', [
                'name' => $notifiable->full_name ?: 'there',
                'planTitle' => $this->planTitle,
                'amountFormatted' => $this->formatAmount(),
                'interval' => $this->interval,
                'expiresFormatted' => $this->expiresAt
                    ? \Illuminate\Support\Carbon::parse($this->expiresAt)->format('F j, Y')
                    : null,
                'appUrl' => rtrim(config('app.frontend_url'), '/').'/dashboard',
            ]);
    }

    private function formatAmount(): ?string
    {
        if ($this->amountCents === null) {
            return null;
        }

        $symbol = match (strtolower($this->currency ?? 'usd')) {
            'usd' => '$',
            'eur' => '€',
            'gbp' => '£',
            default => strtoupper($this->currency ?? '').' ',
        };

        $amount = $this->amountCents / 100;
        $decimals = $amount === floor($amount) ? 0 : 2;

        return $symbol.number_format($amount, $decimals);
    }
}
