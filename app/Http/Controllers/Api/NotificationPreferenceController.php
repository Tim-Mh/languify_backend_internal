<?php

namespace App\Http\Controllers\Api;

use App\Enums\NotificationCategory;
use App\Http\Controllers\Controller;
use App\Models\NotificationPreference;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

/**
 * The learner's push notification settings.
 *
 * Six category toggles rather than one per notification, and not a single
 * master switch: one switch means people turn everything off to stop one
 * annoyance, and Apple will not approve an app that offers no opt-out at all.
 */
class NotificationPreferenceController extends Controller
{
    #[OA\Get(
        path: '/api/notification-preferences',
        summary: 'The learner\'s push notification category toggles',
        description: 'Creates the row with everything switched on the first time it is read, so a learner who has '
            .'just granted the OS permission starts opted in rather than having to say yes twice.',
        tags: ['Notifications'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Current preferences')],
    )]
    public function show(Request $request): JsonResponse
    {
        $preferences = NotificationPreference::firstOrCreate(['user_id' => $request->user()->id]);

        return response()->json(['preferences' => $preferences->toggles()]);
    }

    #[OA\Patch(
        path: '/api/notification-preferences',
        summary: 'Switch notification categories on or off',
        description: 'Accepts any subset of the categories, so the settings screen can send just the one that '
            .'changed rather than the whole set.',
        tags: ['Notifications'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'reminders', type: 'boolean'),
                new OA\Property(property: 'rewards', type: 'boolean'),
                new OA\Property(property: 'league', type: 'boolean'),
                new OA\Property(property: 'progress', type: 'boolean'),
                new OA\Property(property: 'family', type: 'boolean'),
                new OA\Property(property: 'billing', type: 'boolean'),
            ],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Updated preferences'),
            new OA\Response(response: 422, description: 'Validation error'),
        ],
    )]
    public function update(Request $request): JsonResponse
    {
        $rules = [];

        foreach (NotificationCategory::values() as $category) {
            $rules[$category] = ['sometimes', 'boolean'];
        }

        $data = $request->validate($rules);

        // A PATCH carrying none of the known categories is always a client bug.
        // Answering 200 to it would hide a typo'd key indefinitely.
        abort_if($data === [], 422, 'No notification categories were supplied.');

        $preferences = NotificationPreference::firstOrCreate(['user_id' => $request->user()->id]);
        $preferences->fill($data)->save();

        return response()->json(['preferences' => $preferences->toggles()]);
    }
}
