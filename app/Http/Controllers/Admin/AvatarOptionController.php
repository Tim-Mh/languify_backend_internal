<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ReturnsToPreviousPage;
use App\Http\Controllers\Controller;
use App\Models\AvatarOption;
use App\Models\UserAvatar;
use App\Models\UserAvatarUnlock;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AvatarOptionController extends Controller
{
    use ReturnsToPreviousPage;

    private const ATTRIBUTE_TYPES = ['skinColor', 'hair', 'hairColor', 'eyes', 'eyebrows', 'mouth', 'backgroundColor'];

    /**
     * The look the web and mobile apps fill in for any part a learner has not
     * picked (DEFAULT_AVATAR_CONFIG in both apps). The apps send these values
     * when saving, so they must stay free or saving an avatar fails.
     */
    public const STARTING_LOOK = [
        'skinColor' => 'f2d3b1', 'hair' => 'short16', 'hairColor' => '6c4545', 'eyes' => 'variant12',
        'eyebrows' => 'variant05', 'mouth' => 'variant15', 'backgroundColor' => 'b6e3f4',
    ];

    /** Column in user_avatars for each part. */
    private const AVATAR_COLUMNS = [
        'skinColor' => 'skin_color', 'hair' => 'hair', 'hairColor' => 'hair_color', 'eyes' => 'eyes',
        'eyebrows' => 'eyebrows', 'mouth' => 'mouth', 'backgroundColor' => 'background_color',
    ];

    public static function isStartingLook(AvatarOption $option): bool
    {
        return (self::STARTING_LOOK[$option->attribute_type] ?? null) === $option->value;
    }

    public function index(Request $request): View
    {
        $selectedType = in_array($request->query('attribute_type'), self::ATTRIBUTE_TYPES, true)
            ? $request->query('attribute_type')
            : self::ATTRIBUTE_TYPES[0];

        $options = AvatarOption::where('attribute_type', $selectedType)->orderBy('order_number')->get();

        return view('admin.avatar-options.index', [
            'attributeTypes' => self::ATTRIBUTE_TYPES,
            'selectedType' => $selectedType,
            'options' => $options,
            'typeCounts' => AvatarOption::selectRaw('attribute_type, count(*) as total')->groupBy('attribute_type')->pluck('total', 'attribute_type'),
            'defaultCounts' => AvatarOption::where('is_default', true)->selectRaw('attribute_type, count(*) as total')->groupBy('attribute_type')->pluck('total', 'attribute_type'),
            'unlocks' => UserAvatarUnlock::whereIn('avatar_option_id', $options->pluck('id'))
                ->selectRaw('avatar_option_id, count(*) as total')->groupBy('avatar_option_id')->pluck('total', 'avatar_option_id'),
        ]);
    }

    public function edit(Request $request, AvatarOption $avatar_option): View
    {
        return view('admin.avatar-options.edit', [
            'option' => $avatar_option,
            'unlockCount' => UserAvatarUnlock::where('avatar_option_id', $avatar_option->id)->count(),
            'return' => $this->returnUrl($request),
        ]);
    }

    public function update(Request $request, AvatarOption $avatar_option): RedirectResponse
    {
        // Only the price can be changed here. The option itself (which part
        // of the avatar, which style or color, whether it is free) stays fixed.
        $data = $request->validate([
            'price_gems' => ['required', 'integer', 'min:0'],
        ], [], ['price_gems' => 'price']);

        if ((int) $data['price_gems'] > 0 && self::isStartingLook($avatar_option)) {
            throw ValidationException::withMessages(['price_gems' => 'This is part of the starting look in the apps, so it has to stay free.']);
        }

        $this->setPrice($avatar_option, (int) $data['price_gems']);

        return $this->backTo($request, 'admin.avatar-options.index', 'Price saved.');
    }

    public function updatePrices(Request $request): RedirectResponse
    {
        // Prices for many options at once, sent as option id => price. Only
        // the prices of the options sent are changed, nothing else.
        $data = $request->validate([
            'prices' => ['required', 'array'],
            'prices.*' => ['required', 'integer', 'min:0', 'max:100000'],
        ], [
            'prices.*.required' => 'Every price needs a number.',
            'prices.*.integer' => 'Prices must be whole numbers.',
            'prices.*.min' => 'Prices cannot be below 0.',
            'prices.*.max' => 'Prices cannot be above 100,000 gems.',
        ]);

        $options = AvatarOption::whereIn('id', array_keys($data['prices']))->get();

        $starting = $options->first(fn ($option) => self::isStartingLook($option) && (int) $data['prices'][$option->id] > 0);
        if ($starting) {
            throw ValidationException::withMessages(['prices.'.$starting->id => '"'.$starting->value.'" is part of the starting look in the apps, so it has to stay free.']);
        }

        DB::transaction(function () use ($options, $data) {
            foreach ($options as $option) {
                $this->setPrice($option, (int) $data['prices'][$option->id]);
            }
        });

        $saved = $options->count();

        return back()->with('status', 'Prices saved for '.$saved.' '.($saved === 1 ? 'option' : 'options').'.');
    }

    /**
     * Price 0 means free for everyone; any other price has to be unlocked.
     * When a free option becomes paid, learners already wearing it get it as
     * unlocked, so they keep their look and can still save their avatar.
     */
    private function setPrice(AvatarOption $option, int $price): void
    {
        if ($option->is_default && $price > 0) {
            $column = self::AVATAR_COLUMNS[$option->attribute_type] ?? null;
            $already = UserAvatarUnlock::where('avatar_option_id', $option->id)->pluck('user_id')->flip();
            $now = now();
            $rows = UserAvatar::where($column, $option->value)->pluck('user_id')
                ->reject(fn ($userId) => $already->has($userId))
                ->map(fn ($userId) => ['user_id' => $userId, 'avatar_option_id' => $option->id, 'unlocked_at' => $now, 'created_at' => $now, 'updated_at' => $now])
                ->values()->all();
            foreach (array_chunk($rows, 500) as $chunk) {
                UserAvatarUnlock::insert($chunk);
            }
        }

        $option->update(['price_gems' => $price, 'is_default' => $price === 0]);
    }
}
