<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id', 'plan_key', 'amount_cents', 'stripe_customer_id', 'stripe_subscription_id',
    'status', 'current_period_end', 'cancel_at_period_end', 'canceled_at',
])]
class UserSubscription extends Model
{
    protected function casts(): array
    {
        return [
            'current_period_end' => 'datetime',
            'canceled_at' => 'datetime',
            'cancel_at_period_end' => 'boolean',
        ];
    }

    public function isActive(): bool
    {
        return in_array($this->status, ['active', 'trialing'], true);
    }

    /** Will Stripe bill again when the current period ends? */
    public function autoRenews(): bool
    {
        return $this->isActive() && ! $this->cancel_at_period_end;
    }

    /**
     * Whole days left before access lapses. Null when there is no end date on
     * file (a legacy row), and 0 once the end date has passed.
     */
    public function daysRemaining(): ?int
    {
        if (! $this->current_period_end) {
            return null;
        }

        return max(0, (int) ceil(now()->diffInDays($this->current_period_end, false)));
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
