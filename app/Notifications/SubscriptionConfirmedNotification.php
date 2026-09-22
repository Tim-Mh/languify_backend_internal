<?php

namespace App\Notifications;

use App\Enums\NotificationCategory;
use App\Notifications\Messages\ExpoMessage;
use App\Services\LessonProgressService;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

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
        public ?string $planKey = null,
    ) {}

    /**
     * How to describe this plan's hearts in prose.
     *
     * Read from LessonProgressService rather than written out here, because
     * only Family is uncapped: Monthly and Yearly get a raised cap, and this
     * email used to tell all three of them they had unlimited hearts.
     *
     * A null planKey (an older queued job serialised before this argument
     * existed) falls back to naming no number at all, which is vague but
     * never wrong.
     */
    private function heartsPerk(): string
    {
        if ($this->planKey === null) {
            return 'more hearts';
        }

        $max = LessonProgressService::maxHeartsForPlan($this->planKey);

        return $max === null ? 'unlimited hearts' : "up to {$max} hearts";
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'expo'];
    }

    public function toExpo(object $notifiable): ExpoMessage
    {
        // Names the actual perks rather than claiming content was unlocked.
        // Every lesson and every language is free for everyone, so "everything
        // is unlocked" told subscribers they had bought something they already
        // had, and left the things they DID buy unmentioned.
        return ExpoMessage::make(
            NotificationCategory::Billing,
            "Your {$this->planTitle} plan is active",
            "No ads, {$this->heartsPerk()}, bonus gems and streak freezes.",
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
                    ? Carbon::parse($this->expiresAt)->format('F j, Y')
                    : null,
                'heartsPerk' => $this->heartsPerk(),
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
