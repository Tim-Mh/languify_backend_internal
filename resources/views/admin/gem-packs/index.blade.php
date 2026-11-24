@extends('layouts.admin')

@section('title', 'Gem packs')

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">
        <div class="flex flex-wrap items-start justify-end gap-4">
            <a href="{{ route('admin.gem-packs.create') }}" class="btn-primary">
                <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Add gem pack
            </a>
        </div>


        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($gemPacks as $pack)
                @php($sold = (int) ($sales[$pack->key] ?? 0))
                <article class="card relative flex flex-col p-5 {{ $pack->is_active ? '' : 'opacity-75' }}">
                    <div class="flex items-start justify-between gap-3">
                        <span class="tag bg-gray-100 text-gray-600" title="Position in the Store">#{{ $pack->order_number }}</span>
                        @if ($pack->is_active)
                            <span class="tag bg-emerald-100 text-emerald-800">In the Store</span>
                        @else
                            <span class="tag bg-gray-200 text-gray-600">Hidden</span>
                        @endif
                    </div>

                    {{-- Roughly how the pack looks in the learner's Store. --}}
                    <div class="mt-3 rounded-2xl bg-gradient-to-b from-brand-50 to-white p-5 text-center ring-1 ring-brand-100">
                        <div class="flex h-6 justify-center">
                            @if ($pack->badge_label)
                                <span class="tag bg-brand-500 text-white">{{ $pack->badge_label }}</span>
                            @endif
                        </div>
                        <div class="mt-1 text-4xl" aria-hidden="true">💎</div>
                        <p class="mt-1 font-display text-2xl font-bold text-ink-900">{{ number_format($pack->gems) }} gems</p>
                        <p class="text-sm font-bold text-gray-600">{{ $pack->title }}</p>
                        @if ($pack->description)
                            <p class="mt-1 text-xs text-gray-500">{{ $pack->description }}</p>
                        @endif
                        <p class="mt-3 font-display text-xl font-bold text-brand-600">${{ number_format($pack->amount_cents / 100, 2) }}</p>
                    </div>

                    <dl class="mt-4 space-y-2 text-sm">
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-gray-500">Value</dt>
                            <dd class="font-bold text-ink-900">{{ number_format($pack->gems / max($pack->amount_cents / 100, 0.01)) }} gems per $1</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-gray-500">Paid purchases</dt>
                            <dd class="font-bold text-ink-900">{{ number_format($sold) }}</dd>
                        </div>
                        <div class="min-w-0">
                            <dt class="text-gray-500">iPhone App Store product id</dt>
                            <dd class="mt-1 min-w-0">
                                <button type="button" data-copy="us.languify.app.gems.{{ $pack->key }}" title="Copy the App Store product id"
                                        class="block w-full truncate rounded-lg bg-gray-50 px-2 py-1 text-left font-mono text-xs text-gray-500 ring-1 ring-gray-200 hover:text-ink-900">us.languify.app.gems.{{ $pack->key }}</button>
                            </dd>
                        </div>
                    </dl>

                    <div class="mt-auto pt-4"><div class="flex items-center justify-between gap-2 border-t border-gray-100 pt-3">
                        <a href="{{ route('admin.gem-purchases.index', ['pack' => $pack->key]) }}" class="text-sm font-bold text-brand-600 hover:underline">See purchases</a>
                        <x-admin.row-actions
                            :edit="route('admin.gem-packs.edit', $pack)"
                            :delete="route('admin.gem-packs.destroy', $pack)"
                            :name="'gem pack '.$pack->title"
                            :confirm="'The pack leaves the Store, and iPhone purchases of us.languify.app.gems.'.$pack->key.' will no longer credit any gems. Past purchases stay on record. To stop selling it for now, switch it off instead.'" />
                    </div></div>
                </article>
            @empty
                <div class="card p-10 text-center sm:col-span-2 lg:col-span-3">
                    <p class="font-bold text-ink-900">No gem packs yet.</p>
                    <p class="mt-1 text-sm text-gray-500">The Store's gem section stays empty until you add one.</p>
                    <a href="{{ route('admin.gem-packs.create') }}" class="mt-2 inline-block text-sm font-bold text-brand-600 hover:underline">Add the first pack</a>
                </div>
            @endforelse
        </div>

        <div>{{ $gemPacks->links() }}</div>
    </div>
@endsection

@push('scripts')
    <script>
        // One click copies the whole product id, for pasting into App Store Connect.
        document.addEventListener('click', (event) => {
            const button = event.target.closest('[data-copy]')
            if (!button) return
            navigator.clipboard?.writeText(button.dataset.copy).then(() => {
                const text = button.textContent
                button.textContent = 'Copied'
                setTimeout(() => { button.textContent = text }, 1200)
            })
        })
    </script>
@endpush
