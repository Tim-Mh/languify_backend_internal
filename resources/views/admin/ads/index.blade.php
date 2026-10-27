@extends('layouts.admin')

@section('title', 'Ads')

@section('content')
    @if (session('status'))
        <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('status') }}</div>
    @endif

    <div class="flex flex-wrap items-start justify-between gap-4 mb-6">
        <p class="text-sm text-gray-500 max-w-3xl">
            Each product can have many images, and every image is one ad. Ads alternate between products and the order
            is shuffled automatically on every visit. The home sidebar's top and bottom cards share one list and always show
            two different ads. Subscribers on any paid plan and admins never see ads.
        </p>
        <div class="flex gap-2 shrink-0">
            <a href="{{ route('admin.ads.stats') }}" class="border border-gray-300 bg-white px-4 py-2 rounded hover:bg-gray-50">View stats</a>
            <a href="{{ route('admin.ads.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Ad</a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-4 mb-8">
        <h2 class="font-semibold mb-1">Ad settings</h2>
        <form action="{{ route('admin.ad-settings.update') }}" method="POST" class="flex flex-wrap items-end gap-6" data-settings-form>
            @csrf
            @method('PUT')
            <div>
                <label for="sidebar_seconds" class="block text-sm text-gray-600 mb-1">Seconds each home sidebar ad stays up before the next one</label>
                <input id="sidebar_seconds" type="number" name="sidebar_seconds" min="2" max="120" value="{{ old('sidebar_seconds', $adSetting->sidebar_seconds) }}" class="w-32 border rounded px-3 py-2">
                @error('sidebar_seconds') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="interstitial_seconds" class="block text-sm text-gray-600 mb-1">Seconds before the learner can continue after the lesson-complete ad</label>
                <input id="interstitial_seconds" type="number" name="interstitial_seconds" min="1" max="60" value="{{ old('interstitial_seconds', $adSetting->interstitial_seconds) }}" class="w-32 border rounded px-3 py-2">
                @error('interstitial_seconds') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            {{-- Only offered once a value has actually changed. --}}
            <button type="submit" class="hidden bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" data-settings-save>Save</button>
        </form>
    </div>

    @foreach ($placements as $placement)
        @php($campaigns = $campaignsByPlacement[$placement->value] ?? collect())

        <section class="mb-8">
            <div class="flex flex-wrap items-baseline justify-between gap-2 mb-3">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">{{ $placement->label() }}</h2>
                    <p class="text-xs text-gray-500">{{ $placement->surface() }} &middot; {{ $placement->guidance() }}</p>
                </div>
                <a href="{{ route('admin.ads.create', ['placement' => $placement->value]) }}" class="text-sm text-blue-600 hover:underline">+ Add to this placement</a>
            </div>

            <div class="bg-white rounded-lg shadow divide-y">
                @forelse ($campaigns as $campaign)
                    @php($showing = $campaign->ads->where('is_active', true)->count())
                    <div class="p-4">
                        <div class="flex flex-wrap items-start justify-between gap-4">
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-2">
                                    <span class="font-semibold text-orange-700">{{ $campaign->product_name }}</span>
                                    @if ($campaign->is_active)
                                        <span class="text-xs text-green-700 bg-green-100 px-2 py-0.5 rounded">Showing</span>
                                    @else
                                        <span class="text-xs text-gray-600 bg-gray-100 px-2 py-0.5 rounded">Hidden</span>
                                    @endif
                                    <span class="text-xs text-gray-500">{{ $showing }} of {{ $campaign->ads->count() }} {{ Str::plural('image', $campaign->ads->count()) }} showing</span>
                                </div>
                                <a href="{{ $campaign->link_url }}" target="_blank" rel="noopener" class="text-sm text-blue-600 hover:underline break-all">{{ $campaign->link_url }}</a>
                                <p class="text-xs text-gray-500 mt-1">
                                    {{ $monthName }}: <span class="font-medium text-gray-700">{{ number_format($monthly[$campaign->id]['views']) }}</span> views,
                                    <span class="font-medium text-gray-700">{{ number_format($monthly[$campaign->id]['clicks']) }}</span> clicks
                                </p>
                            </div>
                            <div class="flex items-center gap-3 shrink-0">
                                <form action="{{ route('admin.ad-campaigns.toggle', $campaign) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" role="switch" aria-checked="{{ $campaign->is_active ? 'true' : 'false' }}" aria-label="Show {{ $campaign->product_name }}"
                                        class="relative inline-flex h-6 w-11 items-center rounded-full transition {{ $campaign->is_active ? 'bg-green-500' : 'bg-gray-300' }}">
                                        <span class="inline-block h-5 w-5 rounded-full bg-white shadow transform transition {{ $campaign->is_active ? 'translate-x-5' : 'translate-x-0.5' }}"></span>
                                    </button>
                                </form>
                                <a href="{{ route('admin.ad-campaigns.edit', $campaign) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('admin.ad-campaigns.destroy', $campaign) }}" method="POST"
                                    data-confirm="All {{ $campaign->ads->count() }} of its images are deleted too, along with their views and clicks." data-confirm-title="Delete {{ $campaign->product_name }}?">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </div>
                        </div>

                        @if ($campaign->ads->isNotEmpty())
                            <div class="flex gap-2 overflow-x-auto mt-3 pb-1">
                                @foreach ($campaign->ads as $ad)
                                    <img src="{{ $ad->url() }}" alt="{{ $ad->image_alt }}" loading="lazy"
                                        class="h-16 w-auto rounded border shrink-0 {{ $ad->is_active ? '' : 'opacity-30 grayscale' }}"
                                        title="{{ $ad->is_active ? 'Showing' : 'Hidden' }}">
                                @endforeach
                            </div>
                        @endif
                    </div>
                @empty
                    <p class="p-6 text-center text-sm text-gray-500">No ads in this placement yet, so it shows nothing.</p>
                @endforelse
            </div>
        </section>
    @endforeach
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
