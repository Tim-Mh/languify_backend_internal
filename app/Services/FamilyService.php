<?php

namespace App\Services;

use App\Enums\PlanKey;
use App\Models\FamilyGroup;
use App\Models\FamilyInvite;
use App\Models\FamilyMember;
use App\Models\User;
use App\Notifications\FamilyInviteAcceptedNotification;
use App\Notifications\FamilyInviteNotification;
use App\Notifications\FamilyMemberRemovedNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

/**
 * The Family plan is billed to exactly one paying user (the "owner", via
 * their own `user_subscriptions` row — see User::activeSubscription()).
 * Everything here is purely about extending that owner's perks to up to
 * MAX_MEMBERS other accounts; members never get a `user_subscriptions` row
 * of their own. If the owner's subscription lapses, members lose perks
 * immediately (LessonProgressService checks the owner's live status), but
 * the group/membership rows themselves stay intact in case it's renewed.
 */
class FamilyService
{
    /** Additional members beyond the owner — 4 + the owner = 5 people total. */
    public const MAX_MEMBERS = 4;

    private const INVITE_TTL_DAYS = 7;

    public function ownerHasFamilyPlan(User $user): bool
    {
        return $user->activeSubscription?->plan_key === PlanKey::Family->value;
    }

    public function getOrCreateGroup(User $owner): FamilyGroup
    {
        if (! $this->ownerHasFamilyPlan($owner)) {
            throw ValidationException::withMessages([
                'plan' => 'You need an active Family plan subscription to do this.',
            ]);
        }

        return FamilyGroup::firstOrCreate(['owner_id' => $owner->id]);
    }

    /**
     * For cleanup-only actions (revoke an invite, remove a member) that
     * should still work while the owner's subscription is lapsed — the
     * owner needs to be able to manage an existing group down to empty even
     * without an active plan, unlike getOrCreateGroup() (used by invite(),
     * which correctly should NOT work while lapsed).
     */
    private function requireExistingGroup(User $owner): FamilyGroup
    {
        $group = FamilyGroup::where('owner_id', $owner->id)->first();

        if (! $group) {
            throw ValidationException::withMessages(['plan' => 'You don\'t have a family plan group.']);
        }

        return $group;
    }

    /**
     * Whether $user's owned family group (if any) should count as "already
     * belongs to a plan" for invite/accept eligibility. A group only counts
     * while it's actually in use — either the owner is still paying for it,
     * or it still has real members. A lapsed owner's empty leftover group
     * (FamilyGroup rows are never deleted — see removeMember()) must NOT
     * permanently block that person from ever joining or being invited to a
     * different family plan.
     */
    private function ownsLiveFamilyGroup(User $user): bool
    {
        $group = $user->familyGroupOwned;

        if (! $group) {
            return false;
        }

        return $this->ownerHasFamilyPlan($user) || $group->members()->exists();
    }

    public function seatsUsed(FamilyGroup $group): int
    {
        return $group->members()->count() + $group->pendingInvites()->count();
    }

    public function seatsAvailable(FamilyGroup $group): int
    {
        return max(0, self::MAX_MEMBERS - $this->seatsUsed($group));
    }

    public function invite(User $owner, string $email): FamilyInvite
    {
        $email = Str::lower(trim($email));

        if ($email === Str::lower($owner->email)) {
            throw ValidationException::withMessages(['email' => 'You can\'t invite yourself.']);
        }

        return DB::transaction(function () use ($owner, $email) {
            $group = $this->getOrCreateGroup($owner);

            // Lock the group row itself (not just the invite we're about to
            // create) so two near-simultaneous invite() calls for this group
            // serialize on the seat check instead of both reading the same
            // "seats available" snapshot and both proceeding.
            $group = FamilyGroup::whereKey($group->id)->lockForUpdate()->firstOrFail();

            if ($this->seatsAvailable($group) <= 0) {
                throw ValidationException::withMessages(['email' => 'Your family plan is full.']);
            }

            $existingUser = User::where('email', $email)->first();

            if ($existingUser) {
                if ($this->ownsLiveFamilyGroup($existingUser) || $existingUser->familyMembership) {
                    throw ValidationException::withMessages([
                        'email' => 'This person already belongs to a family plan.',
                    ]);
                }
            }

            // Replace any still-pending invite to the same email in this group
            // rather than piling up duplicates.
            $group->pendingInvites()->where('email', $email)->update(['status' => 'revoked']);

            $invite = FamilyInvite::create([
                'family_group_id' => $group->id,
                'email' => $email,
                'token' => Str::random(48),
                'status' => 'pending',
                'invited_by' => $owner->id,
                'expires_at' => Carbon::now()->addDays(self::INVITE_TTL_DAYS),
            ]);

            Notification::route('mail', $email)->notify(new FamilyInviteNotification($invite, $owner));

            return $invite;
        });
    }

