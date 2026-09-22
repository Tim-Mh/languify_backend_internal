<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserGameState;
use App\Services\LessonProgressService;
use App\Services\StripeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Stripe\Checkout\Session;
use Tests\TestCase;

class ShopTest extends TestCase
{
    use RefreshDatabase;

    public function test_catalog_returns_the_known_packs_and_plans(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->getJson('/api/shop/catalog')
            ->assertOk()
            ->assertJsonCount(3, 'gemPacks')
            ->assertJsonCount(3, 'heartRefillTiers')
            ->assertJsonCount(3, 'subscriptionPlans');
    }

    public function test_refilling_hearts_spends_gems_without_stripe(): void
    {
        $user = User::factory()->create();
        UserGameState::create(['user_id' => $user->id, 'gems' => 350, 'hearts' => 2]);

        $this->actingAs($user)->postJson('/api/shop/hearts/refill', ['tierKey' => 'one'])
            ->assertOk()
            ->assertJson(['gems' => 150, 'hearts' => 3]);
    }

    public function test_refilling_hearts_fails_with_insufficient_gems(): void
    {
        $user = User::factory()->create();
        UserGameState::create(['user_id' => $user->id, 'gems' => 50, 'hearts' => 2]);

        $this->actingAs($user)->postJson('/api/shop/hearts/refill', ['tierKey' => 'one'])
            ->assertStatus(422);
    }

    public function test_refilling_hearts_rejects_unknown_tier(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->postJson('/api/shop/hearts/refill', ['tierKey' => 'bogus'])
            ->assertStatus(422);
    }

    public function test_gems_checkout_creates_a_pending_purchase_and_returns_a_checkout_url(): void
    {
        $user = User::factory()->create();

        $fakeSession = Session::constructFrom(['id' => 'cs_test_fake123', 'url' => 'https://checkout.stripe.com/fake']);
        $this->mock(StripeService::class, function ($mock) use ($fakeSession) {
            $mock->shouldReceive('createGemsCheckoutSession')->once()->andReturn($fakeSession);
        });

        $response = $this->actingAs($user)->postJson('/api/shop/gems/checkout', [
            'packKey' => 'basic',
            'successUrl' => 'http://localhost:5173/shop/success',
            'cancelUrl' => 'http://localhost:5173/shop/cancel',
        ]);

        $response->assertOk()->assertJson(['checkoutUrl' => 'https://checkout.stripe.com/fake']);

        $this->assertDatabaseHas('gem_purchases', [
            'user_id' => $user->id,
            'pack_key' => 'basic',
            'gems_credited' => 200,
            'stripe_checkout_session_id' => 'cs_test_fake123',
            'status' => 'pending',
        ]);
    }

    public function test_gems_checkout_rejects_unknown_pack(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->postJson('/api/shop/gems/checkout', [
            'packKey' => 'bogus',
            'successUrl' => 'http://localhost:5173/success',
            'cancelUrl' => 'http://localhost:5173/cancel',
        ])->assertStatus(422);
    }

    public function test_subscription_checkout_returns_a_checkout_url(): void
    {
        // Every factory user is a subscriber to 'monthly' by default (see
        // UserFactory::configure()) — checking out for 'yearly' here (not
        // 'monthly') is deliberate, so this test exercises the general
        // "checkout returns a URL" path rather than tripping the
        // already-have-this-plan guard, which is covered separately.
        $user = User::factory()->create();

        $fakeSession = Session::constructFrom(['id' => 'cs_test_sub456', 'url' => 'https://checkout.stripe.com/fake-sub']);
        $this->mock(StripeService::class, function ($mock) use ($fakeSession) {
            $mock->shouldReceive('createSubscriptionCheckoutSession')->once()->andReturn($fakeSession);
        });

        $this->actingAs($user)->postJson('/api/shop/subscription/checkout', [
            'planKey' => 'yearly',
            'successUrl' => 'http://localhost:5173/success',
            'cancelUrl' => 'http://localhost:5173/cancel',
        ])->assertOk()->assertJson(['checkoutUrl' => 'https://checkout.stripe.com/fake-sub']);
    }

    public function test_buying_the_plan_you_already_have_is_how_you_renew(): void
    {
        // Factory users are on 'monthly' already. Checking out the same plan
        // used to be refused; in the manual-renewal model it IS the renewal,
        // and activateSubscriptionFromSession stacks the new period onto the
        // time still left, so renewing early never forfeits days.
        $user = User::factory()->create();

        $this->actingAs($user)->postJson('/api/shop/subscription/checkout', [
            'planKey' => 'monthly',
            'successUrl' => 'http://localhost:5173/success',
            'cancelUrl' => 'http://localhost:5173/cancel',
        ])->assertOk()->assertJsonStructure(['checkoutUrl']);
    }

    public function test_activating_a_subscription_tops_up_hearts_to_the_new_cap(): void
    {
        // unsubscribed() so there's no factory-default subscription to
        // trigger a real Stripe cancel call inside cancelOtherActiveSubscriptions.
        $user = User::factory()->unsubscribed()->create();
        UserGameState::create(['user_id' => $user->id, 'hearts' => 5]);

        $fakeSession = Session::constructFrom([
            'id' => 'cs_test_sub_hearts',
            'status' => 'complete',
            'subscription' => 'sub_live_hearts_1',
            'customer' => 'cus_hearts_1',
            'amount_total' => 200,
            'currency' => 'usd',
            'metadata' => ['type' => 'subscription', 'user_id' => (string) $user->id, 'plan_key' => 'monthly'],
        ]);

        // Partial mock: real activateSubscriptionFromSession runs against the
        // DB, only the outbound Stripe session fetch is faked. Constructor
        // args are passed explicitly so the real (dependency-injected)
        // LessonProgressService is wired up — makePartial() alone wouldn't
        // run the constructor and $progress would be uninitialized.
        $mock = \Mockery::mock(StripeService::class, [app(LessonProgressService::class)])->makePartial();
        $mock->shouldReceive('retrieveCheckoutSession')->andReturn($fakeSession);
        $this->app->instance(StripeService::class, $mock);

        $this->actingAs($user)->getJson('/api/subscription/verify?sessionId=cs_test_sub_hearts')
            ->assertOk()
            ->assertJsonPath('status', 'activated')
            ->assertJsonPath('planKey', 'monthly');

        $this->assertSame(100, UserGameState::where('user_id', $user->id)->value('hearts'));
    }

    public function test_shop_endpoints_require_authentication(): void
    {
        $this->getJson('/api/shop/catalog')->assertUnauthorized();
        $this->postJson('/api/shop/hearts/refill', ['tierKey' => 'one'])->assertUnauthorized();
    }
}
