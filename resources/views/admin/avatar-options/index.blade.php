@extends('layouts.admin')

@section('title', 'Avatar options')

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
    $isColor = in_array($selectedType, ['skinColor', 'hairColor', 'backgroundColor'], true);
    // The web app's default look (src/lib/avatarUrl.js), with one part swapped for the option shown.
    $base = ['skinColor' => 'f2d3b1', 'hair' => 'short16', 'hairColor' => '6c4545', 'eyes' => 'variant12', 'eyebrows' => 'variant05', 'mouth' => 'variant15', 'backgroundColor' => 'b6e3f4'];
    $previewUrl = fn ($option) => 'https://api.dicebear.com/9.x/adventurer/svg?'.http_build_query(
        ['seed' => 'linguistpath', 'hairProbability' => 100, 'glassesProbability' => 0, 'earringsProbability' => 0] + [$option->attribute_type => $option->value] + $base
    );
    $defaults = (int) ($defaultCounts[$selectedType] ?? 0);
    $typeLabel = $typeLabels[$selectedType] ?? $selectedType;
@endphp

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">
        <nav class="flex flex-wrap gap-2" aria-label="Part of the avatar">
            @foreach ($attributeTypes as $type)
                @php $isCurrent = $selectedType === $type; @endphp
                <a href="{{ route('admin.avatar-options.index', ['attribute_type' => $type]) }}" @if ($isCurrent) aria-current="true" @endif class="{{ $isCurrent ? 'chip-active' : 'chip' }}">
                    {{ $typeLabels[$type] ?? $type }}
                    <span class="rounded-full px-2 py-0.5 text-xs {{ $isCurrent ? 'bg-white/20' : 'bg-gray-100 text-gray-500' }}">{{ (int) ($typeCounts[$type] ?? 0) }}</span>
                </a>
            @endforeach
        </nav>

        @if ($options->isNotEmpty() && $defaults !== 1)
            <div class="rounded-xl bg-amber-100 px-4 py-3 text-sm font-semibold text-amber-800">
                @if ($defaults === 0)
                    No {{ strtolower($typeLabel) }} option is free, so learners have to spend gems on any {{ strtolower($typeLabel) }} they want to pick.
                @else
                    {{ $defaults }} {{ strtolower($typeLabel) }} options are free. That works, but usually only the starting look is free.
                @endif
            </div>
        @endif

        @if ($options->isNotEmpty())
            @php $priceErrors = collect($errors->getMessages())->filter(fn ($messages, $key) => str_starts_with($key, 'prices'))->flatten()->unique(); @endphp
            <details class="card group" @if ($priceErrors->isNotEmpty()) open @endif>
                <summary class="flex cursor-pointer list-none items-center justify-between gap-3 p-4 [&::-webkit-details-marker]:hidden">
                    <span>
                        <span class="block font-display text-base font-bold text-ink-900">Change all {{ strtolower($typeLabel) }} prices</span>
                        <span class="block text-sm text-gray-500">Set the price of every {{ strtolower($typeLabel) }} option in one place.</span>
                    </span>
                    <svg class="h-5 w-5 shrink-0 text-gray-400 transition group-open:rotate-180" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                </summary>

                <form method="POST" action="{{ route('admin.avatar-options.prices') }}" class="space-y-4 border-t border-gray-100 p-4" data-bulk-prices>
                    @csrf
                    @method('PUT')

                    @if ($priceErrors->isNotEmpty())
                        <div class="rounded-xl bg-red-50 px-4 py-3 text-sm font-semibold text-red-700">
                            @foreach ($priceErrors as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif

                    <div class="flex flex-wrap items-end gap-3">
                        <div>
                            <label for="bulk_price" class="field-label">Set all to</label>
                            <input type="number" id="bulk_price" min="0" max="100000" step="1" inputmode="numeric" class="field-input w-32" placeholder="Gems" data-bulk-price-value>
                        </div>
                        <button type="button" class="btn-secondary" data-bulk-price-apply>Fill every price</button>
                        <p class="field-hint w-full">Fills in every price below. Nothing changes until you press Save prices.</p>
                    </div>

                    <ul class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($options as $option)
                            <li class="flex items-center gap-3 rounded-xl bg-gray-50 p-2 ring-1 ring-gray-100">
                                @if ($isColor)
                                    <span class="h-10 w-10 shrink-0 rounded-xl ring-1 ring-gray-200" style="background-color: #{{ preg_match('/^[0-9a-fA-F]{6}$/', $option->value) ? $option->value : 'ffffff' }}"></span>
                                @else
                                    <img src="{{ $previewUrl($option) }}" alt="" loading="lazy" class="h-10 w-10 shrink-0 rounded-xl bg-gray-100 ring-1 ring-gray-200">
                                @endif
                                <div class="min-w-0 flex-1">
                                    <label for="price_{{ $option->id }}" class="block truncate font-mono text-sm font-bold text-ink-900">{{ $isColor ? '#'.$option->value : $option->value }}</label>
                                    @if (\App\Http\Controllers\Admin\AvatarOptionController::isStartingLook($option))
                                        <span class="block text-xs text-emerald-700">Starting look in the apps, always free</span>
                                    @else
                                        <span data-free-label class="block text-xs text-emerald-700 {{ (int) old('prices.'.$option->id, $option->price_gems) === 0 ? '' : 'hidden' }}">Free for everyone</span>
                                    @endif
                                </div>
                                <div class="flex shrink-0 items-center gap-1.5">
                                    <input type="number" id="price_{{ $option->id }}" name="prices[{{ $option->id }}]" value="{{ old('prices.'.$option->id, $option->price_gems) }}" min="0" max="100000" step="1" required inputmode="numeric" class="field-input w-24 read-only:bg-gray-50 read-only:text-gray-400" @if (\App\Http\Controllers\Admin\AvatarOptionController::isStartingLook($option)) readonly max="0" title="Starting look in the apps, always free" @else data-bulk-price-input @endif>
                                    <span class="text-xs font-semibold text-gray-500">gems</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="flex flex-wrap items-center justify-end gap-3 border-t border-gray-100 pt-4">
                        <p class="text-xs text-gray-500">Learners who already bought an option keep it.</p>
                        <button type="submit" class="btn-primary">Save prices</button>
                    </div>
                </form>
            </details>
        @endif

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($options as $option)
                @php $bought = (int) ($unlocks[$option->id] ?? 0); @endphp
                <article class="card flex items-center gap-4 p-4">
                    @if ($isColor)
                        <span class="h-16 w-16 shrink-0 rounded-2xl ring-1 ring-gray-200" style="background-color: #{{ preg_match('/^[0-9a-fA-F]{6}$/', $option->value) ? $option->value : 'ffffff' }}"></span>
                    @else
                        <img src="{{ $previewUrl($option) }}" alt="" loading="lazy" class="h-16 w-16 shrink-0 rounded-2xl bg-gray-100 ring-1 ring-gray-200">
                    @endif
                    <div class="min-w-0 flex-1">
                        <p class="truncate font-mono text-sm font-bold text-ink-900">{{ $isColor ? '#'.$option->value : $option->value }}</p>
                        <p class="mt-1">
                            @if ($option->is_default)
                                <span class="tag bg-emerald-100 text-emerald-800">Free for everyone</span>
                            @else
                                <span class="tag bg-brand-100 text-brand-700">{{ number_format($option->price_gems) }} gems</span>
                            @endif
                        </p>
                        <p class="mt-1 text-xs text-gray-500">Position {{ $option->order_number }} · {{ $option->is_default ? 'everyone has it' : number_format($bought).' bought' }}</p>
                    </div>
                    <x-admin.row-actions
                        :edit="route('admin.avatar-options.edit', $option)"
                        :name="strtolower($typeLabel).' '.$option->value" />
                </article>
            @empty
                <div class="card p-10 text-center sm:col-span-2 lg:col-span-3">
                    <p class="font-bold text-ink-900">No {{ strtolower($typeLabel) }} options yet.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('scripts')
<script>
    (() => {
        const form = document.querySelector('[data-bulk-prices]')
        if (!form) return
        const value = form.querySelector('[data-bulk-price-value]')
        const fill = () => {
            if (value.value === '' || !value.checkValidity()) {
                value.reportValidity()
                return
            }
            form.querySelectorAll('[data-bulk-price-input]').forEach((input) => { input.value = value.value })
            markFree()
        }
        // 0 means free for everyone, so the label follows what is typed.
        const markFree = () => form.querySelectorAll('[data-bulk-price-input]').forEach((input) => {
            input.closest('li').querySelector('[data-free-label]')?.classList.toggle('hidden', input.value === '' || Number(input.value) !== 0)
        })
        form.addEventListener('input', markFree)
        form.querySelector('[data-bulk-price-apply]').addEventListener('click', fill)
        // Enter in the "Set all to" box fills the list instead of saving.
        value.addEventListener('keydown', (event) => {
            if (event.key === 'Enter') {
                event.preventDefault()
                fill()
            }
        })
    })()
</script>
@endpush
