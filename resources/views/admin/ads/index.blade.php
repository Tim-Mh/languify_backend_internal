@extends('layouts.admin')

@section('title', 'Ads')

@php
    // Where each placement appears, in plain words for the admin.
    $where = [
        'home_sidebar' => 'The two small cards in the right-hand sidebar of the website home page. One list feeds both cards and they always show two different products.',
        'lesson_complete' => 'A large popup on the website, shown right after a learner finishes a lesson.',
        'mobile_lesson_complete' => 'A full-screen ad in the mobile app, shown right after a learner finishes a lesson.',
    ];
    $plusIcon = 'M12 4.5v15m7.5-7.5h-15';
@endphp

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">

        {{-- Timing settings --}}
        <section class="card p-5" aria-labelledby="settings-heading">
            <h2 id="settings-heading" class="font-display text-lg font-bold text-ink-900">Timing</h2>
            <p class="mt-1 text-sm text-gray-500">Applies to every ad. Changes reach the website and app the next time a learner loads a page.</p>
            <form action="{{ route('admin.ad-settings.update') }}" method="POST" class="mt-4 grid gap-5 sm:grid-cols-2 lg:grid-cols-[1fr_1fr_auto] lg:items-end" data-settings-form>
                @csrf
                @method('PUT')
                <div>
                    <label for="sidebar_seconds" class="field-label">Home sidebar: seconds per ad</label>
                    <input id="sidebar_seconds" type="number" name="sidebar_seconds" min="2" max="120" value="{{ old('sidebar_seconds', $adSetting->sidebar_seconds) }}" class="field-input max-w-[10rem]">
                    <p class="field-hint">How long each sidebar ad stays up before the next one slides in. 2 to 120.</p>
                    @error('sidebar_seconds') <p class="field-error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="interstitial_seconds" class="field-label">After a lesson: seconds before Continue</label>
                    <input id="interstitial_seconds" type="number" name="interstitial_seconds" min="1" max="60" value="{{ old('interstitial_seconds', $adSetting->interstitial_seconds) }}" class="field-input max-w-[10rem]">
                    <p class="field-hint">How long the learner waits on the after-lesson ad before they can close it and move on. 1 to 60.</p>
                    @error('interstitial_seconds') <p class="field-error">{{ $message }}</p> @enderror
                </div>
                {{-- Only offered once a value has actually changed. --}}
                <button type="submit" class="btn-primary hidden px-6 lg:mb-6" data-settings-save>Save timing</button>
            </form>
        </section>

        @foreach ($placements as $placement)
            @php
                $campaigns = $campaignsByPlacement[$placement->value] ?? collect();
                $liveProducts = $campaigns->where('is_active', true);
                $liveImages = $liveProducts->sum(fn ($campaign) => $campaign->ads->where('is_active', true)->count());
                [$boxWidth, $boxHeight] = $placement->box();
            @endphp

            <section class="space-y-3" aria-labelledby="placement-{{ $placement->value }}">
                <div class="card p-5">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div class="min-w-0 max-w-2xl">
                            <div class="flex flex-wrap items-center gap-2">
                                <h2 id="placement-{{ $placement->value }}" class="font-display text-lg font-bold text-ink-900">{{ $placement->label() }}</h2>
                                <span class="tag {{ $placement->surface() === 'Mobile app' ? 'bg-sky-100 text-sky-800' : 'bg-brand-100 text-brand-700' }}">{{ $placement->surface() }}</span>
                            </div>
                            <div class="mt-2 flex flex-wrap gap-1.5">
                                <span class="tag {{ $liveProducts->count() ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">{{ $liveProducts->count() }} of {{ $campaigns->count() }} {{ Str::plural('product', $campaigns->count()) }} live</span>
                                <span class="tag {{ $liveImages ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">{{ $liveImages }} live {{ Str::plural('image', $liveImages) }}</span>
                            </div>
                            <p class="mt-1 text-sm text-gray-600">{{ $where[$placement->value] ?? '' }}</p>
                            <p class="mt-2 text-xs text-gray-500">
                                <span class="font-bold text-ink-800">Ideal image:</span> {{ $placement->guidance() }}
                                Larger images are shrunk to fit {{ $boxWidth }}&times;{{ $boxHeight }}.
                            </p>
                        </div>
                        <a href="{{ route('admin.ads.create', ['placement' => $placement->value]) }}" class="btn-primary shrink-0">
                            <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $plusIcon }}" /></svg>
                            Add product
                        </a>
                    </div>
                </div>

                @if ($campaigns->isEmpty())
                    <div class="card p-8 text-center">
                        <p class="font-bold text-ink-900">No products here yet, so this spot shows nothing.</p>
                        <a href="{{ route('admin.ads.create', ['placement' => $placement->value]) }}" class="mt-2 inline-block text-sm font-bold text-brand-600 hover:underline">Add the first one</a>
                    </div>
                @else
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        @foreach ($campaigns as $campaign)
                            @php($showing = $campaign->ads->where('is_active', true)->count())
                            <article class="card flex min-w-0 flex-col p-5">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="min-w-0">
                                        <h3 class="truncate font-display text-base font-bold text-ink-900">{{ $campaign->product_name }}</h3>
                                        <a href="{{ $campaign->link_url }}" target="_blank" rel="noopener" class="block truncate text-sm font-semibold text-brand-600 hover:underline" title="{{ $campaign->link_url }}">{{ $campaign->link_url }}</a>
                                    </div>
                                    {{-- Saves immediately: the switch submits its own small form. --}}
                                    <form action="{{ route('admin.ad-campaigns.toggle', $campaign) }}" method="POST" class="flex shrink-0 flex-col items-end gap-1">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" role="switch" aria-checked="{{ $campaign->is_active ? 'true' : 'false' }}" aria-label="Show {{ $campaign->product_name }}"
                                            class="relative h-6 w-11 rounded-full transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 {{ $campaign->is_active ? 'bg-emerald-500' : 'bg-gray-300' }}">
                                            <span class="absolute left-0.5 top-0.5 h-5 w-5 rounded-full bg-white shadow transition {{ $campaign->is_active ? 'translate-x-5' : '' }}"></span>
                                        </button>
                                        <span class="text-xs font-bold {{ $campaign->is_active ? 'text-emerald-700' : 'text-gray-500' }}">{{ $campaign->is_active ? 'Live' : 'Off' }}</span>
                                    </form>
                                </div>

                                <div class="mt-3 flex flex-wrap gap-1.5">
                                    <span class="tag {{ $showing ? 'bg-gray-100 text-gray-700' : 'bg-amber-100 text-amber-800' }}">{{ $showing }} of {{ $campaign->ads->count() }} {{ Str::plural('image', $campaign->ads->count()) }} on</span>
                                    <span class="tag bg-gray-100 text-gray-700" title="Views and clicks so far this month">{{ $monthName }}: {{ number_format($monthly[$campaign->id]['views']) }} views, {{ number_format($monthly[$campaign->id]['clicks']) }} clicks</span>
                                </div>

                                @if ($campaign->ads->isNotEmpty())
                                    <div class="mt-3 flex flex-wrap gap-2">
                                        @foreach ($campaign->ads as $ad)
                                            <img src="{{ $ad->url() }}" alt="{{ $ad->image_alt }}" loading="lazy"
                                                class="h-16 w-auto shrink-0 rounded-lg bg-gray-50 ring-1 ring-gray-200 {{ $ad->is_active ? '' : 'opacity-30 grayscale' }}"
                                                title="{{ $ad->is_active ? 'On' : 'Off' }}">
                                        @endforeach
                                    </div>
                                @else
                                    <p class="mt-3 text-sm font-semibold text-amber-700">No images yet. Edit to add some.</p>
                                @endif

                                <div class="h-4"></div>
                                <div class="mt-auto flex items-center justify-between gap-2 border-t border-gray-100 pt-3">
                                    <a href="{{ route('admin.ad-campaigns.edit', $campaign) }}" class="text-sm font-bold text-brand-600 hover:underline">Edit details and images</a>
                                    <x-admin.row-actions
                                        :delete="route('admin.ad-campaigns.destroy', $campaign)"
                                        :name="$campaign->product_name"
                                        confirm="All {{ $campaign->ads->count() }} of its images are deleted too, along with their views and clicks." />
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </section>
        @endforeach
    </div>
@endsection

@push('scripts')
<script>
    (() => {
        const form = document.querySelector('[data-settings-form]')
        const save = form.querySelector('[data-settings-save]')
        const inputs = [...form.querySelectorAll('input[type=number]')]
        const initial = inputs.map((input) => input.value)
        const changed = () => inputs.some((input, i) => input.value !== initial[i])
        inputs.forEach((input) => input.addEventListener('input', () => save.classList.toggle('hidden', !changed())))
    })()
</script>
@endpush
