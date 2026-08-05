<?php

namespace App\Services;

use App\Enums\PlanKey;
use App\Models\FamilyGroup;
use App\Models\GemPurchase;
use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Models\UserGameState;
use App\Models\UserSubscription;
use App\Notifications\FamilyPlanCanceledNotification;
use App\Notifications\SubscriptionCanceledNotification;
use App\Notifications\SubscriptionConfirmedNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Checkout\Session;
use Stripe\Event;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\InvalidRequestException;
use Stripe\StripeClient;
use Stripe\Subscription;
use Stripe\Webhook;

class StripeService
{
    private StripeClient $client;

    public function __construct(private LessonProgressService $progress)
    {
        $this->client = new StripeClient(config('services.stripe.secret'));
    }

    public function createGemsCheckoutSession(
        User $user,
        string $packKey,
        int $gems,
        int $amountCents,
        string $successUrl,
        string $cancelUrl,
    ): Session {
        return $this->client->checkout->sessions->create([
            'mode' => 'payment',
            'customer_email' => $user->email,
            'client_reference_id' => (string) $user->id,
            'line_items' => [[
                'quantity' => 1,
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $amountCents,
                    'product_data' => [
                        'name' => "{$gems} Gems",
                        'description' => 'Languify gem pack',
                    ],
                ],
            ]],
            'success_url' => $successUrl,
            'cancel_url' => $cancelUrl,
            'metadata' => [
                'type' => 'gems',
                'user_id' => (string) $user->id,
                'pack_key' => $packKey,
                'gems' => (string) $gems,
            ],
        ]);
    }

    public function createSubscriptionCheckoutSession(
        User $user,
        string $planKey,
        int $amountCents,
        string $interval,
        string $successUrl,
        string $cancelUrl,
    ): Session {
        return $this->client->checkout->sessions->create([
            'mode' => 'subscription',
            'customer_email' => $user->email,
            'client_reference_id' => (string) $user->id,
            'line_items' => [[
                'quantity' => 1,
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $amountCents,
                    'recurring' => ['interval' => $interval],
                    'product_data' => [
                        'name' => "Languify {$planKey} Plan",
                    ],
                ],
            ]],
            'success_url' => $successUrl,
            'cancel_url' => $cancelUrl,
            'metadata' => [
                'type' => 'subscription',
                'user_id' => (string) $user->id,
                'plan_key' => $planKey,
            ],
        ]);
    }

    public function constructWebhookEvent(string $payload, string $signature): Event
    {
        return Webhook::constructEvent($payload, $signature, config('services.stripe.webhook_secret'));
    }

    public function retrieveCheckoutSession(string $sessionId): Session
    {
        return $this->client->checkout->sessions->retrieve($sessionId);
    }

    /**
     * Marks a gem purchase completed and credits gems, but only after
     * independently confirming payment with Stripe's API — never trusts a
     * client-supplied "I paid" claim. Used by both the webhook (the
     * reliable async path) and the checkout-return verification endpoint
     * (a synchronous fallback for local/dev environments where Stripe's
     * servers can't reach a webhook on localhost). Idempotent: replaying
     * either path for an already-completed purchase is a no-op.
     *
     * @return int|null the newly credited gem total, or null if there was nothing to credit
     */
    public function creditGemsPurchase(string $sessionId): ?int
    {
        return DB::transaction(function () use ($sessionId) {
            $purchase = GemPurchase::where('stripe_checkout_session_id', $sessionId)
                ->lockForUpdate()
                ->first();

            if (! $purchase || $purchase->status === 'completed') {
                return null;
            }

            $session = $this->retrieveCheckoutSession($sessionId);

            if ($session->payment_status !== 'paid') {
                return null;
            }

            $purchase->status = 'completed';
            $purchase->save();

            UserGameState::firstOrCreate(['user_id' => $purchase->user_id]);
            $state = UserGameState::where('user_id', $purchase->user_id)->lockForUpdate()->firstOrFail();

            $state->gems += $purchase->gems_credited;
            $state->save();

            return $state->gems;
        });
    }

    /**
     * Activates a subscription, but only after independently confirming
     * checkout completed with Stripe's API — never trusts a client-supplied
     * claim. Used by both the webhook (the reliable async path) and the
     * checkout-return verification endpoint (a synchronous fallback for
     * local/dev environments where Stripe's servers can't reach a webhook
     * on localhost). Idempotent via `updateOrCreate` on the Stripe
     * subscription id.
     *
     * @return array{planKey: string, status: string}|null the activated subscription's plan/status, or null if checkout isn't complete
     */
    public function activateSubscriptionFromSession(string $sessionId): ?array
    {
        $session = $this->retrieveCheckoutSession($sessionId);

        if ($session->status !== 'complete' || ($session->metadata->type ?? null) !== 'subscription') {
            return null;
        }

        $userId = $session->metadata->user_id ?? null;
        $planKey = $session->metadata->plan_key ?? null;

        if (! $userId || ! User::whereKey($userId)->exists()) {
            return null;
        }

        $plan = SubscriptionPlan::where('key', $planKey)->first();
        $interval = $plan->interval ?? 'month';

        return DB::transaction(function () use ($userId, $planKey, $session, $interval, $plan) {
            // Lock on the user row (always exists, unlike a subscription row
            // for a brand-new subscriber) so two near-simultaneous
            // activations for the same user — two tabs, or the webhook
            // racing the synchronous checkout-return verification — fully
            // serialize instead of both reading the same "which
            // subscriptions are active" snapshot and cancelling each other.
            User::whereKey($userId)->lockForUpdate()->first();

            // Subscriptions auto-renew by default now. This locally-computed
            // end is still the source of truth for access (see
            // User::activeSubscription) so the app keeps working even where a
            // Stripe webhook can't reach; renewals then push it forward, either
            // from the invoice.paid webhook or from the daily
            // subscriptions:sync reconcile.
            //
            // A learner who turned auto-renew off and then buys the same plan
            // again STACKS onto the remaining time (renewing early never
            // forfeits days); a fresh purchase or a plan switch starts from now.
            $existingEnd = UserSubscription::where('user_id', $userId)
                ->where('plan_key', $planKey)
                ->whereIn('status', ['active', 'trialing'])
                ->where('current_period_end', '>', now())
                ->max('current_period_end');

            $base = $existingEnd ? Carbon::parse($existingEnd) : now();
            $periodEnd = $interval === 'year' ? $base->copy()->addYear() : $base->copy()->addMonth();

            $subscription = UserSubscription::updateOrCreate(
                ['stripe_subscription_id' => $session->subscription],
                [
                    'user_id' => $userId,
                    'plan_key' => $planKey,
                    // The amount ACTUALLY charged for this payment (after any
                    // coupon), stamped per row so admin revenue sums real
                    // lifetime income across every purchase and renewal — see
                    // the add_amount_cents migration. Falls back to the catalog
                    // price if Stripe didn't report a total.
                    'amount_cents' => $session->amount_total ?? $plan?->amount_cents,
                    'stripe_customer_id' => $session->customer,
                    'status' => 'active',
                    'current_period_end' => $periodEnd,
                ],
            );

            $this->cancelOtherActiveSubscriptions($userId, $subscription->id, $session->subscription);

            // Auto-renew is left ON, which is Stripe's own default for a
            // subscription-mode checkout, so nothing has to be called here. The
            // learner turns it off from the app (see setAutoRenew), and that is
            // also what "cancel" does: cancel_at_period_end, keeping the access
            // they already paid for.

            // wasRecentlyCreated is only true on the INSERT branch of the
            // updateOrCreate above — guards against re-running this every time
            // the synchronous checkout-return endpoint re-verifies an
            // already-activated session (fires once per new subscription, and
            // once per plan switch since a switch buys a fresh Stripe sub id).
            if ($subscription->wasRecentlyCreated) {
                // Subscribing raises the heart cap (5 -> 100 for Monthly/
                // Yearly), but the cap alone doesn't refill the wallet — a
                // just-paid user would otherwise still sit at whatever count
                // they had (5 on a fresh account, a few more after some
                // passive regen). Top them up to the new cap so buying a plan
                // actually delivers the full stock of hearts the plan
                // advertises. Family (null cap = unlimited) needs no numeric
                // top-up — hearts already display as infinite for them.
                $freshUser = User::find($userId);
                $newMaxHearts = $freshUser ? $this->progress->effectiveMaxHearts($freshUser) : null;

                if ($freshUser && $newMaxHearts !== null) {
                    UserGameState::firstOrCreate(['user_id' => $userId]);
                    $gameState = UserGameState::where('user_id', $userId)->lockForUpdate()->first();
                    // max() so a plan switch never LOWERS an already-high
                    // count (can't happen with a flat 100 cap today, but keeps
                    // the top-up strictly additive if caps ever differ).
                    $gameState->hearts = max($gameState->hearts, $newMaxHearts);
                    $gameState->hearts_updated_at = now();
                    $gameState->save();
                }

                $planTitle = $plan->title ?? ucfirst((string) $planKey);
                // amount_total/currency come from the actual completed session
                // (what was really charged, e.g. after any coupon), not the
                // catalog price, which could in principle differ or change later.
                User::find($userId)?->notify(new SubscriptionConfirmedNotification(
                    $planTitle,
                    $session->amount_total,
                    $session->currency,
                    $plan->interval ?? null,
                    $periodEnd->toDateTimeString(),
                ));
            }

            return ['planKey' => $subscription->plan_key, 'status' => $subscription->status];
        });
    }

    /**
     * Switching plans buys a brand new Stripe subscription via a fresh
     * Checkout Session rather than updating the old one in place — so once
     * the new one activates, any other still-"active" row for this user is
     * a leftover from the previous plan. Left alone, Stripe keeps billing
     * both subscriptions indefinitely, and reads of "the" active
     * subscription become ambiguous between two rows (this is the plan
     * switching bug: different queries picked different rows depending on
     * their tiebreak — MAX(id) vs latest current_period_end — so the UI
     * could show a different plan than what game perks were computed from).
     */
    /**
     * Turns auto-renew on or off for the learner's own active plan.
     *
     * Turning it OFF is exactly the "cancel at period end" operation: Stripe
     * stops billing, but current_period_end is left untouched, so the learner
     * keeps every day they already paid for and access lapses naturally (see
     * User::activeSubscription). Turning it back ON resumes billing on the same
     * renewal date, provided that date has not passed yet.
     *
     * @return UserSubscription the refreshed local mirror
     */
    public function setAutoRenew(User $user, bool $enabled): UserSubscription
    {
        $subscription = $user->activeSubscription;

        abort_if(! $subscription, 422, 'You do not have an active subscription.');
        abort_if(
            ! $subscription->stripe_subscription_id,
            422,
            'This plan is not managed by our payment provider and cannot be changed here.',
        );
        // Cancelling is final. Auto-renew is a reversible preference, but once
        // the learner has actually cancelled, the only way back is to buy again,
        // so the toggle must not become a back door to undo it.
        abort_if(
            $subscription->canceled_at !== null,
            422,
            'This plan has been cancelled. Choose a plan to subscribe again.',
        );

        try {
            $this->client->subscriptions->update($subscription->stripe_subscription_id, [
                'cancel_at_period_end' => ! $enabled,
            ]);
        } catch (InvalidRequestException $e) {
            // The subscription is genuinely gone on Stripe's side. Mirror that
            // locally rather than leaving a row claiming it will renew.
            Log::warning('Stripe subscription missing while changing auto-renew', [
                'user_id' => $user->id,
                'stripe_subscription_id' => $subscription->stripe_subscription_id,
                'exception' => $e->getMessage(),
            ]);

            $subscription->forceFill(['cancel_at_period_end' => true])->save();

            abort(422, 'This subscription is no longer on file with our payment provider.');
        }

        // canceled_at is deliberately NOT touched here. It records a deliberate
        // cancellation, which is a different thing from simply switching
        // auto-renew off, and it is what makes cancelling one-way.
        $subscription->cancel_at_period_end = ! $enabled;
        $subscription->save();

        return $subscription;
    }

    /**
     * Ends the learner's plan IMMEDIATELY.
     *
     * Not "at the end of the paid period": the subscription is cancelled
     * outright at Stripe, and the local period end is pulled back to now so the
     * access gate (see User::activeSubscription) stops matching on the very next
     * request. Premium perks are gone the moment this returns.
     *
     * The learner forfeits whatever they had already paid for, which is why the
     * confirmation dialog has to say so plainly before this is called. Nothing
     * is refunded here; issue refunds from the Stripe dashboard if you choose to.
     */
    public function cancelSubscription(User $user): UserSubscription
    {
        $subscription = $user->activeSubscription;

        abort_if(! $subscription, 422, 'You do not have an active subscription.');
        abort_if(
            ! $subscription->stripe_subscription_id,
            422,
            'This plan is not managed by our payment provider and cannot be changed here.',
        );

        try {
            // cancel(), not cancel_at_period_end: billing and access both stop now.
            $this->client->subscriptions->cancel($subscription->stripe_subscription_id);
        } catch (InvalidRequestException $e) {
            // Already gone on Stripe's side. The local row still has to be closed
            // out, so this is not fatal.
            Log::warning('Stripe subscription already absent while cancelling', [
                'user_id' => $user->id,
                'stripe_subscription_id' => $subscription->stripe_subscription_id,
                'exception' => $e->getMessage(),
            ]);
        }

        $planTitle = SubscriptionPlan::where('key', $subscription->plan_key)->value('title')
            ?? ucfirst((string) $subscription->plan_key);

        $isFamilyOwner = $subscription->plan_key === PlanKey::Family->value
            && FamilyGroup::where('owner_id', $user->id)->exists();

        $subscription->forceFill([
            'status' => 'canceled',
            'cancel_at_period_end' => true,
            'canceled_at' => now(),
            // Pulling this back is what actually revokes access, since every
            // perk check reads it rather than the status column alone.
            'current_period_end' => now(),
        ])->save();

        // Sent AFTER the response, not during it. These notifications are not
        // queueable, so a plain notify() blocks the request on SMTP: the learner
        // taps "Yes, cancel" and the button sits there until the mail server
        // answers, which on a slow or unreachable host is seconds, or never.
        // The cancellation is already committed by this point, so the mail is
        // genuinely a side effect, and a mail failure must never undo it.
        dispatch(function () use ($user, $planTitle, $isFamilyOwner) {
            try {
                $user->notify(new SubscriptionCanceledNotification($planTitle, $isFamilyOwner));
            } catch (\Throwable $e) {
                Log::error('Failed to send subscription cancellation email', [
                    'user_id' => $user->id,
                    'exception' => $e->getMessage(),
                ]);
            }

            // A cancelled Family plan drops every member back to free at the same
            // instant, so they are told too rather than just losing their perks.
            if ($isFamilyOwner) {
                $group = $user->familyGroupOwned()->with('members.user')->first();

                foreach ($group?->members ?? [] as $member) {
                    try {
                        $member->user?->notify(
                            new FamilyPlanCanceledNotification($user->full_name ?: 'The plan owner'),
                        );
                    } catch (\Throwable) {
                        // Best-effort per member.
                    }
                }
            }
        })->afterResponse();

        return $subscription;
    }

    /**
     * Mirrors a Stripe subscription onto its local row: status, the auto-renew
     * flag, and the period end. Shared by the renewal webhooks and the daily
     * subscriptions:sync reconcile, so both paths agree on the rules.
     *
     * The period end only ever moves FORWARD. A learner who renewed early under
     * the old manual model can have a local end date past Stripe's own single
     * period end, and blindly copying Stripe's value back would silently erase
     * those paid-for days.
     *
     * @return bool whether anything actually changed
     */
    public function syncSubscriptionFromStripe(UserSubscription $record): bool
    {
        if (! $record->stripe_subscription_id) {
            return false;
        }

        try {
            $remote = $this->client->subscriptions->retrieve($record->stripe_subscription_id);
        } catch (InvalidRequestException) {
            // Gone on Stripe's side. Stop claiming it will renew, but leave the
            // period end alone so paid-for access is not cut short.
            if (! $record->cancel_at_period_end) {
                $record->forceFill(['cancel_at_period_end' => true])->save();

                return true;
            }

            return false;
        } catch (ApiErrorException $e) {
            // Unknown remote state (rate limit, outage, network). Change
            // nothing and let the next pass retry.
            Log::error('Failed to read subscription from Stripe during sync', [
                'user_subscription_id' => $record->id,
                'exception' => $e->getMessage(),
            ]);

            return false;
        }

        return $this->applyRemoteSubscription($record, $remote);
    }

    /**
     * Writes an already-fetched Stripe subscription object onto its local row.
     *
     * @param  Subscription  $remote
     */
    public function applyRemoteSubscription(UserSubscription $record, $remote): bool
    {
        $periodEnd = self::remotePeriodEnd($remote);

        $record->status = $remote->status ?? $record->status;
        $record->cancel_at_period_end = (bool) ($remote->cancel_at_period_end ?? false);

        // canceled_at records the learner's own decision and is never derived
        // from Stripe. Letting a sync clear it would quietly un-cancel a plan
        // the learner deliberately ended.

        if ($periodEnd) {
            $remoteEnd = Carbon::createFromTimestampUTC($periodEnd);

            if (! $record->current_period_end || $remoteEnd->gt($record->current_period_end)) {
                $record->current_period_end = $remoteEnd;
            }
        }

        if (! $record->isDirty()) {
            return false;
        }

        $record->save();

        return true;
    }

    /**
     * The period end on a Stripe subscription. Recent API versions moved this
     * off the subscription and onto each subscription item, so read both and
     * take whichever is present.
     */
    private static function remotePeriodEnd($remote): ?int
    {
        $end = $remote->current_period_end ?? null;

        if ($end) {
            return (int) $end;
        }

        foreach ($remote->items->data ?? [] as $item) {
            if (! empty($item->current_period_end)) {
                return (int) $item->current_period_end;
            }
        }

        return null;
    }

    /**
     * Best-effort cancellation of every live Stripe subscription a user has,
     * so a deleted account is never billed again. The local rows are about to
     * be removed by the user-delete cascade, so this only needs to reach out
     * to Stripe; a failure is logged but never blocks the deletion.
     */
    public function cancelActiveSubscriptions(User $user): void
    {
        $subs = UserSubscription::where('user_id', $user->id)
            ->whereIn('status', ['active', 'trialing', 'past_due'])
            ->whereNotNull('stripe_subscription_id')
            ->get();

        foreach ($subs as $sub) {
            try {
                $this->client->subscriptions->cancel($sub->stripe_subscription_id);
            } catch (ApiErrorException $e) {
                Log::error('Failed to cancel Stripe subscription on account deletion', [
                    'user_id' => $user->id,
                    'stripe_subscription_id' => $sub->stripe_subscription_id,
                    'exception' => $e->getMessage(),
                ]);
            }
        }
    }

    private function cancelOtherActiveSubscriptions(string $userId, int $keepId, string $keepStripeSubscriptionId): void
    {
        $stale = UserSubscription::where('user_id', $userId)
            ->whereIn('status', ['active', 'trialing'])
            ->where('id', '!=', $keepId)
            ->get();

        foreach ($stale as $old) {
            if ($old->stripe_subscription_id && $old->stripe_subscription_id !== $keepStripeSubscriptionId) {
                try {
                    $this->client->subscriptions->cancel($old->stripe_subscription_id);
                } catch (InvalidRequestException) {
                    // Genuinely gone on Stripe's side already (e.g. "No such
                    // subscription", already canceled) — safe to also mark
                    // it canceled locally below.
                } catch (ApiErrorException $e) {
                    // Anything else — rate limit, auth failure, network
                    // blip, Stripe outage — means we don't actually know the
                    // remote state. Do NOT mark this canceled locally: that
                    // would silently write off a subscription that might
                    // still be live and billing, with no record of it
                    // anywhere. Leave it "active" and let the next
                    // activation/webhook pass retry the cleanup.
                    Log::error('Failed to cancel stale Stripe subscription during plan switch', [
                        'user_id' => $old->user_id,
                        'stripe_subscription_id' => $old->stripe_subscription_id,
                        'exception' => $e->getMessage(),
                    ]);

                    continue;
                }
            }

            $old->status = 'canceled';
            $old->save();
        }
    }
}
