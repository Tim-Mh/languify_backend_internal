<?php

namespace Tests\Feature;

use App\Models\FamilyGroup;
use App\Models\FamilyInvite;
use App\Models\FamilyMember;
use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FamilyMemberStatusTest extends TestCase
{
    use RefreshDatabase;

    private function familyOwnerWithGroup(): FamilyGroup
    {
        $owner = User::factory()->create();
        UserSubscription::updateOrCreate(
            ['user_id' => $owner->id],
            ['plan_key' => 'family', 'stripe_customer_id' => 'c', 'stripe_subscription_id' => 'sub_owner', 'status' => 'active', 'current_period_end' => now()->addMonth()],
        );

        return FamilyGroup::create(['owner_id' => $owner->id]);
    }

    public function test_family_member_status_reports_is_family_member_true(): void
    {
        $group = $this->familyOwnerWithGroup();

        $member = User::factory()->unsubscribed()->create();
        FamilyMember::create(['family_group_id' => $group->id, 'user_id' => $member->id, 'joined_at' => now()]);

        $this->actingAs($member)->getJson('/api/subscription/status')
            ->assertOk()
            ->assertJsonPath('subscription.isFamilyMember', true)
            ->assertJsonPath('subscription.planKey', 'family');
    }

    public function test_invited_user_sees_their_pending_invite_in_family_status(): void
    {
        $group = $this->familyOwnerWithGroup();
        $invitee = User::factory()->unsubscribed()->create(['email' => 'invitee@example.com']);
        FamilyInvite::create([
            'family_group_id' => $group->id,
            'email' => 'invitee@example.com',
            'token' => 'tok_invite_123',
            'status' => 'pending',
            'invited_by' => $group->owner_id,
            'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($invitee)->getJson('/api/family')
            ->assertOk()
            ->assertJsonPath('role', 'invited')
            ->assertJsonPath('pendingInvite.token', 'tok_invite_123');
    }

    public function test_invited_user_can_accept_in_app_and_becomes_a_member(): void
    {
        $group = $this->familyOwnerWithGroup();
        $invitee = User::factory()->unsubscribed()->create(['email' => 'invitee@example.com']);
        FamilyInvite::create([
            'family_group_id' => $group->id, 'email' => 'invitee@example.com', 'token' => 'tok_accept',
            'status' => 'pending', 'invited_by' => $group->owner_id, 'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($invitee)->postJson('/api/family/invite/tok_accept/accept')->assertOk();

        $this->actingAs($invitee)->getJson('/api/subscription/status')
            ->assertJsonPath('subscription.isFamilyMember', true);
    }

    public function test_declining_an_invite_leaves_the_user_free(): void
    {
        $group = $this->familyOwnerWithGroup();
        $invitee = User::factory()->unsubscribed()->create(['email' => 'invitee@example.com']);
        FamilyInvite::create([
            'family_group_id' => $group->id, 'email' => 'invitee@example.com', 'token' => 'tok_decline',
            'status' => 'pending', 'invited_by' => $group->owner_id, 'expires_at' => now()->addDays(7),
        ]);

        $this->actingAs($invitee)->postJson('/api/family/invite/tok_decline/decline')->assertOk();

        // No longer invited, and not a member — a plain free user who sees plans.
        $this->actingAs($invitee)->getJson('/api/family')->assertJsonPath('role', 'none');
        $this->actingAs($invitee)->getJson('/api/subscription/status')->assertJsonPath('subscription', null);
    }
}
