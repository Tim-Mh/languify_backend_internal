@php
    $gem_pack ??= null;
    $priceValue = old('amount_dollars', $gem_pack ? number_format($gem_pack->amount_cents / 100, 2, '.', '') : '');
@endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div>
        <label for="title" class="field-label">Name</label>
        <input type="text" id="title" name="title" value="{{ old('title', $gem_pack?->title) }}" required maxlength="255" class="field-input" placeholder="Adventure Pack">
        <p class="field-hint">Shown on the pack in the Store.</p>
        @error('title') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="badge_label" class="field-label">Ribbon <span class="font-normal text-gray-400">(optional)</span></label>
        <input type="text" id="badge_label" name="badge_label" value="{{ old('badge_label', $gem_pack?->badge_label) }}" maxlength="50" class="field-input" placeholder="MOST POPULAR">
        <p class="field-hint">A short highlight printed on top of the pack. Leave empty for none.</p>
        @error('badge_label') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="gems" class="field-label">Gems in the pack</label>
        <input type="number" id="gems" name="gems" value="{{ old('gems', $gem_pack?->gems ?? 1) }}" required min="1" class="field-input" data-gems>
        <p class="field-hint">Added to the learner's balance once payment is confirmed.</p>
        @error('gems') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="amount_dollars" class="field-label">Price in US dollars</label>
        <div class="relative">
            <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center font-bold text-gray-400">$</span>
            <input type="number" id="amount_dollars" name="amount_dollars" value="{{ $priceValue }}" required step="0.01" min="0.01" class="field-input pl-7" placeholder="4.99" data-price>
        </div>
        <p class="field-hint" data-price-preview aria-live="polite"></p>
        @error('amount_dollars') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="order_number" class="field-label">Position in the Store</label>
        <input type="number" id="order_number" name="order_number" value="{{ old('order_number', $gem_pack?->order_number ?? 0) }}" required min="0" class="field-input">
        <p class="field-hint">Lower numbers come first.</p>
        @error('order_number') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="key" class="field-label">Product key</label>
        <input type="text" id="key" name="key" value="{{ old('key', $gem_pack?->key) }}" required maxlength="50" class="field-input font-mono" placeholder="adventure" data-key>
        <p class="field-hint">
            Links this pack to the iPhone app. Its App Store product id must be
            <span class="break-all font-mono font-bold text-ink-800" data-key-preview>us.languify.app.gems.{{ old('key', $gem_pack?->key) ?: 'key' }}</span>,
            created in App Store Connect with exactly this key. Lowercase, no spaces.
        </p>
        @if ($gem_pack)
            <p class="mt-1 text-xs font-semibold text-amber-700">Changing it stops iPhone purchases of this pack crediting gems until App Store Connect has a product with the new id.</p>
        @endif
        @error('key') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="rounded-xl bg-sky-50 px-4 py-3 text-xs text-sky-900">
    <strong>Where the price applies:</strong> the price above is what Stripe charges on the web and Android, from the next purchase on.
    On iPhone, Apple charges the price set for this product in App Store Connect, so change it there too.
</div>

<div class="divide-y divide-gray-100 border-t border-gray-100">
    <label class="flex cursor-pointer items-start justify-between gap-4 py-4">
        <span>
            <span class="block font-bold text-ink-900">Show in the Store</span>
            <span class="block text-xs text-gray-500">Learners can buy it. Switched off, it disappears from the Store but past purchases are kept.</span>
        </span>
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $gem_pack?->is_active ?? true)) class="peer sr-only">
        <span class="relative mt-1 h-6 w-11 shrink-0 rounded-full bg-gray-300 transition after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:bg-brand-500 peer-checked:after:translate-x-5 peer-focus-visible:ring-2 peer-focus-visible:ring-brand-500 peer-focus-visible:ring-offset-2" aria-hidden="true"></span>
    </label>
</div>

@push('scripts')
    <script>
        (() => {
            const price = document.querySelector('[data-price]')
            const gems = document.querySelector('[data-gems]')
            const pricePreview = document.querySelector('[data-price-preview]')
            const key = document.querySelector('[data-key]')
            const keyPreview = document.querySelector('[data-key-preview]')

            const showPrice = () => {
                const dollars = parseFloat(price.value)
                const count = parseInt(gems.value, 10)
                if (!(dollars > 0)) { pricePreview.textContent = 'Type the price, for example 4.99.'; return }
                let text = 'Learners pay $' + dollars.toFixed(2)
                if (count > 0) text += ' for ' + count.toLocaleString() + ' gems (about ' + Math.round(count / dollars).toLocaleString() + ' gems per $1)'
                pricePreview.textContent = text + '.'
            }
            const showKey = () => { keyPreview.textContent = 'us.languify.app.gems.' + (key.value.trim() || 'key') }

            price.addEventListener('input', showPrice)
            gems.addEventListener('input', showPrice)
            key.addEventListener('input', showKey)
            showPrice()
        })()
    </script>
@endpush
