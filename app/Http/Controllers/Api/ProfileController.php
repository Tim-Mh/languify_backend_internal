<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Notifications\FamilyPlanCanceledNotification;
use App\Services\StripeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use OpenApi\Attributes as OA;

class ProfileController extends Controller
{
    public function __construct(private StripeService $stripe) {}

    #[OA\Patch(
        path: '/api/profile',
        summary: 'Update the user\'s display name',
        tags: ['Profile'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['fullName'],
            properties: [new OA\Property(property: 'fullName', type: 'string', maxLength: 255, example: 'Mark Test')],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Profile updated'),
            new OA\Response(response: 422, description: 'Validation error'),
        ],
    )]
    #[OA\Delete(
        path: '/api/profile',
        summary: 'Permanently delete the authenticated user\'s account',
        description: 'Hard-deletes the user and all their data (cascades). If the user owns a Family plan, the group '
            .'is removed too, so every member reverts to the free plan and is emailed that their access ended. Any live '
            .'Stripe subscription is cancelled so the closed account is never billed again.',
        tags: ['Profile'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Account deleted')],
    )]
    public function destroy(Request $request): JsonResponse
    {
        $user = $request->user();

        // Tell family members their access is ending BEFORE the cascade wipes
        // the group. Deleting the owner removes the family group + memberships,
        // so members revert to free automatically (their perks are derived live
        // from the owner's subscription — see User::effectivePlanKey). This just
        // gives them a heads-up. Best-effort: a mail hiccup must not block the
        // deletion the user asked for.
        $ownedGroup = $user->familyGroupOwned()->with('members.user')->first();

        if ($ownedGroup) {
            foreach ($ownedGroup->members as $member) {
                try {
                    $member->user?->notify(new FamilyPlanCanceledNotification($user->full_name ?: 'The plan owner'));
                } catch (\Throwable) {
                    // ignore — never block deletion on a notification
                }
            }
        }

        // Stop any live Stripe billing for the closed account.
        try {
            $this->stripe->cancelActiveSubscriptions($user);
        } catch (\Throwable) {
            // ignore — never block deletion on a Stripe hiccup
        }

        // Cascades remove game state, subscriptions, completions, leagues, the
        // owned family group + its memberships, etc. (all user FKs are
        // cascadeOnDelete).
        $user->delete();

        return response()
            ->json(['message' => 'Account deleted.'])
            ->withCookie(Cookie::forget(config('auth_cookie.name'), '/', null));
    }

    public function update(Request $request): JsonResponse
    {
        $data = $request->validate([
            'fullName' => ['required', 'string', 'min:1', 'max:255'],
        ]);

        $user = $request->user();
        $user->forceFill(['full_name' => trim($data['fullName'])])->save();

        return response()->json([
            'message' => 'Profile updated',
            'fullName' => $user->full_name,
        ]);
    }

    #[OA\Patch(
        path: '/api/profile/timezone',
        summary: 'Sync the user\'s IANA timezone',
        description: 'Called opportunistically by the frontend when the browser-detected timezone differs from what\'s stored, so streak/daily-reset day boundaries follow the user even if they travel mid-session.',
        tags: ['Profile'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['timezone'],
            properties: [new OA\Property(property: 'timezone', type: 'string', example: 'Asia/Karachi')],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Timezone updated'),
            new OA\Response(response: 422, description: 'Invalid timezone'),
        ],
    )]
    public function updateTimezone(Request $request): JsonResponse
    {
        $data = $request->validate([
            'timezone' => ['required', 'string', 'timezone'],
        ]);

        $user = $request->user();
        $user->forceFill(['timezone' => $data['timezone']])->save();

        return response()->json(['message' => 'Timezone updated', 'timezone' => $user->timezone]);
    }

    #[OA\Get(
        path: '/api/profile/completed-languages',
        summary: 'List languages the user has fully completed',
        description: 'A language is marked complete when every chapter of that course is finished. Snapshots the lifetime XP at the moment of completion.',
        tags: ['Profile'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Completed languages')],
    )]
    public function completedLanguages(Request $request): JsonResponse
    {
        $completed = $request->user()
            ->completedLanguages()
            ->with('language')
            ->orderByDesc('completed_at')
            ->get();

        return response()->json([
            'completedLanguages' => $completed->map(fn ($entry) => [
                'code' => $entry->language->code,
                'name' => $entry->language->name,
                'flagEmoji' => $entry->language->flag_emoji,
                'xp' => $entry->xp_at_completion,
                'completedAt' => $entry->completed_at,
            ]),
        ]);
    }
}
