<?php

namespace App\Http\Controllers\Api;

use App\Enums\PlanKey;
use App\Http\Controllers\Controller;
use App\Models\FamilyGroup;
use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Models\UserSubscription;
use App\Notifications\FamilyPlanCanceledNotification;
use App\Notifications\PaymentFailedNotification;
use App\Notifications\SubscriptionCanceledNotification;
use App\Services\StripeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use OpenApi\Attributes as OA;
use Stripe\Exception\SignatureVerificationException;
use UnexpectedValueException;

class StripeWebhookController extends Controller
{
    public function __construct(private StripeService $stripe) {}

    #[OA\Post(
        path: '/api/stripe/webhook',
        summary: 'Stripe event receiver (called by Stripe, not the frontend)',
        description: 'Verifies the Stripe-Signature header against STRIPE_WEBHOOK_SECRET. Handles '
            .'checkout.session.completed (credits gems / activates subscriptions), '
            .'customer.subscription.updated/deleted, and invoice.payment_failed.',
        tags: ['Stripe Webhook'],
        requestBody: new OA\RequestBody(required: true, description: 'Raw Stripe event payload', content: new OA\JsonContent),
        responses: [
            new OA\Response(response: 200, description: 'Event processed'),
            new OA\Response(response: 400, description: 'Invalid or unverifiable signature'),
        ],
    )]
    public function handle(Request $request): JsonResponse
    {
        try {
            $event = $this->stripe->constructWebhookEvent(
                $request->getContent(),
                $request->header('Stripe-Signature', ''),
            );
        } catch (UnexpectedValueException|SignatureVerificationException $e) {
            Log::warning('Stripe webhook signature verification failed', ['error' => $e->getMessage()]);

            return response()->json(['message' => 'Invalid signature.'], 400);
        }

        match ($event->type) {
            'checkout.session.completed' => $this->handleCheckoutCompleted($event->data->object),
            'customer.subscription.updated', 'customer.subscription.deleted' => $this->handleSubscriptionUpdated($event->data->object),
            // A renewal charge succeeding is what actually extends access under
            // auto-renew, so this is the most important event of the lot.
            'invoice.paid', 'invoice.payment_succeeded' => $this->handleInvoicePaid($event->data->object),
            'invoice.payment_failed' => $this->handlePaymentFailed($event->data->object),
            default => null,
        };

        return response()->json(['received' => true]);
    }

    private function handleCheckoutCompleted($session): void
    {
        $type = $session->metadata->type ?? null;

        if ($type === 'gems') {
            $this->stripe->creditGemsPurchase($session->id);
        } elseif ($type === 'subscription') {
            $this->stripe->activateSubscriptionFromSession($session->id);
        }
    }

    private function handleSubscriptionUpdated($subscription): void
    {
        DB::transaction(function () use ($subscription) {
            // Locked so a concurrent redelivery of the same (or a
            // near-simultaneous different) event for this subscription can't
            // both read the pre-update status and both conclude "this just
            // transitioned to canceled" — which would double-notify the
            // owner and every family member riding on the plan.
            $record = UserSubscription::where('stripe_subscription_id', $subscription->id)
                ->lockForUpdate()
                ->first();

            if (! $record) {
                return;
            }

            $wasAlreadyCanceled = $record->status === 'canceled';

            // Mirrors status, the auto-renew flag and the period end in one
            // place, shared with the daily reconcile so both agree on the rules
            // (notably: the period end only ever moves forward, so stacked days
            // from an early renewal are never erased).
            $this->stripe->applyRemoteSubscription($record, $subscription);

            if (! $wasAlreadyCanceled && $record->status === 'canceled') {
                // A plan switch buys a brand-new subscription and cancels the
                // old one (see StripeService::cancelOtherActiveSubscriptions)
                // — that cancellation can reach here either via our own call
                // or via Stripe's own webhook for it, and either way it's not
                // a real loss of access if a replacement is already on file.
                // Without this check, a normal successful switch could fire
                // a false "your plan was canceled" email (and, for a Family
                // plan, wrongly notify every member too).
                $hasReplacementSubscription = UserSubscription::where('user_id', $record->user_id)
                    ->whereIn('status', ['active', 'trialing'])
                    ->where('id', '!=', $record->id)
                    ->exists();

                if (! $hasReplacementSubscription) {
                    $this->notifySubscriptionCanceled($record);
                }
            }
        });
    }

    /**
     * A renewal (or the first) invoice was paid. Re-reads the subscription from
     * Stripe rather than trusting the invoice payload, so the new period end,
     * the status and the auto-renew flag all land from one authoritative read.
     */
    private function handleInvoicePaid($invoice): void
    {
        $subscriptionId = self::subscriptionIdFromInvoice($invoice);

        if (! $subscriptionId) {
            return;
        }

        DB::transaction(function () use ($subscriptionId) {
            $record = UserSubscription::where('stripe_subscription_id', $subscriptionId)
                ->lockForUpdate()
                ->first();

            if (! $record) {
                return;
            }

            $this->stripe->syncSubscriptionFromStripe($record);
        });
    }

    /**
     * The subscription id an invoice belongs to. Stripe moved this off the
     * invoice root and onto parent.subscription_details in recent API versions,
     * so read every known location rather than pinning to one shape.
     */
    private static function subscriptionIdFromInvoice($invoice): ?string
    {
        $candidates = [
            $invoice->subscription ?? null,
            $invoice->parent->subscription_details->subscription ?? null,
            $invoice->lines->data[0]->subscription ?? null,
            $invoice->lines->data[0]->parent->subscription_item_details->subscription ?? null,
        ];

        foreach ($candidates as $candidate) {
            if (is_string($candidate) && $candidate !== '') {
                return $candidate;
            }

            // Expanded objects carry the id on the object itself.
            if (is_object($candidate) && ! empty($candidate->id)) {
                return (string) $candidate->id;
            }
        }

        return null;
    }

    private function handlePaymentFailed($invoice): void
    {
        $subscriptionId = self::subscriptionIdFromInvoice($invoice);

        if (! $subscriptionId) {
            return;
        }

        DB::transaction(function () use ($subscriptionId) {
            $record = UserSubscription::where('stripe_subscription_id', $subscriptionId)
                ->lockForUpdate()
                ->first();

            if (! $record) {
                return;
            }

            $wasAlreadyPastDue = $record->status === 'past_due';

            $record->update(['status' => 'past_due']);

            if ($wasAlreadyPastDue) {
                // Stripe doesn't guarantee exactly-once webhook delivery and
                // retries a failed invoice several times before eventually
                // canceling the subscription — without this guard, every
                // redelivery of the same underlying failure would re-send
                // the "your payment failed" email.
                return;
            }

            $user = User::find($record->user_id);

            if ($user) {
                $planTitle = SubscriptionPlan::where('key', $record->plan_key)->value('title') ?? ucfirst($record->plan_key);
                $isFamilyOwner = $record->plan_key === PlanKey::Family->value && FamilyGroup::where('owner_id', $user->id)->exists();
                $user->notify(new PaymentFailedNotification($planTitle, $isFamilyOwner));
            }
        });
    }

    /**
     * Notifies the owner their own plan ended, and — if it was a Family
     * plan with members riding on it — notifies every member separately,
     * since their access just disappeared too and they'd otherwise have no
     * way to know why.
     */
    private function notifySubscriptionCanceled(UserSubscription $record): void
    {
        $user = User::find($record->user_id);

        if (! $user) {
            return;
        }

        $planTitle = SubscriptionPlan::where('key', $record->plan_key)->value('title') ?? ucfirst($record->plan_key);

        $group = $record->plan_key === PlanKey::Family->value
            ? FamilyGroup::where('owner_id', $user->id)->with('members.user')->first()
            : null;

        $user->notify(new SubscriptionCanceledNotification($planTitle, (bool) $group));

        if ($group) {
            foreach ($group->members as $member) {
                $member->user?->notify(new FamilyPlanCanceledNotification($user->full_name ?: $user->email));
            }
        }
    }
}
