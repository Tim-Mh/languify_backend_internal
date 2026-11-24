@props(['action', 'method' => 'POST', 'back', 'backLabel' => 'Back', 'submit' => 'Save', 'return' => null])

{{-- The frame every create/edit form sits in: a back link, the fields in a
     card, and Cancel / Save underneath. `return` is where to go after saving
     (the page the admin came from), carried as a hidden field. --}}
@php $inModal = request()->boolean('modal'); @endphp
<div class="mx-auto max-w-3xl space-y-5">
    @unless ($inModal)
    <a href="{{ $return ?: $back }}" class="inline-flex items-center gap-1 text-sm font-bold text-gray-500 hover:text-gray-900">
        <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
        {{ $backLabel }}
    </a>
    @endunless

    <form action="{{ $action }}" method="POST" {{ $attributes->merge(['class' => 'space-y-5']) }}>
        @csrf
        @if (strtoupper($method) !== 'POST') @method($method) @endif
        @if ($return) <input type="hidden" name="return" value="{{ $return }}"> @endif

        <div class="card space-y-5 p-6">
            {{ $slot }}
        </div>

        <div class="flex justify-end gap-3">
            @if ($inModal)
                <button type="button" data-modal-close class="btn-secondary">Cancel</button>
            @else
                <a href="{{ $return ?: $back }}" class="btn-secondary">Cancel</a>
            @endif
            <button type="submit" class="btn-primary px-6">{{ $submit }}</button>
        </div>
    </form>
</div>
