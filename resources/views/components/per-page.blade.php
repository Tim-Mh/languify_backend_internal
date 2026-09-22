@props(['paginator', 'noun' => 'records'])

{{-- Rows-per-page control plus the count line, shared by every paginated admin
     list so they all read the same way. The form carries the current filters
     through as hidden fields: changing the page size must not silently drop
     the search someone already typed. --}}
<div class="flex flex-wrap items-center justify-between gap-3 mb-3">
    <form method="GET" class="flex items-center gap-2">
        @foreach (request()->except(['per_page', 'page']) as $key => $value)
            @if (is_array($value))
                @foreach ($value as $item)
                    <input type="hidden" name="{{ $key }}[]" value="{{ $item }}">
                @endforeach
            @else
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach

        <label for="per_page" class="text-sm text-gray-500">Show</label>
        <select id="per_page" name="per_page" onchange="this.form.submit()"
                class="border border-gray-200 rounded px-2 py-1 text-sm bg-white">
            @foreach (\App\Support\PerPage::OPTIONS as $option)
                <option value="{{ $option }}" @selected($paginator->perPage() === $option)>{{ $option }}</option>
            @endforeach
        </select>
        <span class="text-sm text-gray-500">per page</span>

        {{-- Without JavaScript the onchange handler never fires, so keep a real
             submit button for that case rather than stranding the control. --}}
        <noscript>
            <button type="submit" class="bg-gray-900 text-white text-sm px-3 py-1 rounded">Apply</button>
        </noscript>
    </form>

    <p class="text-sm text-gray-500">
        @if ($paginator->total() === 0)
            No {{ $noun }} found
        @else
            Showing
            <span class="font-medium text-gray-700">{{ number_format($paginator->firstItem()) }}</span>
            to
            <span class="font-medium text-gray-700">{{ number_format($paginator->lastItem()) }}</span>
            of
            <span class="font-medium text-gray-700">{{ number_format($paginator->total()) }}</span>
            {{ $paginator->total() === 1 ? \Illuminate\Support\Str::singular($noun) : $noun }}
        @endif
    </p>
</div>
