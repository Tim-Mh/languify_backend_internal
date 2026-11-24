@php
    $badge ??= null;
    $defaults ??= [];
    // [label in the picker, what the number means, hint]
    $requirements = [
        'streak' => ['Day streak', 'Days in a row', 'The learner\'s current streak has to be at least this many days.'],
        'total_xp' => ['Total XP', 'XP earned in total', 'All the XP the learner has ever earned.'],
        'total_lessons_completed' => ['Lessons finished', 'Lessons finished in total', 'Every lesson the learner has ever finished.'],
        'perfect_lessons' => ['Perfect lessons', 'Perfect lessons in total', 'Lessons finished with no mistakes, all time.'],
        'units_completed_count' => ['Units finished', 'Units finished in total', 'Whole units finished, all time.'],
        'max_lessons_in_a_day' => ['Lessons in one day', 'Lessons in their best day', 'The most lessons the learner has ever finished in a single day.'],
        'chapter_complete' => ['Finish a chapter', 'Not used', 'Meant to be earned for finishing a chapter. The number is not used, leave it at 0. Note: learners cannot claim this kind of badge at the moment (see the badge list).'],
    ];
    $selectedRequirement = old('requirement_type', $badge?->requirement_type ?? 'streak');
    $tiers ??= \App\Models\BadgeTier::names();
    $selectedTier = old('tier', $badge?->tier ?? ($tiers[0] ?? null));
    $currentImage = $badge?->imageUrl();
@endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label for="title" class="field-label">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $badge?->title) }}" required maxlength="255" class="field-input" placeholder="On a Roll">
        @error('title') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div class="sm:col-span-2">
        <label for="description" class="field-label">Description</label>
        <input type="text" id="description" name="description" value="{{ old('description', $badge?->description) }}" required maxlength="255" class="field-input" placeholder="Reach a 3-day streak">
        <p class="field-hint">One line saying how to earn it.</p>
        @error('description') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="category" class="field-label">Group</label>
        <select id="category" name="category" required class="field-input">
            @foreach (['streak' => 'Streak', 'xp' => 'XP', 'lesson' => 'Lessons'] as $value => $label)
                <option value="{{ $value }}" @selected(old('category', $badge?->category ?? $defaults['category'] ?? 'streak') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        <p class="field-hint">Which group the badge is listed under.</p>
        @error('category') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="order_number" class="field-label">Position in its group</label>
        <input type="number" id="order_number" name="order_number" min="0" value="{{ old('order_number', $badge?->order_number ?? $defaults['order_number'] ?? 0) }}" required class="field-input">
        <p class="field-hint">Lower numbers come first.</p>
        @error('order_number') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="border-t border-gray-100 pt-5">
    <h2 class="font-display text-base font-bold text-ink-900">How it is earned</h2>
    <p class="text-sm text-gray-500">Once a learner reaches the requirement they can claim the badge in the app and get the reward set below.</p>

    <div class="mt-4 grid gap-5 sm:grid-cols-2">
        <div>
            <label for="requirement_type" class="field-label">Requirement</label>
            <select id="requirement_type" name="requirement_type" required class="field-input" data-badge-requirement>
                @foreach ($requirements as $value => [$label, $unit, $hint])
                    <option value="{{ $value }}" data-unit="{{ $unit }}" data-hint="{{ $hint }}" @selected($selectedRequirement === $value)>{{ $label }}</option>
                @endforeach
            </select>
            <p class="field-hint" data-badge-requirement-hint>{{ $requirements[$selectedRequirement][2] ?? '' }}</p>
            @error('requirement_type') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="requirement_value" class="field-label" data-badge-value-label>{{ $requirements[$selectedRequirement][1] ?? 'Amount needed' }}</label>
            <input type="number" id="requirement_value" name="requirement_value" min="0" value="{{ old('requirement_value', $badge?->requirement_value ?? 0) }}" required class="field-input">
            <p class="field-hint">The amount the learner needs to reach.</p>
            @error('requirement_value') <p class="field-error">{{ $message }}</p> @enderror
        </div>
    </div>
</div>

<div class="border-t border-gray-100 pt-5">
    <h2 class="font-display text-base font-bold text-ink-900">Tier and reward</h2>
    <p class="text-sm text-gray-500">The tier picks the badge's look. The reward is what the learner gets when they claim it.</p>

    <div class="mt-4 grid gap-5 sm:grid-cols-4">
        <div>
            <label for="tier" class="field-label">Tier</label>
            <select id="tier" name="tier" required class="field-input">
                @foreach ($tiers as $tierOption)
                    <option value="{{ $tierOption }}" @selected($selectedTier === $tierOption)>{{ ucfirst(strtolower($tierOption)) }}</option>
                @endforeach
            </select>
            @error('tier') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        @foreach ([['gems_reward', 'Gems', 100000], ['xp_reward', 'XP', 100000], ['hearts_reward', 'Hearts', 100]] as [$field, $label, $max])
            <div>
                <label for="{{ $field }}" class="field-label">{{ $label }}</label>
                <input type="number" id="{{ $field }}" name="{{ $field }}" min="0" max="{{ $max }}" required class="field-input"
                       value="{{ old($field, $badge?->{$field} ?? 0) }}">
                @error($field) <p class="field-error">{{ $message }}</p> @enderror
            </div>
        @endforeach
    </div>
    <p class="field-hint">Hearts never go above the learner's maximum. Subscribers get their usual gem bonus on top.</p>
</div>

<div class="border-t border-gray-100 pt-5">
    <h2 class="font-display text-base font-bold text-ink-900">Picture</h2>
    <p class="text-sm text-gray-500">Upload your own picture for this badge. Without one, the badge uses the built-in picture for its group and tier (if there is one).</p>

    <div class="mt-4 flex flex-wrap items-start gap-5">
        <div class="flex h-24 w-24 shrink-0 items-center justify-center rounded-2xl bg-gray-50 ring-1 ring-gray-100">
            <img @if ($currentImage) src="{{ $currentImage }}" @endif alt="Badge picture preview" class="h-20 w-20 object-contain {{ $currentImage ? '' : 'hidden' }}" data-badge-image-preview>
            <span class="text-xs font-semibold text-gray-400 {{ $currentImage ? 'hidden' : '' }}" data-badge-image-empty>No picture</span>
        </div>
        <div class="min-w-0 flex-1 space-y-3">
            <div>
                <label for="image" class="field-label">{{ $badge?->image_path ? 'Replace picture' : 'Upload a picture' }}</label>
                <input type="file" id="image" name="image" accept="image/png,image/jpeg,image/webp" class="field-input" data-badge-image-input>
                <p class="field-hint">PNG, JPG or WEBP, up to 1 MB. A square picture with a see-through background looks best.</p>
                @error('image') <p class="field-error">{{ $message }}</p> @enderror
            </div>
            @if ($badge?->image_path)
                <label class="flex cursor-pointer items-center gap-2 text-sm font-semibold text-ink-800">
                    <input type="checkbox" name="remove_image" value="1" @checked(old('remove_image')) class="h-4 w-4 rounded border-gray-300 text-brand-600 focus:ring-brand-500" data-badge-image-remove>
                    Remove uploaded image
                </label>
            @endif
        </div>
    </div>
</div>

<div class="divide-y divide-gray-100 border-t border-gray-100">
    <label class="flex cursor-pointer items-start justify-between gap-4 py-4">
        <span>
            <span class="block font-bold text-ink-900">Can be claimed</span>
            <span class="block text-xs text-gray-500">Switched off, nobody new can claim it. Learners who already have it keep it.</span>
        </span>
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $badge?->is_active ?? true)) class="peer sr-only">
        <span class="relative mt-1 h-6 w-11 shrink-0 rounded-full bg-gray-300 transition after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:bg-brand-500 peer-checked:after:translate-x-5 peer-focus-visible:ring-2 peer-focus-visible:ring-brand-500 peer-focus-visible:ring-offset-2" aria-hidden="true"></span>
    </label>
