<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * The app has no free tier (see RequireActiveSubscription) — a "bare"
     * factory user represents that reality by default, with an active
     * Monthly subscription. subscribed() overrides the tier; unsubscribed()
     * opts out entirely for tests exercising the paywall itself. All three
     * use updateOrCreate keyed on user_id so they compose safely regardless
     * of call order (e.g. subscribed('family') after the default still
     * results in exactly one subscription row, not two).
     */
    public function configure(): static
    {
        return $this->afterCreating(fn (User $user) => $this->putSubscription($user, 'monthly'));
    }

    public function subscribed(string $planKey = 'monthly'): static
    {
        return $this->afterCreating(fn (User $user) => $this->putSubscription($user, $planKey));
    }

    public function unsubscribed(): static
    {
        return $this->afterCreating(fn (User $user) => UserSubscription::where('user_id', $user->id)->delete());
    }

    private function putSubscription(User $user, string $planKey): void
    {
        UserSubscription::updateOrCreate(
            ['user_id' => $user->id],
            [
                'plan_key' => $planKey,
                'stripe_customer_id' => 'cus_factory_'.$user->id,
                'stripe_subscription_id' => 'sub_factory_'.$user->id,
                'status' => 'active',
                'current_period_end' => now()->addMonth(),
            ],
        );
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
