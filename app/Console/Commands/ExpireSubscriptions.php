<?php

namespace App\Console\Commands;

use App\Enums\PlanKey;
use App\Models\UserSubscription;
use App\Notifications\FamilyPlanCanceledNotification;
use App\Notifications\SubscriptionExpiredNotification;
use App\Models\SubscriptionPlan;
use Illuminate\Console\Command;

/**
 * Safety-net for the manual-renewal model. Access is ALREADY gated live off
 * current_period_end (see User::activeSubscription), so a lapsed plan stops
 * granting perks the instant it passes its end date whether or not this runs.
 *
 * This just flips the stored status to 'expired' for lapsed rows, so the admin
 * panel and the subscription-status endpoint reflect reality (and the learner
 * sees a "renew" prompt rather than a phantom "active" plan) even if a Stripe
 * webhook was missed. Scheduled daily in routes/console.php; --force/no-arg
 * both simply re-run it (it's idempotent).
 */
class ExpireSubscriptions extends Command
{
    protected $signature = 'subscriptions:expire';

    protected $description = 'Mark subscriptions past their period end as expired';

    public function handle(): int
    {
        // Fetch (not bulk-update) so each newly-lapsed plan can trigger its
        // owner's "your plan ended" email, and — for a Family plan — a heads-up
        // to every member who just reverted to free. Only rows crossing their
        // end are selected, and they're flipped to 'expired' immediately, so a
        // daily re-run never re-notifies the same lapse.
        $lapsed = UserSubscription::whereIn('status', ['active', 'trialing'])
            ->whereNotNull('current_period_end')
            ->where('current_period_end', '<=', now())
            ->with('user')
            ->get();

        $planTitles = SubscriptionPlan::pluck('title', 'key');

        foreach ($lapsed as $subscription) {
            $subscription->update(['status' => 'expired']);

            $owner = $subscription->user;
            if (! $owner) {
                continue;
            }

            $planTitle = $planTitles[$subscription->plan_key] ?? ucfirst((string) $subscription->plan_key);

            try {
                $owner->notify(new SubscriptionExpiredNotification($planTitle, (string) $subscription->plan_key));
            } catch (\Throwable) {
                // Best-effort — a mail failure must not abort the sweep.
            }

            // A lapsed Family plan drops every member back to free (their access
            // is derived live from the owner's plan), so let them know too.
            if ($subscription->plan_key === PlanKey::Family->value) {
                $group = $owner->familyGroupOwned()->with('members.user')->first();

                foreach ($group?->members ?? [] as $member) {
                    try {
                        $member->user?->notify(new FamilyPlanCanceledNotification($owner->full_name ?: 'The plan owner'));
                    } catch (\Throwable) {
                        // Best-effort per member.
                    }
                }
            }
        }

        $this->info("Marked {$lapsed->count()} lapsed subscription(s) as expired.");

        return self::SUCCESS;
    }
}