</div>

@isset($awardedCount)
    <p class="text-xs text-gray-500">{{ number_format($awardedCount) }} {{ $awardedCount === 1 ? 'learner has' : 'learners have' }} claimed this badge. Changing the requirement does not take it away from them.</p>
@endisset

@push('scripts')
<script>
    (() => {
        const select = document.querySelector('[data-badge-requirement]')
        const sync = () => {
            const option = select.selectedOptions[0]
            document.querySelector('[data-badge-requirement-hint]').textContent = option.dataset.hint
            document.querySelector('[data-badge-value-label]').textContent = option.dataset.unit
        }
        select.addEventListener('change', sync)
    })()

    ;(() => {
        const input = document.querySelector('[data-badge-image-input]')
        const preview = document.querySelector('[data-badge-image-preview]')
        const empty = document.querySelector('[data-badge-image-empty]')
        const remove = document.querySelector('[data-badge-image-remove]')
        const original = preview.getAttribute('src')
        let objectUrl = null

        const show = (src) => {
            preview.classList.toggle('hidden', !src)
            empty.classList.toggle('hidden', !!src)
            if (src) preview.src = src
        }

        input.addEventListener('change', () => {
            if (objectUrl) URL.revokeObjectURL(objectUrl)
            const file = input.files[0]
            objectUrl = file ? URL.createObjectURL(file) : null
            if (file && remove) remove.checked = false
            show(objectUrl || original)
        })

        remove?.addEventListener('change', () => {
            if (remove.checked) {
                input.value = ''
                if (objectUrl) URL.revokeObjectURL(objectUrl)
                objectUrl = null
                preview.classList.add('hidden')
                empty.textContent = 'Uploaded picture will be removed'
                empty.classList.remove('hidden')
            } else {
                empty.textContent = 'No picture'
                show(original)
            }
        })
    })()
</script>
@endpush
