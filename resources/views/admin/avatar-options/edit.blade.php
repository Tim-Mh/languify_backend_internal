@extends('layouts.admin')

@section('title', 'Edit avatar option price')

@php
    $typeLabels = [
        'skinColor' => 'Skin tone',
        'hair' => 'Hairstyle',
        'hairColor' => 'Hair color',
        'eyes' => 'Eyes',
        'eyebrows' => 'Eyebrows',
        'mouth' => 'Mouth',
        'backgroundColor' => 'Background color',
    ];
    $isColor = in_array($option->attribute_type, ['skinColor', 'hairColor', 'backgroundColor'], true);
    // The web app's default look (src/lib/avatarUrl.js), with this option swapped in.
    $base = ['skinColor' => 'f2d3b1', 'hair' => 'short16', 'hairColor' => '6c4545', 'eyes' => 'variant12', 'eyebrows' => 'variant05', 'mouth' => 'variant15', 'backgroundColor' => 'b6e3f4'];
    $previewUrl = 'https://api.dicebear.com/9.x/adventurer/svg?'.http_build_query(
        ['seed' => 'linguistpath', 'hairProbability' => 100, 'glassesProbability' => 0, 'earringsProbability' => 0] + [$option->attribute_type => $option->value] + $base
    );
    $hex = preg_match('/^[0-9a-fA-F]{6}$/', $option->value) ? $option->value : null;
@endphp

@section('content')
    <x-admin.form-shell :action="route('admin.avatar-options.update', $option)" method="PUT" :back="route('admin.avatar-options.index', ['attribute_type' => $option->attribute_type])" :return="$return" back-label="Back to avatar options" submit="Save price">
        <div class="flex flex-col gap-5 sm:flex-row sm:items-start">
            <div class="shrink-0 text-center">
                <img src="{{ $previewUrl }}" alt="Preview of this option on the default avatar" class="mx-auto h-28 w-28 rounded-2xl bg-gray-100 ring-1 ring-gray-200">
                <p class="mt-1 text-xs text-gray-500">Preview</p>
            </div>

            <dl class="grid min-w-0 flex-1 gap-4 sm:grid-cols-2">
                <div>
                    <dt class="text-xs font-bold text-gray-500">Part of the avatar</dt>
                    <dd class="mt-1 font-bold text-ink-900">{{ $typeLabels[$option->attribute_type] ?? $option->attribute_type }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-bold text-gray-500">{{ $isColor ? 'Color' : 'Style' }}</dt>
                    <dd class="mt-1 flex items-center gap-2">
                        @if ($isColor && $hex)
                            <span class="h-6 w-6 shrink-0 rounded-lg ring-1 ring-gray-200" style="background-color: #{{ $hex }}"></span>
                        @endif
                        <span class="break-all font-mono font-bold text-ink-900">{{ $isColor ? '#'.$option->value : $option->value }}</span>
                    </dd>
                </div>
                <div>
                    <dt class="text-xs font-bold text-gray-500">Who has it</dt>
                    <dd class="mt-1">
                        @if ($option->is_default)
                            <span class="tag bg-emerald-100 text-emerald-800">Free for everyone</span>
                        @else
                            <span class="text-sm text-gray-700">{{ number_format($unlockCount) }} {{ $unlockCount === 1 ? 'learner has' : 'learners have' }} bought it</span>
                        @endif
                    </dd>
                </div>
                <div>
                    <dt class="text-xs font-bold text-gray-500">Position in the app</dt>
                    <dd class="mt-1 text-sm text-gray-700">{{ $option->order_number }}</dd>
                </div>
            </dl>
        </div>

        <div class="border-t border-gray-100 pt-5 sm:max-w-xs">
            <label for="price_gems" class="field-label">Price in gems</label>
            <input type="number" id="price_gems" name="price_gems" min="0" step="1" value="{{ old('price_gems', $option->price_gems) }}" required class="field-input read-only:bg-gray-50 read-only:text-gray-400" @if (\App\Http\Controllers\Admin\AvatarOptionController::isStartingLook($option)) readonly max="0" @endif>
            @if (\App\Http\Controllers\Admin\AvatarOptionController::isStartingLook($option))
                <p class="field-hint font-semibold text-emerald-700">Part of the starting look in the web and mobile apps, so it always stays free.</p>
            @endif
            <p class="field-hint">0 makes it free for everyone. Any other price: learners pay it once to unlock it. Learners who already have it keep it.</p>
            @error('price_gems') <p class="field-error">{{ $message }}</p> @enderror
        </div>
    </x-admin.form-shell>
@endsection
