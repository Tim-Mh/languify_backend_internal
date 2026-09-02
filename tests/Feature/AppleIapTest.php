<?php

namespace Tests\Feature;

use App\Models\GemPack;
use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Models\UserGameState;
use App\Models\UserSubscription;
use App\Services\AppleIapService;
use AppStoreServerLibrary\Models\JWSTransactionDecodedPayload;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * The crediting half of Apple IAP. Signature verification is Apple's own
 * library over a certificate chain and cannot be faked meaningfully, so these
 * tests build decoded payloads directly and exercise everything after the
 * signature: product mapping, idempotency, and subscription state.
 */
class AppleIapTest extends TestCase
{
    use RefreshDatabase;

    private function payload(array $overrides = []): JWSTransactionDecodedPayload
    {
        return JWSTransactionDecodedPayload::fromObject((object) array_merge([
            'originalTransactionId' => '2000000000001',
            'transactionId' => '2000000000001',
            'bundleId' => 'us.languify.app',
            'productId' => 'us.languify.app.gems.basic',
            'purchaseDate' => now()->getTimestampMs(),
        ], $overrides));
    }

    public function test_gem_purchase_credits_once_and_replays_are_noops(): void
    {
        $user = User::factory()->unsubscribed()->create();
        UserGameState::create(['user_id' => $user->id, 'gems' => 10]);
        $pack = GemPack::firstOrCreate(['key' => 'basic'], [
            'title' => 'Basic Pack', 'gems' => 200,
            'amount_cents' => 200, 'is_active' => true, 'order_number' => 1,
        ]);

        $iap = app(AppleIapService::class);
        $payload = $this->payload();

        $first = $iap->credit($user->id, $payload);
        $second = $iap->credit($user->id, $payload);

        $this->assertSame('completed', $first['status']);
        $this->assertSame(10 + $pack->gems, $first['gems']);
        $this->assertSame('already_completed', $second['status']);
        $this->assertSame(10 + $pack->gems, UserGameState::where('user_id', $user->id)->value('gems'));
    }

    public function test_subscription_purchase_activates_plan(): void
    {
        $user = User::factory()->unsubscribed()->create();
        SubscriptionPlan::firstOrCreate(['key' => 'yearly'], [
            'title' => 'Yearly Plan', 'amount_cents' => 1500,
            'interval' => 'year', 'is_active' => true, 'order_number' => 2,
        ]);

        $result = app(AppleIapService::class)->credit($user->id, $this->payload([
            'productId' => 'us.languify.app.sub.yearly',
            'expiresDate' => now()->addYear()->getTimestampMs(),
        ]));

        $this->assertSame('completed', $result['status']);

        $record = UserSubscription::where('user_id', $user->id)->where('provider', 'apple')->firstOrFail();
        $this->assertSame('apple', $record->provider);
        $this->assertSame('yearly', $record->plan_key);
        $this->assertSame('active', $record->status);
        $this->assertTrue($user->fresh()->hasActiveAppAccess());
    }

    public function test_expired_or_revoked_transactions_do_not_grant_access(): void
    {
        $user = User::factory()->unsubscribed()->create();
        SubscriptionPlan::firstOrCreate(['key' => 'monthly'], [
            'title' => 'Monthly Plan', 'amount_cents' => 200,
            'interval' => 'month', 'is_active' => true, 'order_number' => 1,
        ]);

        $result = app(AppleIapService::class)->credit($user->id, $this->payload([
            'productId' => 'us.languify.app.sub.monthly',
            'expiresDate' => now()->subDay()->getTimestampMs(),
        ]));

        $this->assertSame('not_active', $result['status']);
        $this->assertFalse($user->fresh()->hasActiveAppAccess());
    }

    public function test_unknown_product_is_rejected_without_crediting(): void
    {
        $user = User::factory()->unsubscribed()->create();
        UserGameState::create(['user_id' => $user->id, 'gems' => 10]);

        $result = app(AppleIapService::class)->credit($user->id, $this->payload([
            'productId' => 'us.languify.app.gems.nonexistent',
        ]));

        $this->assertSame('unrecognised_product', $result['status']);
        $this->assertSame(10, UserGameState::where('user_id', $user->id)->value('gems'));
    }

    public function test_verify_endpoint_rejects_garbage_jws(): void
    {
        $user = User::factory()->unsubscribed()->create();

        $this->actingAs($user)
            ->postJson('/api/shop/apple/verify', ['signedTransaction' => 'not-a-jws'])
            ->assertStatus(422);
    }

    public function test_webhook_rejects_unverified_payloads(): void
    {
        $this->postJson('/api/apple/webhook', ['signedPayload' => 'not-a-jws'])
            ->assertStatus(401);
    }
}
