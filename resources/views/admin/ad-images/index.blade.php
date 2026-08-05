@extends('layouts.admin')

@section('title', 'Ad Images')

@section('content')
    @if (session('status'))
        <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('status') }}</div>
    @endif

    <div class="bg-white rounded-lg shadow p-4 mb-6">
        <h2 class="font-semibold mb-1">Ad settings</h2>
        <p class="text-sm text-gray-500 mb-3">How long the lesson-complete ad stays up before the learner can continue.</p>
        <form action="{{ route('admin.ad-settings.update') }}" method="POST" class="flex items-end gap-3">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium mb-1">Lesson-complete ad duration (seconds)</label>
                <input type="number" name="interstitial_seconds" min="1" max="60" value="{{ old('interstitial_seconds', $adSetting->interstitial_seconds) }}" class="w-40 border rounded px-3 py-2">
                @error('interstitial_seconds') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save settings</button>
        </form>
    </div>

    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500 max-w-3xl">Independent ad sections, grouped by where they appear. Each rotates through its own creatives in the order below, so the two home slots never show the same ad at the same time. A section with no active creatives simply shows nothing. Subscribers on any paid plan never see ads.</p>
        <a href="{{ route('admin.ad-images.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shrink-0 ml-4">+ Add Ad Image</a>
    </div>

    @foreach ($placementsBySurface as $surface => $placements)
    <h2 class="text-lg font-semibold text-gray-800 mt-8 mb-3 first:mt-0">{{ $surface }}</h2>

    @foreach ($placements as $placement)
        @php($group = $adImagesByPlacement[$placement->value] ?? collect())
        @php($activeCount = $group->where('is_active', true)->count())

    <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
        <div class="flex items-center justify-between px-4 py-3 border-b bg-gray-50">
            <div>
                <h2 class="font-semibold">{{ $placement->label() }}</h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    @if ($activeCount === 0)
                        <span class="text-amber-700">No active creatives — this section is currently hidden in the app.</span>
                    @else
                        {{ $activeCount }} active {{ Str::plural('creative', $activeCount) }}.
                    @endif
                    <span class="text-gray-400">{{ $placement->guidance() }}</span>
                </p>
            </div>
            <span class="text-xs text-gray-400 font-mono">{{ $placement->value }}</span>
        </div>
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Preview</th>
                    <th class="px-4 py-2">Product</th>
                    <th class="px-4 py-2">Link</th>
                    <th class="px-4 py-2">Order</th>
                    <th class="px-4 py-2">Active</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($group as $image)
                    <tr>
                        <td class="px-4 py-2">
                            <img src="{{ $image->url() }}" alt="Ad" class="h-14 w-20 object-cover rounded border">
                        </td>
                        <td class="px-4 py-2">
                            @if ($image->product_name)
                                <span class="text-sm">{{ $image->product_name }}</span>
                            @else
                                <span class="text-gray-400 text-sm">No name</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 max-w-xs">
                            @if ($image->target_url)
                                <a href="{{ $image->target_url }}" target="_blank" rel="noopener" class="text-blue-600 hover:underline break-all text-sm">{{ $image->target_url }}</a>
                            @else
                                <span class="text-gray-400 text-sm">No link</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $image->order_number }}</td>
                        <td class="px-4 py-2">
                            @if ($image->is_active)
                                <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">Active</span>
                            @else
                                <span class="text-gray-600 bg-gray-100 px-2 py-0.5 rounded text-sm">Inactive</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.ad-images.edit', $image) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.ad-images.destroy', $image) }}" method="POST" class="inline" onsubmit="return confirm('Delete this ad image?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">Nothing assigned to this section yet. Add a creative and choose &ldquo;{{ $placement->label() }}&rdquo; as its placement.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endforeach
    @endforeach
@endsection
