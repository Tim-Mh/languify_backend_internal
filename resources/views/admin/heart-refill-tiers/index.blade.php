@extends('layouts.admin')

@section('title', 'Heart refills')

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">
        <div class="flex flex-wrap items-start justify-end gap-4">
            <a href="{{ route('admin.heart-refill-tiers.create') }}" class="btn-primary">
                <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Add heart refill
            </a>
        </div>


        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($heartRefillTiers as $tier)
                <article class="card flex flex-col p-5 {{ $tier->is_active ? '' : 'opacity-75' }}">
                    <div class="flex items-start justify-between gap-3">
                        <span class="tag bg-gray-100 text-gray-600" title="Position in the list">#{{ $tier->order_number }}</span>
                        @if ($tier->is_active)
                            <span class="tag bg-emerald-100 text-emerald-800">Offered</span>
                        @else
                            <span class="tag bg-gray-200 text-gray-600">Hidden</span>
                        @endif
                    </div>

                    {{-- Roughly how the option looks to a learner. --}}
                    <div class="mt-3 rounded-2xl bg-gradient-to-b from-rose-50 to-white p-5 text-center ring-1 ring-rose-100">
                        <div class="flex h-6 justify-center">
                            @if ($tier->badge_label)
                                <span class="tag bg-brand-500 text-white">{{ $tier->badge_label }}</span>
                            @endif
                        </div>
                        <div class="mt-1 text-2xl tracking-tight" aria-label="{{ $tier->hearts }} hearts">{{ str_repeat('❤️', $tier->hearts) }}</div>
                        <p class="mt-1 font-display text-xl font-bold text-ink-900">{{ $tier->title }}</p>
                        @if ($tier->subtitle)
                            <p class="text-sm text-gray-500">{{ $tier->subtitle }}</p>
                        @endif
                        <p class="mt-3 inline-flex items-center gap-1 rounded-full bg-white px-3 py-1 font-display text-lg font-bold text-sky-700 ring-1 ring-sky-100">
                            <span aria-hidden="true">💎</span> {{ number_format($tier->price_gems) }} gems
                        </p>
                    </div>

                    <dl class="mt-4 space-y-2 text-sm">
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-gray-500">Hearts added</dt>
                            <dd class="font-bold text-ink-900">{{ $tier->hearts }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-gray-500">Cost per heart</dt>
                            <dd class="font-bold text-ink-900">{{ number_format($tier->price_gems / max($tier->hearts, 1)) }} gems</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-gray-500">Key</dt>
                            <dd class="font-mono text-xs text-gray-500">{{ $tier->key }}</dd>
                        </div>
                    </dl>

                    <div class="mt-auto pt-4"><div class="flex justify-end border-t border-gray-100 pt-3">
                        <x-admin.row-actions
                            :edit="route('admin.heart-refill-tiers.edit', $tier)"
                            :delete="route('admin.heart-refill-tiers.destroy', $tier)"
                            :name="'heart refill '.$tier->title"
                            confirm="Learners will no longer be offered this refill. Gems already spent on it are not affected. To hide it for now, switch it off instead." />
                    </div></div>
                </article>
            @empty
                <div class="card p-10 text-center sm:col-span-2 lg:col-span-3">
                    <p class="font-bold text-ink-900">No heart refills yet.</p>
                    <p class="mt-1 text-sm text-gray-500">Without one, learners who run out of hearts can only wait for them to come back.</p>
                    <a href="{{ route('admin.heart-refill-tiers.create') }}" class="mt-2 inline-block text-sm font-bold text-brand-600 hover:underline">Add the first refill</a>
                </div>
            @endforelse
        </div>

        <div>{{ $heartRefillTiers->links() }}</div>
    </div>
@endsection