    public function revokeInvite(User $owner, FamilyInvite $invite): void
    {
        $group = $this->requireExistingGroup($owner);

        if ($invite->family_group_id !== $group->id) {
            throw ValidationException::withMessages(['invite' => 'That invite does not belong to your family plan.']);
        }

        $invite->update(['status' => 'revoked']);
    }

    public function removeMember(User $owner, FamilyMember $member): void
    {
        $group = $this->requireExistingGroup($owner);

        if ($member->family_group_id !== $group->id) {
            throw ValidationException::withMessages(['member' => 'That member does not belong to your family plan.']);
        }

        $removedUser = $member->user;
        $member->delete();

        $removedUser?->notify(new FamilyMemberRemovedNotification($owner->full_name ?: $owner->email, 'removed'));
    }

    public function leave(User $user): void
    {
        $membership = $user->familyMembership()->with('familyGroup.owner')->first();

        if (! $membership) {
            throw ValidationException::withMessages(['membership' => 'You\'re not a member of a family plan.']);
        }

        $owner = $membership->familyGroup->owner;
        $membership->delete();

        $user->notify(new FamilyMemberRemovedNotification($owner->full_name ?: $owner->email, 'left'));
    }

    public function findInviteByToken(string $token): ?FamilyInvite
    {
        return FamilyInvite::with('familyGroup.owner')->where('token', $token)->first();
    }

    /**
     * The invited person turns down a pending invite addressed to their own
     * email — leaves them a free user (unlike acceptInvite). Marked
     * 'declined' so it drops off the owner's pending list.
     */
    public function declineInvite(string $token, User $user): void
    {
        $invite = FamilyInvite::where('token', $token)->first();

        if (! $invite || $invite->status !== 'pending') {
            throw ValidationException::withMessages(['invite' => 'This invite is no longer valid.']);
        }

        if (Str::lower($invite->email) !== Str::lower($user->email)) {
            throw ValidationException::withMessages(['invite' => 'This invite was sent to a different email address.']);
        }

        $invite->update(['status' => 'declined']);
    }

    public function acceptInvite(string $token, User $user): FamilyMember
    {
        return DB::transaction(function () use ($token, $user) {
            $invite = FamilyInvite::with('familyGroup.owner')
                ->where('token', $token)
                ->lockForUpdate()
                ->first();

            if (! $invite || $invite->status !== 'pending') {
                throw ValidationException::withMessages(['invite' => 'This invite is no longer valid.']);
            }

            if ($invite->expires_at->isPast()) {
                $invite->update(['status' => 'expired']);
                throw ValidationException::withMessages(['invite' => 'This invite has expired.']);
            }

            if (Str::lower($invite->email) !== Str::lower($user->email)) {
                throw ValidationException::withMessages([
                    'invite' => 'This invite was sent to a different email address.',
                ]);
            }

            // Locked so a second, different pending invite to this same group
            // being accepted concurrently serializes on the seat check below
            // instead of racing past it — the invite-row lock above only
            // protects against re-accepting the SAME token twice.
            $group = FamilyGroup::whereKey($invite->family_group_id)->lockForUpdate()->firstOrFail();
            $group->loadMissing('owner');

            if (! $this->ownerHasFamilyPlan($group->owner)) {
                throw ValidationException::withMessages([
                    'invite' => 'This family plan is no longer active.',
                ]);
            }

            if ($this->ownsLiveFamilyGroup($user) || $user->familyMembership) {
                throw ValidationException::withMessages([
                    'invite' => 'You already belong to a family plan.',
                ]);
            }

            if ($this->seatsAvailable($group) <= 0) {
                throw ValidationException::withMessages(['invite' => 'This family plan is full.']);
            }

            $member = FamilyMember::create([
                'family_group_id' => $group->id,
                'user_id' => $user->id,
                'joined_at' => Carbon::now(),
            ]);

            $invite->update(['status' => 'accepted', 'accepted_at' => Carbon::now()]);

            $group->owner->notify(new FamilyInviteAcceptedNotification($user));

            return $member;
        });
    }
}
