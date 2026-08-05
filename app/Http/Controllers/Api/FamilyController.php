<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FamilyInvite;
use App\Models\FamilyMember;
use App\Services\FamilyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use OpenApi\Attributes as OA;

class FamilyController extends Controller
{
    public function __construct(private FamilyService $family) {}

    #[OA\Get(
        path: '/api/family',
        summary: "Get the current user's family plan status",
        tags: ['Family'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Family plan status (owner, member, or none)')],
    )]
    public function show(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user->familyGroupOwned || $this->family->ownerHasFamilyPlan($user)) {
            $group = $this->family->getOrCreateGroup($user);
            $group->load(['members.user', 'pendingInvites']);

            return response()->json([
                'role' => 'owner',
                'seatsUsed' => $group->members->count() + $group->pendingInvites->count() + 1,
                'seatsTotal' => FamilyService::MAX_MEMBERS + 1,
                'members' => $group->members->map(fn (FamilyMember $member) => [
                    'id' => $member->id,
                    'fullName' => $member->user->full_name,
                    'email' => $member->user->email,
                    'joinedAt' => $member->joined_at,
                ]),
                'pendingInvites' => $group->pendingInvites->map(fn (FamilyInvite $invite) => [
                    'id' => $invite->id,
                    'email' => $invite->email,
                    'expiresAt' => $invite->expires_at,
                ]),
            ]);
        }

        $membership = $user->familyMembership()->with('familyGroup.owner')->first();

        if ($membership) {
            $owner = $membership->familyGroup->owner;

            return response()->json([
                'role' => 'member',
                'planActive' => $this->family->ownerHasFamilyPlan($owner),
                'owner' => [
                    'fullName' => $owner->full_name,
                    'email' => $owner->email,
                ],
            ]);
        }

        // Not an owner or member yet, but they may have a pending invite
        // waiting (e.g. the invite email never arrived). Surface it so they can
        // accept in-app instead of needing the emailed link.
        $pendingInvite = FamilyInvite::with('familyGroup.owner')
            ->whereRaw('LOWER(email) = ?', [Str::lower($user->email)])
            ->where('status', 'pending')
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        $inviteOwner = $pendingInvite?->familyGroup?->owner;

        if ($inviteOwner && $this->family->ownerHasFamilyPlan($inviteOwner)) {
            return response()->json([
                'role' => 'invited',
                'pendingInvite' => [
                    'token' => $pendingInvite->token,
                    'ownerName' => $inviteOwner->full_name ?: $inviteOwner->email,
                ],
            ]);
        }

        return response()->json(['role' => 'none']);
    }

    #[OA\Post(
        path: '/api/family/invite',
        summary: 'Invite someone to join the family plan by email',
        tags: ['Family'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Invite sent')],
    )]
    public function invite(Request $request): JsonResponse
    {
        $data = $request->validate(['email' => 'required|email']);

        try {
            $invite = $this->family->invite($request->user(), $data['email']);
        } catch (ValidationException $e) {
            return response()->json(['message' => collect($e->errors())->flatten()->first()], 422);
        }

        return response()->json(['invited' => true, 'expiresAt' => $invite->expires_at]);
    }

    #[OA\Delete(
        path: '/api/family/invites/{invite}',
        summary: 'Revoke a pending invite',
        tags: ['Family'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Invite revoked')],
    )]
    public function revokeInvite(Request $request, FamilyInvite $invite): JsonResponse
    {
        try {
            $this->family->revokeInvite($request->user(), $invite);
        } catch (ValidationException $e) {
            return response()->json(['message' => collect($e->errors())->flatten()->first()], 422);
        }

        return response()->json(['revoked' => true]);
    }

    #[OA\Delete(
        path: '/api/family/members/{member}',
        summary: 'Remove a member from the family plan',
        tags: ['Family'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Member removed')],
    )]
    public function removeMember(Request $request, FamilyMember $member): JsonResponse
    {
        try {
            $this->family->removeMember($request->user(), $member);
        } catch (ValidationException $e) {
            return response()->json(['message' => collect($e->errors())->flatten()->first()], 422);
        }

        return response()->json(['removed' => true]);
    }

    #[OA\Post(
        path: '/api/family/leave',
        summary: "Leave the family plan you're a member of",
        tags: ['Family'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Left the family plan')],
    )]
    public function leave(Request $request): JsonResponse
    {
        try {
            $this->family->leave($request->user());
        } catch (ValidationException $e) {
            return response()->json(['message' => collect($e->errors())->flatten()->first()], 422);
        }

        return response()->json(['left' => true]);
    }

    #[OA\Get(
        path: '/api/family/invite/{token}',
        summary: 'Look up an invite by token (public — shown before login on the accept page)',
        tags: ['Family'],
        responses: [new OA\Response(response: 200, description: 'Invite details or invalid/expired status')],
    )]
    public function inviteDetails(string $token): JsonResponse
    {
        $invite = $this->family->findInviteByToken($token);

        if (! $invite) {
            return response()->json(['status' => 'invalid']);
        }

        if ($invite->status === 'accepted') {
            return response()->json(['status' => 'accepted']);
        }

        if ($invite->isExpired()) {
            return response()->json(['status' => 'expired']);
        }

        if ($invite->status !== 'pending') {
            return response()->json(['status' => 'invalid']);
        }

        return response()->json([
            'status' => 'pending',
            'ownerName' => $invite->familyGroup->owner->full_name,
            'email' => $invite->email,
        ]);
    }

    #[OA\Post(
        path: '/api/family/invite/{token}/accept',
        summary: 'Accept a family plan invite',
        tags: ['Family'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Joined the family plan')],
    )]
    public function acceptInvite(Request $request, string $token): JsonResponse
    {
        try {
            $this->family->acceptInvite($token, $request->user());
        } catch (ValidationException $e) {
            return response()->json(['message' => collect($e->errors())->flatten()->first()], 422);
        }

        return response()->json(['joined' => true]);
    }

    #[OA\Post(
        path: '/api/family/invite/{token}/decline',
        summary: 'Decline a family plan invite you received',
        description: 'Lets the invited person turn down the invite so they stay a free user (and can buy their own plan). Distinct from the owner revoking it.',
        tags: ['Family'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Invite declined')],
    )]
    public function declineInvite(Request $request, string $token): JsonResponse
    {
        try {
            $this->family->declineInvite($token, $request->user());
        } catch (ValidationException $e) {
            return response()->json(['message' => collect($e->errors())->flatten()->first()], 422);
        }

        return response()->json(['declined' => true]);
    }
}
