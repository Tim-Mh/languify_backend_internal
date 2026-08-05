<?php

namespace App\Console\Commands;

use App\Models\UserSubscription;
use App\Services\StripeService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

/**
 * Reconciles every live subscription against Stripe.
 *
 * Auto-renew depends on learning that a recurring charge succeeded, which
 * normally arrives as an invoice.paid webhook. Webhooks are not guaranteed
 * though: a delivery can be missed, the endpoint can be misconfigured, or the
 * signing secret can be absent (in which case every delivery is rejected before
 * it is even read). Any of those would leave a learner charged by Stripe but
 * never granted the extra time locally, which is the worst possible failure.
 *
 * So this asks Stripe directly, once a day, and pulls the authoritative period
 * end, status and auto-renew flag onto each row. It is deliberately the same
 * write path the webhook uses (StripeService::applyRemoteSubscription), so the
 * two can never disagree, and it is safe to run as often as you like.
 *
 * Runs BEFORE subscriptions:expire in the schedule, so a plan that renewed
 * overnight is extended before the expiry sweep looks at it.
 */
class SyncSubscriptions extends Command
{
    protected $signature = 'subscriptions:sync {--all : Include rows already marked expired or canceled}';

    protected $description = 'Reconcile local subscriptions with Stripe (renewals, cancellations, period ends)';

    public function handle(StripeService $stripe): int
    {
        $query = UserSubscription::query()->whereNotNull('stripe_subscription_id');

        if (! $this->option('all')) {
            // Rows that could still change: currently valid, or recently lapsed
            // (a renewal charge can land slightly after the period end, e.g.
            // Stripe retrying a card).
            $query->where(function ($q) {
                $q->whereIn('status', ['active', 'trialing', 'past_due'])
                    ->orWhere('current_period_end', '>=', now()->subDays(3));
            });
        }

        $checked = 0;
        $changed = 0;
        $failed = 0;

        $query->chunkById(100, function ($subscriptions) use ($stripe, &$checked, &$changed, &$failed) {
            foreach ($subscriptions as $subscription) {
                $checked++;

                try {
                    if ($stripe->syncSubscriptionFromStripe($subscription)) {
                        $changed++;
                    }
                } catch (\Throwable $e) {
                    // One unreachable subscription must never abort the sweep
                    // for everyone else.
                    $failed++;
                    Log::error('Subscription sync failed', [
                        'user_subscription_id' => $subscription->id,
                        'exception' => $e->getMessage(),
                    ]);
                }
            }
        });

        $this->info("Checked {$checked} subscription(s): {$changed} updated, {$failed} failed.");

        return self::SUCCESS;
    }
}
