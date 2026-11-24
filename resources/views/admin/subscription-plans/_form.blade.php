@php
    $subscription_plan ??= null;
    $interval = old('interval', $subscription_plan?->interval ?? 'month');
    $priceValue = old('amount_dollars', $subscription_plan ? number_format($subscription_plan->amount_cents / 100, 2, '.', '') : '');
    $perks = $subscription_plan ? \App\Enums\PlanKey::tryFrom($subscription_plan->key) : null;
@endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div>
        <label for="title" class="field-label">Plan name</label>
        <input type="text" id="title" name="title" value="{{ old('title', $subscription_plan?->title) }}" required maxlength="255" class="field-input" placeholder="Yearly Plan" data-title>
        <p class="field-hint">Shown in the Store, on receipts and in subscription emails.</p>
        @error('title') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="badge_label" class="field-label">Ribbon <span class="font-normal text-gray-400">(optional)</span></label>
        <input type="text" id="badge_label" name="badge_label" value="{{ old('badge_label', $subscription_plan?->badge_label) }}" maxlength="50" class="field-input" placeholder="BEST VALUE">
        <p class="field-hint">A short highlight printed next to the name. Leave empty for none.</p>
        @error('badge_label') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="amount_dollars" class="field-label">Price in US dollars</label>
        <div class="relative">
            <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center font-bold text-gray-400">$</span>
            <input type="number" id="amount_dollars" name="amount_dollars" value="{{ $priceValue }}" required step="0.01" min="0.01" class="field-input pl-7" placeholder="9.99" data-price>
        </div>
        <p class="field-hint" data-price-preview aria-live="polite"></p>
        @error('amount_dollars') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="interval" class="field-label">Billed every</label>
        <select id="interval" name="interval" class="field-input" data-interval>
            <option value="month" @selected($interval === 'month')>Month</option>
            <option value="year" @selected($interval === 'year')>Year</option>
        </select>
        <p class="field-hint">How often the subscription renews and charges again.</p>
        @error('interval') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div class="sm:col-span-2">
        <label for="savings_label" class="field-label">Savings line <span class="font-normal text-gray-400">(optional)</span></label>
        <input type="text" id="savings_label" name="savings_label" value="{{ old('savings_label', $subscription_plan?->savings_label) }}" maxlength="100" class="field-input" placeholder="Save 38% compared to monthly">
        <p class="field-hint">Shown in green under the price. Not calculated for you, so update it if prices change.</p>
        @error('savings_label') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div class="sm:col-span-2">
        <label for="description" class="field-label">Description <span class="font-normal text-gray-400">(optional)</span></label>
        <textarea id="description" name="description" rows="2" maxlength="500" class="field-input">{{ old('description', $subscription_plan?->description) }}</textarea>
        @error('description') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div class="sm:col-span-2">
        <label for="features_text" class="field-label">What's included</label>
        <textarea id="features_text" name="features_text" rows="5" class="field-input" placeholder="No Ads&#10;100 Max Hearts">{{ old('features_text', $subscription_plan?->features ? implode("\n", $subscription_plan->features) : '') }}</textarea>
        <p class="field-hint">One item per line, shown as a ticked list. This is display text only: writing a perk here does not switch it on.</p>
        @error('features') <p class="field-error">{{ $message }}</p> @enderror
        @error('features_text') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="order_number" class="field-label">Position in the Store</label>
        <input type="number" id="order_number" name="order_number" value="{{ old('order_number', $subscription_plan?->order_number ?? 0) }}" required min="0" class="field-input">
        <p class="field-hint">Lower numbers come first.</p>
        @error('order_number') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <span class="field-label">Product key</span>
        @if ($subscription_plan)
            <p class="rounded-xl bg-gray-50 px-3 py-2.5 font-mono text-sm text-ink-900 ring-1 ring-gray-200">{{ $subscription_plan->key }}</p>
            <p class="field-hint">
                Fixed once the plan is created. Its App Store product id is
                <span class="break-all font-mono font-bold text-ink-800">us.languify.app.sub.{{ $subscription_plan->key }}</span>.
            </p>
        @else
            <p class="rounded-xl bg-gray-50 px-3 py-2.5 font-mono text-sm text-gray-500 ring-1 ring-gray-200" data-key-preview>made from the name</p>
            <p class="field-hint">
                Made from the plan name when you save, and fixed after that. The iPhone app needs an App Store product with the id
                <span class="break-all font-mono font-bold text-ink-800">us.languify.app.sub.</span>followed by this key (a number is added if the key is taken).
            </p>
        @endif
    </div>
</div>

<div class="rounded-xl bg-sky-50 px-4 py-3 text-xs text-sky-900">
    <strong>What a plan unlocks:</strong> every active subscription unlocks the app.
    @if ($perks === \App\Enums\PlanKey::Family)
        This is the <strong>Family</strong> plan, which also gives unlimited hearts, 3 streak freezes a month and sharing with family members.
    @elseif ($perks)
        This plan also gives a 100-heart limit and 1 streak freeze a month.
    @else
        Extra perks (more hearts, streak freezes, family sharing) are built into the plans with the keys <span class="font-mono">monthly</span>, <span class="font-mono">yearly</span> and <span class="font-mono">family</span> only. A new plan gets app access but none of those perks unless a developer adds them.
    @endif
    <br><strong>Where the price applies:</strong> Stripe charges the price above on the web and Android for new subscribers. Apple charges the price set in App Store Connect.
</div>

<div class="divide-y divide-gray-100 border-t border-gray-100">
    <label class="flex cursor-pointer items-start justify-between gap-4 py-4">
        <span>
            <span class="block font-bold text-ink-900">Show in the Store</span>
            <span class="block text-xs text-gray-500">New learners can subscribe. Switched off, it disappears from the Store but current subscribers keep it until they cancel.</span>
        </span>
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $subscription_plan?->is_active ?? true)) class="peer sr-only">
        <span class="relative mt-1 h-6 w-11 shrink-0 rounded-full bg-gray-300 transition after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:bg-brand-500 peer-checked:after:translate-x-5 peer-focus-visible:ring-2 peer-focus-visible:ring-brand-500 peer-focus-visible:ring-offset-2" aria-hidden="true"></span>
    </label>
</div>

@push('scripts')
    <script>
        (() => {
            const price = document.querySelector('[data-price]')
            const interval = document.querySelector('[data-interval]')
            const pricePreview = document.querySelector('[data-price-preview]')
            const showPrice = () => {
                const dollars = parseFloat(price.value)
                pricePreview.textContent = dollars > 0
                    ? 'Learners pay $' + dollars.toFixed(2) + ' every ' + interval.value
                        + (interval.value === 'year' ? ' (about $' + (dollars / 12).toFixed(2) + ' a month).' : '.')
                    : 'Type the price, for example 9.99.'
            }
            price.addEventListener('input', showPrice)
            interval.addEventListener('change', showPrice)
            showPrice()

            // Mirrors Laravel's Str::slug closely enough for a preview.
            const title = document.querySelector('[data-title]')
            const keyPreview = document.querySelector('[data-key-preview]')
            if (keyPreview) {
                const showKey = () => {
                    const slug = title.value.normalize('NFKD').replace(/[̀-ͯ]/g, '').toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '')
                    keyPreview.textContent = slug || 'made from the name'
                }
                title.addEventListener('input', showKey)
                showKey()
            }
        })()
    </script>
@endpush
