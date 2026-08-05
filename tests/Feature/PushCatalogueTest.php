<?php

namespace Tests\Feature;

use App\Enums\NotificationCategory;
use App\Models\NotificationPreference;
use App\Models\User;
use App\Notifications\DailyChestReadyNotification;
use App\Notifications\DailyLessonReminderNotification;
use App\Notifications\FamilyInviteAcceptedNotification;
use App\Notifications\FamilyMemberRemovedNotification;
use App\Notifications\FamilyPlanCanceledNotification;
use App\Notifications\HeartsFullNotification;
use App\Notifications\LeagueResultNotification;
use App\Notifications\LeagueZoneNotification;
use App\Notifications\PaymentFailedNotification;
use App\Notifications\ReEngagementNotification;
use App\Notifications\SetupIncompleteNotification;
use App\Notifications\StreakBrokenNotification;
use App\Notifications\StreakFreezeUsedNotification;
use App\Notifications\StreakGoalReachedNotification;
use App\Notifications\StreakMilestoneNotification;
use App\Notifications\SubscriptionCanceledNotification;
use App\Notifications\SubscriptionConfirmedNotification;
use App\Notifications\SubscriptionExpiredNotification;
use App\Notifications\SubscriptionRenewalReminderNotification;
use App\Notifications\UnclaimedBadgeNotification;
use App\Services\PushPolicy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PushCatalogueTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Every push-capable notification builds a valid ExpoMessage: a title, a
     * body, and a deep link — the contract the mobile app's tap routing
     * depends on. A notification that forgets its deepLink drops the learner
     * on the wrong screen, which this catches at build time, not in the field.
     */
    public function test_every_push_notification_builds_a_complete_message(): void
    {
        $member = User::factory()->create(['full_name' => 'Kid']);

        $catalogue = [
            new DailyLessonReminderNotification(5),
            new StreakMilestoneNotification(7),
            new PaymentFailedNotification('Monthly', false),
            new StreakBrokenNotification(9),
            new ReEngagementNotification(7),
            new LeagueResultNotification('promoted', 'Gold'),
            new SubscriptionConfirmedNotification('Monthly'),
            new SubscriptionCanceledNotification('Monthly', false),
            new SubscriptionExpiredNotification('Monthly'),
            new SetupIncompleteNotification,
            new UnclaimedBadgeNotification(2),
            new LeagueZoneNotification('demotion'),
            new DailyChestReadyNotification,
            new HeartsFullNotification,
            new StreakGoalReachedNotification(14),
            new StreakFreezeUsedNotification(30),
            new SubscriptionRenewalReminderNotification('Yearly', 3),
            new FamilyInviteAcceptedNotification($member),
            new FamilyMemberRemovedNotification('Owner', 'removed'),
            new FamilyPlanCanceledNotification('Owner'),
        ];

        foreach ($catalogue as $notification) {
            $this->assertContains('expo', $notification->via($member), $notification::class);

            $payload = $notification->toExpo($member)->toArray();

            $this->assertNotSame('', $payload['title'], $notification::class);
            $this->assertNotSame('', $payload['body'], $notification::class);
            $this->assertStringStartsWith('/', $payload['data']['url'] ?? '', $notification::class.' has no deep link');
            $this->assertContains($payload['channelId'], NotificationCategory::values(), $notification::class);
        }
    }

    public function test_low_priority_cannot_take_the_last_daily_slot(): void
    {
        $user = User::factory()->create(['timezone' => 'UTC']);
        $policy = app(PushPolicy::class);

        \Illuminate\Support\Carbon::setTestNow(\Illuminate\Support\Carbon::parse('2026-08-05 12:00:00', 'UTC'));

        // Two normal sends spend two of the three slots.
        $this->assertTrue($policy->allows($user, NotificationCategory::Progress));
        $this->assertTrue($policy->allows($user, NotificationCategory::Progress));

        // A low-priority message may not take the last one…
        $this->assertFalse($policy->allows($user, NotificationCategory::Rewards, lowPriority: true));

        // …but a normal one may, and then the cap is spent for everyone.
        $this->assertTrue($policy->allows($user, NotificationCategory::Progress));
        $this->assertFalse($policy->allows($user, NotificationCategory::Progress));

        $this->assertSame(3, (int) NotificationPreference::where('user_id', $user->id)->value('sent_count'));
    }

    public function test_there_are_no_quiet_hours_by_design(): void
    {
        $user = User::factory()->create(['timezone' => 'UTC']);
        $policy = app(PushPolicy::class);

        // 03:30 — the middle of the night still delivers, by request.
        \Illuminate\Support\Carbon::setTestNow(\Illuminate\Support\Carbon::parse('2026-08-05 03:30:00', 'UTC'));

        $this->assertTrue($policy->allows($user, NotificationCategory::Rewards));
        $this->assertTrue($policy->allows($user, NotificationCategory::Reminders));
        $this->assertTrue($policy->allows($user, NotificationCategory::Billing));
    }

    public function test_low_priority_spends_a_slot_when_it_does_send(): void
    {
        $user = User::factory()->create(['timezone' => 'UTC']);
        $policy = app(PushPolicy::class);

        \Illuminate\Support\Carbon::setTestNow(\Illuminate\Support\Carbon::parse('2026-08-05 12:00:00', 'UTC'));

        $this->assertTrue($policy->allows($user, NotificationCategory::Rewards, lowPriority: true));

        $this->assertSame(1, (int) NotificationPreference::where('user_id', $user->id)->value('sent_count'));
    }
}
