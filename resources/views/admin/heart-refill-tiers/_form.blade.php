@php $heart_refill_tier ??= null; @endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div>
        <label for="title" class="field-label">Name</label>
        <input type="text" id="title" name="title" value="{{ old('title', $heart_refill_tier?->title) }}" required maxlength="255" class="field-input" placeholder="3 Hearts">
        <p class="field-hint">The main line learners see on the option.</p>
        @error('title') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="subtitle" class="field-label">Second line <span class="font-normal text-gray-400">(optional)</span></label>
        <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', $heart_refill_tier?->subtitle) }}" maxlength="255" class="field-input" placeholder="Best Value">
        <p class="field-hint">Smaller text under the name.</p>
        @error('subtitle') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="hearts" class="field-label">Hearts added</label>
        <input type="number" id="hearts" name="hearts" value="{{ old('hearts', $heart_refill_tier?->hearts ?? 1) }}" required min="1" max="5" class="field-input" data-hearts>
        <p class="field-hint">From 1 to 5. The learner never goes above their heart limit, so 5 always means a full refill for free learners.</p>
        @error('hearts') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="price_gems" class="field-label">Price in gems</label>
        <input type="number" id="price_gems" name="price_gems" value="{{ old('price_gems', $heart_refill_tier?->price_gems ?? 1) }}" required min="1" class="field-input" data-gems>
        <p class="field-hint" data-cost-preview aria-live="polite">Taken from the learner's gem balance. They can't buy it without enough gems.</p>
        @error('price_gems') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="badge_label" class="field-label">Ribbon <span class="font-normal text-gray-400">(optional)</span></label>
        <input type="text" id="badge_label" name="badge_label" value="{{ old('badge_label', $heart_refill_tier?->badge_label) }}" maxlength="50" class="field-input" placeholder="POPULAR">
        <p class="field-hint">A short highlight printed on top. Leave empty for none.</p>
        @error('badge_label') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="order_number" class="field-label">Position</label>
        <input type="number" id="order_number" name="order_number" value="{{ old('order_number', $heart_refill_tier?->order_number ?? 0) }}" required min="0" class="field-input">
        <p class="field-hint">Lower numbers come first.</p>
        @error('order_number') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div class="sm:col-span-2">
        <label for="key" class="field-label">Key</label>
        <input type="text" id="key" name="key" value="{{ old('key', $heart_refill_tier?->key) }}" required maxlength="50" class="field-input font-mono sm:max-w-xs" placeholder="three">
        <p class="field-hint">A short internal id the apps send when a learner buys this refill. Lowercase, no spaces, and different from every other refill. It is not linked to the App Store, since refills are paid in gems.</p>
        @error('key') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="divide-y divide-gray-100 border-t border-gray-100">
    <label class="flex cursor-pointer items-start justify-between gap-4 py-4">
        <span>
            <span class="block font-bold text-ink-900">Offer to learners</span>
            <span class="block text-xs text-gray-500">Shown when hearts run out and on the Hearts page. Switched off, it is hidden and can't be bought.</span>
        </span>
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $heart_refill_tier?->is_active ?? true)) class="peer sr-only">
        <span class="relative mt-1 h-6 w-11 shrink-0 rounded-full bg-gray-300 transition after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:bg-brand-500 peer-checked:after:translate-x-5 peer-focus-visible:ring-2 peer-focus-visible:ring-brand-500 peer-focus-visible:ring-offset-2" aria-hidden="true"></span>
    </label>
</div>

@push('scripts')
    <script>
        (() => {
            const hearts = document.querySelector('[data-hearts]')
            const gems = document.querySelector('[data-gems]')
            const preview = document.querySelector('[data-cost-preview]')
            const base = preview.textContent
            const show = () => {
                const h = parseInt(hearts.value, 10)
                const g = parseInt(gems.value, 10)
                preview.textContent = h > 0 && g > 0
                    ? g.toLocaleString() + ' gems for ' + h + (h === 1 ? ' heart' : ' hearts') + ' (' + Math.round(g / h).toLocaleString() + ' gems per heart). ' + base
                    : base
            }
            hearts.addEventListener('input', show)
            gems.addEventListener('input', show)
            show()
        })()
    </script>
@endpush
