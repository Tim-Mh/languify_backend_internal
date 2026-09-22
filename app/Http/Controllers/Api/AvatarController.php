<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AvatarOption;
use App\Models\UserAvatar;
use App\Models\UserAvatarUnlock;
use App\Models\UserGameState;
use App\Support\GemLedger;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use OpenApi\Attributes as OA;

class AvatarController extends Controller
{
    private const ATTRIBUTE_TYPES = ['skinColor', 'hair', 'hairColor', 'eyes', 'eyebrows', 'mouth', 'backgroundColor'];

    #[OA\Get(
        path: '/api/avatar',
        summary: 'Get the user\'s DiceBear avatar configuration',
        description: 'Returns all-null fields if the user has never saved an avatar (the frontend applies its own defaults in that case).',
        tags: ['Avatar'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Avatar configuration')],
    )]
    public function show(Request $request): JsonResponse
    {
        $avatar = UserAvatar::firstOrNew(['user_id' => $request->user()->id]);

        return response()->json(['avatar' => $this->format($avatar)]);
    }

    #[OA\Get(
        path: '/api/avatar/options',
        summary: 'Get the full gem-purchasable avatar option catalog, grouped by attribute',
        description: 'Every option is either the free default for its attribute or something the user must buy with gems before they can equip it.',
        tags: ['Avatar'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Option catalog')],
    )]
    public function options(Request $request): JsonResponse
    {
        $user = $request->user();

        $unlockedIds = UserAvatarUnlock::where('user_id', $user->id)->pluck('avatar_option_id')->flip();

        $options = AvatarOption::orderBy('attribute_type')->orderBy('order_number')->get();

        $grouped = [];
        foreach (self::ATTRIBUTE_TYPES as $type) {
            $grouped[$type] = [];
        }

        foreach ($options as $option) {
            $grouped[$option->attribute_type][] = [
                'value' => $option->value,
                'priceGems' => $option->price_gems,
                'isDefault' => $option->is_default,
                'unlocked' => $option->is_default || $unlockedIds->has($option->id),
            ];
        }

        return response()->json(['options' => $grouped]);
    }

    #[OA\Post(
        path: '/api/avatar/unlock',
        summary: 'Spend gems to permanently unlock an avatar option',
        description: 'Pure wallet transaction — no Stripe involved. Once unlocked, an option stays unlocked forever and can be freely re-equipped at any time via PUT /api/avatar.',
        tags: ['Avatar'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['attributeType', 'value'],
            properties: [
                new OA\Property(property: 'attributeType', type: 'string', example: 'hair'),
                new OA\Property(property: 'value', type: 'string', example: 'short01'),
            ],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Option unlocked'),
            new OA\Response(response: 422, description: 'Unknown option, already unlocked, or not enough gems'),
        ],
    )]
    public function unlock(Request $request): JsonResponse
    {
        $data = $request->validate([
            'attributeType' => ['required', 'string', Rule::in(self::ATTRIBUTE_TYPES)],
            'value' => ['required', 'string'],
        ]);

        $option = AvatarOption::where('attribute_type', $data['attributeType'])
            ->where('value', $data['value'])
            ->first();

        if (! $option) {
            return response()->json(['message' => 'Unknown avatar option.'], 422);
        }

        if ($option->is_default) {
            return response()->json(['message' => 'This option is already free.'], 422);
        }

        $user = $request->user();

        $alreadyUnlocked = UserAvatarUnlock::where('user_id', $user->id)
            ->where('avatar_option_id', $option->id)
            ->exists();

        if ($alreadyUnlocked) {
            return response()->json(['message' => 'You already unlocked this option.'], 422);
        }

        return DB::transaction(function () use ($user, $option) {
            UserGameState::firstOrCreate(['user_id' => $user->id]);
            $state = UserGameState::where('user_id', $user->id)->lockForUpdate()->firstOrFail();

            if ($state->gems < $option->price_gems) {
                return response()->json(['message' => 'Not enough gems.'], 422);
            }

            GemLedger::apply($state, -$option->price_gems, 'avatar.unlock');
            $state->save();

            UserAvatarUnlock::create([
                'user_id' => $user->id,
                'avatar_option_id' => $option->id,
                'unlocked_at' => now(),
            ]);

            return response()->json([
                'message' => 'Option unlocked',
                'gems' => $state->gems,
                'attributeType' => $option->attribute_type,
                'value' => $option->value,
            ]);
        });
    }

    #[OA\Put(
        path: '/api/avatar',
        summary: 'Save the user\'s DiceBear avatar configuration',
        description: 'Each submitted value must be either the free default for that attribute or something the user has already unlocked with gems.',
        tags: ['Avatar'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(properties: [
            new OA\Property(property: 'skinColor', type: 'string', nullable: true, example: 'f2d3b1'),
            new OA\Property(property: 'hair', type: 'string', nullable: true, example: 'short01'),
            new OA\Property(property: 'hairColor', type: 'string', nullable: true, example: '2c1b18'),
            new OA\Property(property: 'eyes', type: 'string', nullable: true, example: 'variant01'),
            new OA\Property(property: 'eyebrows', type: 'string', nullable: true, example: 'variant02'),
            new OA\Property(property: 'mouth', type: 'string', nullable: true, example: 'variant03'),
            new OA\Property(property: 'backgroundColor', type: 'string', nullable: true, example: 'b6e3f4'),
        ])),
        responses: [
            new OA\Response(response: 200, description: 'Avatar saved'),
            new OA\Response(response: 422, description: 'One or more values are not unlocked yet'),
        ],
    )]
    public function update(Request $request): JsonResponse
    {
        $data = $request->validate([
            'skinColor' => ['nullable', 'string', 'max:32'],
            'hair' => ['nullable', 'string', 'max:64'],
            'hairColor' => ['nullable', 'string', 'max:32'],
            'eyes' => ['nullable', 'string', 'max:64'],
            'eyebrows' => ['nullable', 'string', 'max:64'],
            'mouth' => ['nullable', 'string', 'max:64'],
            'backgroundColor' => ['nullable', 'string', 'max:32'],
        ]);

        $user = $request->user();
        $unlockedIds = UserAvatarUnlock::where('user_id', $user->id)->pluck('avatar_option_id')->flip();

        foreach (self::ATTRIBUTE_TYPES as $type) {
            $value = $data[$type] ?? null;

            if ($value === null) {
                continue;
            }

            $option = AvatarOption::where('attribute_type', $type)->where('value', $value)->first();

            if (! $option || (! $option->is_default && ! $unlockedIds->has($option->id))) {
                return response()->json(['message' => "You haven't unlocked that {$type} option yet."], 422);
            }
        }

        $avatar = UserAvatar::updateOrCreate(
            ['user_id' => $user->id],
            [
                'skin_color' => $data['skinColor'] ?? null,
                'hair' => $data['hair'] ?? null,
                'hair_color' => $data['hairColor'] ?? null,
                'eyes' => $data['eyes'] ?? null,
                'eyebrows' => $data['eyebrows'] ?? null,
                'mouth' => $data['mouth'] ?? null,
                'background_color' => $data['backgroundColor'] ?? null,
            ],
        );

        return response()->json([
            'message' => 'Avatar saved',
            'avatar' => $this->format($avatar),
        ]);
    }

    private function format(UserAvatar $avatar): array
    {
        return [
            'skinColor' => $avatar->skin_color,
            'hair' => $avatar->hair,
            'hairColor' => $avatar->hair_color,
            'eyes' => $avatar->eyes,
            'eyebrows' => $avatar->eyebrows,
            'mouth' => $avatar->mouth,
            'backgroundColor' => $avatar->background_color,
        ];
    }
}
