<?php

namespace App\Http\Controllers\Api;

use App\Enums\PlanKey;
use App\Http\Controllers\Controller;
use App\Models\UserSubscription;
use App\Services\StripeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class SubscriptionController extends Controller
{
    /**
     * How close to the end date the "renew now" prompt appears, for a learner
     * who has switched auto-renew off. Short enough to be a real nudge, long
     * enough that a weekly user still sees it before they lapse.
     */
    private const RENEWAL_PROMPT_DAYS = 5;

    public function __construct(private StripeService $stripe) {}

    #[OA\Get(
        path: '/api/subscription/status',
        summary: 'Get the user\'s current subscription status',
        tags: ['Subscription'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(
            response: 200,
            description: 'Current subscription, or null if none active',
            content: new OA\JsonContent(properties: [
                new OA\Property(property: 'subscription', nullable: true, properties: [
                    new OA\Property(property: 'planKey', type: 'string', example: 'monthly'),
                    new OA\Property(property: 'status', type: 'string', example: 'active'),
                    new OA\Property(property: 'currentPeriodEnd', type: 'string', format: 'date-time', nullable: true),
                    new OA\Property(property: 'isFamilyMember', type: 'boolean'),
                    new OA\Property(property: 'familyOwnerName', type: 'string', nullable: true),
                ], type: 'object'),
            ]),
        )],
    )]
    public function status(Request $request): JsonResponse
    {
        $user = $request->user();

        // activeSubscription() already excludes expired plans (its
        // current_period_end gate), so this is the user's OWN still-valid plan
        // or null. currentPeriodEnd doubles as the "expires on" date the UI shows.
        $subscription = $user->activeSubscription;

        if ($subscription) {
            $daysRemaining = $subscription->daysRemaining();

            return response()->json([
                'subscription' => [
                    'planKey' => $subscription->plan_key,
                    // 'stripe' or 'apple'. An Apple-billed plan is managed in
                    // the App Store, so the client swaps the Stripe controls
                    // for a link there.
                    'provider' => $subscription->provider ?? 'stripe',
                    'status' => $subscription->status,
                    'currentPeriodEnd' => $subscription->current_period_end,
                    'isFamilyMember' => false,
                    // Everything below drives the manage-plan card: the toggle
                    // state, the "ends on" copy, and whether to nudge for a
                    // manual renewal before access lapses.
                    'autoRenew' => $subscription->autoRenews(),
                    'cancelAtPeriodEnd' => (bool) $subscription->cancel_at_period_end,
                    'canceledAt' => $subscription->canceled_at,
                    // Deliberately cancelled, as opposed to merely having
                    // auto-renew switched off. This one is final: the client
                    // hides every management control and offers the plans again.
                    'canceled' => $subscription->canceled_at !== null,
                    'daysRemaining' => $daysRemaining,
                    'renewalPromptDue' => $subscription->cancel_at_period_end
                        && $daysRemaining !== null
                        && $daysRemaining <= self::RENEWAL_PROMPT_DAYS,
                    'renewalPromptDays' => self::RENEWAL_PROMPT_DAYS,
                    // A plan bought outside Stripe (or one whose Stripe record
                    // has gone) can't be toggled, so the UI hides the controls.
                    'manageable' => (bool) $subscription->stripe_subscription_id,
                ],
                'lapsed' => null,
            ]);
        }

        // No plan of their own — check whether they're riding along on someone
        // else's still-active Family plan (see FamilyService). If the owner's
        // plan has lapsed, activeSubscription is null there too, so the member
        // correctly falls through to free.
        $membership = $user->familyMembership()->with('familyGroup.owner')->first();
        $ownerSubscription = $membership?->familyGroup->owner->activeSubscription;

        if ($ownerSubscription && $ownerSubscription->plan_key === PlanKey::Family->value) {
            return response()->json([
                'subscription' => [
                    'planKey' => PlanKey::Family->value,
                    'status' => $ownerSubscription->status,
                    'currentPeriodEnd' => $ownerSubscription->current_period_end,
                    'isFamilyMember' => true,
                    'familyOwnerName' => $membership->familyGroup->owner->full_name,
                    'autoRenew' => $ownerSubscription->autoRenews(),
                    'cancelAtPeriodEnd' => (bool) $ownerSubscription->cancel_at_period_end,
                    'canceledAt' => $ownerSubscription->canceled_at,
                    'daysRemaining' => $ownerSubscription->daysRemaining(),
                    // A member rides on someone else's plan, so they can see
                    // its state but must never be able to change it.
                    'renewalPromptDue' => false,
                    'renewalPromptDays' => self::RENEWAL_PROMPT_DAYS,
                    'manageable' => false,
                ],
                'lapsed' => null,
            ]);
        }

        // No active access. Surface a lapsed plan (if any) so the UI can show a
        // "renew" button — and, for a family owner, a banner noting their
        // members lost access until they renew.
        //
        // A plan the learner CANCELLED is deliberately not surfaced. They chose
        // to leave and were already told so in the cancellation dialog; telling
        // them again that it "expired" and nudging them to renew reads as
        // nagging, and "expired" is the wrong word for something they ended on
        // purpose. They simply see the plan list, like any other free account.
        $lastOwn = UserSubscription::where('user_id', $user->id)
            ->whereNull('canceled_at')
            ->orderByDesc('id')
            ->first();

        $lapsed = null;

        if ($lastOwn) {
            $ownedGroup = $user->familyGroupOwned()->withCount('members')->first();

            $lapsed = [
                'planKey' => $lastOwn->plan_key,
                'endedAt' => $lastOwn->current_period_end,
                'wasFamilyOwner' => $lastOwn->plan_key === PlanKey::Family->value && $ownedGroup !== null,
                'affectedMembers' => $ownedGroup?->members_count ?? 0,
            ];
        }

        return response()->json([
            'subscription' => null,
            'lapsed' => $lapsed,
        ]);
    }

    #[OA\Post(
        path: '/api/subscription/auto-renew',
        summary: 'Turn auto-renew on or off for the current plan',
        description: 'Switching it off is the same operation as cancelling at period end: Stripe stops billing, '
            .'but the period the learner already paid for is untouched, so access lapses naturally on the end '
            .'date. Switching it back on before that date resumes billing with no break in service. Refused once '
            .'the plan has been cancelled outright, which is deliberately one-way.',
        tags: ['Subscription'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['enabled'],
            properties: [new OA\Property(property: 'enabled', type: 'boolean', example: false)],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Auto-renew updated'),
            new OA\Response(response: 422, description: 'No active subscription, or it is not managed by Stripe'),
        ],
    )]
    public function autoRenew(Request $request): JsonResponse
    {
        $data = $request->validate([
            'enabled' => ['required', 'boolean'],
        ]);

        $subscription = $this->stripe->setAutoRenew($request->user(), $data['enabled']);

        return $this->manageResponse(
            $subscription,
            $data['enabled'] ? 'Auto-renew is back on.' : 'Auto-renew is off.',
        );
    }

    #[OA\Post(
        path: '/api/subscription/cancel',
        summary: 'Cancel the current plan at the end of the paid period',
        description: 'FINAL. The learner keeps every premium perk until currentPeriodEnd, then drops to the free '
            .'plan. Unlike switching auto-renew off, this cannot be undone: the subscription is stamped as '
            .'cancelled, the auto-renew endpoint refuses to touch it afterwards, and coming back means buying a '
            .'new plan through checkout. Also sends a confirmation email, once.',
        tags: ['Subscription'],
        security: [['cookieAuth' => []]],
        responses: [
            new OA\Response(response: 200, description: 'Cancellation confirmed, effective at the period end'),
            new OA\Response(response: 422, description: 'No active subscription, or it is already cancelled'),
        ],
    )]
    public function cancel(Request $request): JsonResponse
    {
        $subscription = $this->stripe->cancelSubscription($request->user());

        return $this->manageResponse($subscription, 'Your subscription has been cancelled.');
    }

    /**
     * The shape every management action returns, so the client can update the
     * manage-plan card straight from the response without a second round trip.
     */
    private function manageResponse(UserSubscription $subscription, string $message): JsonResponse
    {
        $daysRemaining = $subscription->daysRemaining();

        return response()->json([
            'message' => $message,
            'subscription' => [
                'planKey' => $subscription->plan_key,
                'status' => $subscription->status,
                'currentPeriodEnd' => $subscription->current_period_end,
                'autoRenew' => $subscription->autoRenews(),
                'cancelAtPeriodEnd' => (bool) $subscription->cancel_at_period_end,
                'canceledAt' => $subscription->canceled_at,
                'canceled' => $subscription->canceled_at !== null,
                'daysRemaining' => $daysRemaining,
                'renewalPromptDue' => $subscription->cancel_at_period_end
                    && $daysRemaining !== null
                    && $daysRemaining <= self::RENEWAL_PROMPT_DAYS,
                'renewalPromptDays' => self::RENEWAL_PROMPT_DAYS,
                'manageable' => (bool) $subscription->stripe_subscription_id,
                'isFamilyMember' => false,
            ],
        ]);
    }
}
