<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GemPack;
use App\Models\GemPurchase;
use App\Models\HeartRefillTier;
use App\Models\SubscriptionPlan;
use App\Models\UserGameState;
use App\Models\UserSubscription;
use App\Services\LessonProgressService;
use App\Services\StripeService;
use App\Support\GemLedger;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenApi\Attributes as OA;

class ShopController extends Controller
{
    public function __construct(
        private StripeService $stripe,
        private LessonProgressService $progress,
    ) {}

    #[OA\Get(
        path: '/api/shop/catalog',
        summary: 'Get the shop catalog',
        description: 'Gem packs, gem-priced heart refill tiers, and Stripe subscription plans.',
        tags: ['Shop'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Catalog')],
    )]
    public function catalog(): JsonResponse
    {
        return response()->json([
            'gemPacks' => GemPack::where('is_active', true)->orderBy('order_number')->get()
                ->map(fn (GemPack $pack) => [
                    'key' => $pack->key,
                    'gems' => $pack->gems,
                    'title' => $pack->title,
                    'description' => $pack->description,
                    'amountCents' => $pack->amount_cents,
                    'badgeLabel' => $pack->badge_label,
                ]),
            'heartRefillTiers' => HeartRefillTier::where('is_active', true)->orderBy('order_number')->get()
                ->map(fn (HeartRefillTier $tier) => [
                    'key' => $tier->key,
                    'title' => $tier->title,
                    'subtitle' => $tier->subtitle,
                    'hearts' => $tier->hearts,
                    'priceGems' => $tier->price_gems,
                    'badgeLabel' => $tier->badge_label,
                ]),
            'subscriptionPlans' => SubscriptionPlan::where('is_active', true)->orderBy('order_number')->get()
                ->map(fn (SubscriptionPlan $plan) => [
                    'key' => $plan->key,
                    'title' => $plan->title,
                    'description' => $plan->description,
                    'features' => $plan->features,
                    'amountCents' => $plan->amount_cents,
                    'interval' => $plan->interval,
                    'badgeLabel' => $plan->badge_label,
                    'savingsLabel' => $plan->savings_label,
                ]),
        ]);
    }

    #[OA\Post(
        path: '/api/shop/gems/checkout',
        summary: 'Start a Stripe Checkout Session to buy a gem pack',
        description: 'Real money via Stripe test/sandbox mode. Gems are credited by the /api/stripe/webhook handler once payment completes — not by this endpoint.',
        tags: ['Shop'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['packKey', 'successUrl', 'cancelUrl'],
            properties: [
                new OA\Property(property: 'packKey', type: 'string', enum: ['basic', 'adventure', 'vault'], example: 'basic'),
                new OA\Property(property: 'successUrl', type: 'string', format: 'url'),
                new OA\Property(property: 'cancelUrl', type: 'string', format: 'url'),
            ],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Checkout URL to redirect the browser to', content: new OA\JsonContent(
                properties: [new OA\Property(property: 'checkoutUrl', type: 'string', format: 'url')],
            )),
            new OA\Response(response: 422, description: 'Unknown gem pack'),
        ],
    )]
    public function checkoutGems(Request $request): JsonResponse
    {
        $data = $request->validate([
            'packKey' => ['required', 'string'],
            'successUrl' => ['required', 'url'],
            'cancelUrl' => ['required', 'url'],
        ]);

        $pack = GemPack::where('key', $data['packKey'])->where('is_active', true)->first();

        if (! $pack) {
            return response()->json(['message' => 'Unknown gem pack.'], 422);
        }

        $user = $request->user();

        $separator = str_contains($data['successUrl'], '?') ? '&' : '?';
        $successUrl = $data['successUrl'].$separator.'session_id={CHECKOUT_SESSION_ID}';

        $session = $this->stripe->createGemsCheckoutSession(
            $user,
            $pack->key,
            $pack->gems,
            $pack->amount_cents,
            $successUrl,
            $data['cancelUrl'],
        );

        GemPurchase::create([
            'user_id' => $user->id,
            'pack_key' => $pack->key,
            'gems_credited' => $pack->gems,
            'amount_cents' => $pack->amount_cents,
            'currency' => 'usd',
            'stripe_checkout_session_id' => $session->id,
            'status' => 'pending',
        ]);

        return response()->json(['checkoutUrl' => $session->url]);
    }

    #[OA\Get(
        path: '/api/shop/gems/verify',
        summary: 'Verify and finalize a gem checkout on return from Stripe',
        description: 'The Stripe webhook is the primary way gem purchases get credited, but it requires a '
            .'publicly reachable URL — it can never reach a bare localhost dev server. This endpoint lets the '
            .'frontend confirm payment directly with Stripe\'s API the moment the user lands back on the '
            .'success page, so purchases complete immediately regardless of webhook delivery. Safe to call '
            .'more than once — a already-completed purchase is a no-op, and payment is always independently '
            .'re-confirmed with Stripe, never trusted from the client.',
        tags: ['Shop'],
        security: [['cookieAuth' => []]],
        parameters: [new OA\QueryParameter(name: 'sessionId', description: 'Stripe Checkout Session ID', schema: new OA\Schema(type: 'string'))],
        responses: [
            new OA\Response(response: 200, description: 'Verification result', content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'status', type: 'string', enum: ['completed', 'already_completed', 'not_paid', 'not_found']),
                    new OA\Property(property: 'gems', type: 'integer', nullable: true),
                ],
            )),
            new OA\Response(response: 403, description: 'This checkout session does not belong to the current user'),
        ],
    )]
    public function verifyGemsCheckout(Request $request): JsonResponse
    {
        $data = $request->validate([
            'sessionId' => ['required', 'string'],
        ]);

        $user = $request->user();
        $purchase = GemPurchase::where('stripe_checkout_session_id', $data['sessionId'])->first();

        if (! $purchase) {
            return response()->json(['status' => 'not_found', 'gems' => null]);
        }

        if ((int) $purchase->user_id !== (int) $user->id) {
            abort(403, 'This checkout session does not belong to you.');
        }

        if ($purchase->status === 'completed') {
            $gems = UserGameState::where('user_id', $user->id)->value('gems');

            return response()->json(['status' => 'already_completed', 'gems' => $gems]);
        }

        $gems = $this->stripe->creditGemsPurchase($data['sessionId']);

        return response()->json([
            'status' => $gems !== null ? 'completed' : 'not_paid',
            'gems' => $gems,
        ]);
    }

    #[OA\Post(
        path: '/api/shop/hearts/refill',
        summary: 'Spend gems to refill hearts',
        description: 'Pure wallet transaction — no Stripe involved.',
        tags: ['Shop'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['tierKey'],
            properties: [new OA\Property(property: 'tierKey', type: 'string', enum: ['one', 'three', 'full'], example: 'one')],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Hearts refilled'),
            new OA\Response(response: 422, description: 'Unknown tier, hearts already full, or not enough gems'),
        ],
    )]
    public function refillHearts(Request $request): JsonResponse
    {
        $data = $request->validate([
            'tierKey' => ['required', 'string'],
        ]);

        $tier = HeartRefillTier::where('key', $data['tierKey'])->where('is_active', true)->first();

        if (! $tier) {
            return response()->json(['message' => 'Unknown heart refill tier.'], 422);
        }

        $user = $request->user();

        return DB::transaction(function () use ($user, $tier) {
            UserGameState::firstOrCreate(['user_id' => $user->id]);
            $state = UserGameState::where('user_id', $user->id)->lockForUpdate()->firstOrFail();

            $maxHearts = $this->progress->effectiveMaxHearts($user);

            // A null max means truly unlimited (Family) — always "full", so
            // there's nothing a refill purchase could add.
            if ($maxHearts === null || $state->hearts >= $maxHearts) {
                return response()->json(['message' => 'Hearts are already full.'], 422);
            }

            if ($state->gems < $tier->price_gems) {
                return response()->json(['message' => 'Not enough gems.'], 422);
            }

            GemLedger::apply($state, -$tier->price_gems, 'shop.hearts_refill');
            $state->hearts = min($maxHearts, $state->hearts + $tier->hearts);
            $state->hearts_updated_at = now();
            // They solved the empty-hearts problem with gems — the "hearts
            // are full again" nudge would be stale noise.
            $state->hearts_depleted_at = null;
            $state->save();

            return response()->json([
                'message' => 'Hearts refilled',
                'gems' => $state->gems,
                'hearts' => $state->hearts,
            ]);
        });
    }

    #[OA\Post(
        path: '/api/shop/subscription/checkout',
        summary: 'Start a Stripe Checkout Session to subscribe to a plan',
        description: 'Real money via Stripe test/sandbox mode. The subscription is activated by the /api/stripe/webhook handler once checkout completes.',
        tags: ['Shop'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['planKey', 'successUrl', 'cancelUrl'],
            properties: [
                new OA\Property(property: 'planKey', type: 'string', enum: ['monthly', 'yearly', 'family'], example: 'monthly'),
                new OA\Property(property: 'successUrl', type: 'string', format: 'url'),
                new OA\Property(property: 'cancelUrl', type: 'string', format: 'url'),
            ],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Checkout URL to redirect the browser to'),
            new OA\Response(response: 422, description: 'Unknown plan'),
        ],
    )]
    public function checkoutSubscription(Request $request): JsonResponse
    {
        $data = $request->validate([
            'planKey' => ['required', 'string'],
            'successUrl' => ['required', 'url'],
            'cancelUrl' => ['required', 'url'],
        ]);

        $plan = SubscriptionPlan::where('key', $data['planKey'])->where('is_active', true)->first();

        if (! $plan) {
            return response()->json(['message' => 'Unknown subscription plan.'], 422);
        }

        $user = $request->user();

        // Note: buying the plan you already have is intentionally ALLOWED here
        // — in the manual-renewal model that's exactly how you renew, and
        // activateSubscriptionFromSession() stacks the new period onto whatever
        // time you have left so renewing early never forfeits days.

        $separator = str_contains($data['successUrl'], '?') ? '&' : '?';
        $successUrl = $data['successUrl'].$separator.'session_id={CHECKOUT_SESSION_ID}';

        $session = $this->stripe->createSubscriptionCheckoutSession(
            $user,
            $plan->key,
            $plan->amount_cents,
            $plan->interval,
            $successUrl,
            $data['cancelUrl'],
        );

        return response()->json(['checkoutUrl' => $session->url]);
    }

    #[OA\Get(
        path: '/api/subscription/verify',
        summary: 'Verify a completed subscription checkout and activate it if paid',
        description: 'Independently re-confirms the session with Stripe before activating — used as a synchronous '
            .'fallback to the webhook on checkout return, since the webhook cannot reach localhost in local/dev.',
        tags: ['Shop'],
        security: [['cookieAuth' => []]],
        parameters: [new OA\Parameter(name: 'sessionId', in: 'query', required: true, schema: new OA\Schema(type: 'string'))],
        responses: [
            new OA\Response(response: 200, description: 'Verification result'),
            new OA\Response(response: 403, description: 'Session belongs to a different user'),
        ],
    )]
    public function verifySubscriptionCheckout(Request $request): JsonResponse
    {
        $data = $request->validate([
            'sessionId' => ['required', 'string'],
        ]);

        $user = $request->user();
        $session = $this->stripe->retrieveCheckoutSession($data['sessionId']);

        if ((string) ($session->metadata->user_id ?? '') !== (string) $user->id) {
            abort(403, 'This checkout session does not belong to you.');
        }

        // A guard against a null $session->subscription is required here —
        // Eloquent's where() degrades a null value to a whereNull() clause,
        // which would otherwise match any row that (for whatever reason)
        // also has a null stripe_subscription_id.
        $existing = $session->subscription
            ? UserSubscription::where('stripe_subscription_id', $session->subscription)->first()
            : null;

        if ($existing && $existing->status === 'active') {
            return response()->json(['status' => 'already_active', 'planKey' => $existing->plan_key]);
        }

        $result = $this->stripe->activateSubscriptionFromSession($data['sessionId']);

        return response()->json([
            'status' => $result !== null ? 'activated' : 'not_completed',
            'planKey' => $result['planKey'] ?? null,
        ]);
    }
}
