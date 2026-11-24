@php
    $tier ??= null;
    $currentImage = $tier?->imageUrl();
@endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div>
        <label for="name" class="field-label">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $tier?->name) }}" required maxlength="50" class="field-input" placeholder="Gold">
        <p class="field-hint">Shown to learners on the leaderboard.</p>
        @error('name') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="order_number" class="field-label">Step on the ladder</label>
        <input type="number" id="order_number" name="order_number" min="0" value="{{ old('order_number', $tier?->order_number ?? $nextOrder ?? 1) }}" required class="field-input">
        <p class="field-hint">1 is the starting league, 2 the next one up, and so on. Keep the numbers one apart with no gaps: learners only move to the league numbered exactly one above or below.</p>
        @error('order_number') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="border-t border-gray-100 pt-5">
    <h2 class="font-display text-base font-bold text-ink-900">Reward for being promoted into this league</h2>
    <p class="text-sm text-gray-500">Paid once, at the Monday rollover, to each learner who moves up into this league. Leave both at 0 for the starting league, since nobody is promoted into it.</p>

    <div class="mt-4 grid gap-5 sm:grid-cols-2">
        <div>
            <label for="promotion_gems" class="field-label">Gems</label>
            <input type="number" id="promotion_gems" name="promotion_gems" min="0" value="{{ old('promotion_gems', $tier?->promotion_gems ?? 0) }}" required class="field-input">
            @error('promotion_gems') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="promotion_xp" class="field-label">XP</label>
            <input type="number" id="promotion_xp" name="promotion_xp" min="0" value="{{ old('promotion_xp', $tier?->promotion_xp ?? 0) }}" required class="field-input">
            @error('promotion_xp') <p class="field-error">{{ $message }}</p> @enderror
        </div>
    </div>
</div>

<div class="border-t border-gray-100 pt-5">
    <h2 class="font-display text-base font-bold text-ink-900">Picture</h2>
    <p class="text-sm text-gray-500">Upload your own picture for this league. Without one, the league uses the built-in picture for its name (if there is one).</p>

    <div class="mt-4 flex flex-wrap items-start gap-5">
        <div class="flex h-24 w-24 shrink-0 items-center justify-center rounded-2xl bg-gray-50 ring-1 ring-gray-100">
            <img @if ($currentImage) src="{{ $currentImage }}" @endif alt="League picture preview" class="h-20 w-20 object-contain {{ $currentImage ? '' : 'hidden' }}" data-league-image-preview>
            <span class="text-xs font-semibold text-gray-400 {{ $currentImage ? 'hidden' : '' }}" data-league-image-empty>No picture</span>
        </div>
        <div class="min-w-0 flex-1 space-y-3">
            <div>
                <label for="image" class="field-label">{{ $tier?->image_path ? 'Replace picture' : 'Upload a picture' }}</label>
                <input type="file" id="image" name="image" accept="image/png,image/jpeg,image/webp" class="field-input" data-league-image-input>
                <p class="field-hint">PNG, JPG or WEBP, up to 1 MB. A square picture with a see-through background looks best.</p>
                @error('image') <p class="field-error">{{ $message }}</p> @enderror
            </div>
            @if ($tier?->image_path)
                <label class="flex cursor-pointer items-center gap-2 text-sm font-semibold text-ink-800">
                    <input type="checkbox" name="remove_image" value="1" @checked(old('remove_image')) class="h-4 w-4 rounded border-gray-300 text-brand-600 focus:ring-brand-500" data-league-image-remove>
                    Remove uploaded image
                </label>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    (() => {
        const input = document.querySelector('[data-league-image-input]')
        const preview = document.querySelector('[data-league-image-preview]')
        const empty = document.querySelector('[data-league-image-empty]')
        const remove = document.querySelector('[data-league-image-remove]')
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
