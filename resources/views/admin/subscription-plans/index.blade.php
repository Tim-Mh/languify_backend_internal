@extends('layouts.admin')

@section('title', 'Subscription plans')

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">


        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($subscriptionPlans as $plan)
                @php
                    $live = (int) ($subscribers[$plan->key] ?? 0);
                    $perks = \App\Enums\PlanKey::tryFrom($plan->key);
                @endphp
                <article class="card flex flex-col p-5 {{ $plan->is_active ? '' : 'opacity-75' }}">
                    <div class="flex items-start justify-between gap-3">
                        <span class="tag bg-gray-100 text-gray-600" title="Position in the Store">#{{ $plan->order_number }}</span>
                        @if ($plan->is_active)
                            <span class="tag bg-emerald-100 text-emerald-800">On sale</span>
                        @else
                            <span class="tag bg-gray-200 text-gray-600">Hidden</span>
                        @endif
                    </div>

                    {{-- Roughly how the plan looks in the learner's Store. --}}
                    <div class="mt-3 rounded-2xl bg-gradient-to-b from-brand-50 to-white p-5 ring-1 ring-brand-100">
                        <div class="flex flex-wrap items-center gap-2">
                            <h2 class="font-display text-lg font-bold text-ink-900">{{ $plan->title }}</h2>
                            @if ($plan->badge_label)
                                <span class="tag bg-brand-500 text-white">{{ $plan->badge_label }}</span>
                            @endif
                        </div>
                        <p class="mt-1">
                            <span class="font-display text-2xl font-bold text-brand-600">${{ number_format($plan->amount_cents / 100, 2) }}</span>
                            <span class="text-sm font-bold text-gray-500">/ {{ $plan->interval }}</span>
                        </p>
                        @if ($plan->savings_label)
                            <p class="mt-1 text-sm font-bold text-emerald-700">{{ $plan->savings_label }}</p>
                        @endif
                        @if ($plan->description)
                            <p class="mt-2 text-sm text-gray-600">{{ $plan->description }}</p>
                        @endif
                        @if ($plan->features)
                            <ul class="mt-3 space-y-1.5 text-sm text-gray-700">
                                @foreach ($plan->features as $feature)
                                    <li class="flex items-start gap-2">
                                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-emerald-500" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <dl class="mt-4 space-y-2 text-sm">
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-gray-500">Subscribed now</dt>
                            <dd class="font-bold text-ink-900">{{ number_format($live) }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="shrink-0 text-gray-500">Built-in perks</dt>
                            <dd class="text-right font-bold {{ $perks ? 'text-ink-900' : 'text-gray-400' }}">
                                @switch($perks)
                                    @case(\App\Enums\PlanKey::Family) Unlimited hearts, 3 streak freezes a month, family sharing @break
                                    @case(\App\Enums\PlanKey::Monthly)
                                    @case(\App\Enums\PlanKey::Yearly) 100 hearts, 1 streak freeze a month @break
                                    @default App access only
                                @endswitch
                            </dd>
                        </div>
                        <div class="min-w-0">
                            <dt class="text-gray-500">iPhone App Store product id</dt>
                            <dd class="mt-1 min-w-0">
                                <button type="button" data-copy="us.languify.app.sub.{{ $plan->key }}" title="Copy the App Store product id"
                                        class="block w-full truncate rounded-lg bg-gray-50 px-2 py-1 text-left font-mono text-xs text-gray-500 ring-1 ring-gray-200 hover:text-ink-900">us.languify.app.sub.{{ $plan->key }}</button>
                            </dd>
                        </div>
                    </dl>

                    <div class="mt-auto pt-4"><div class="flex items-center justify-between gap-2 border-t border-gray-100 pt-3">
                        <a href="{{ route('admin.subscriptions.index', ['plan' => $plan->key]) }}" class="text-sm font-bold text-brand-600 hover:underline">See subscribers</a>
                        <x-admin.row-actions
                            :edit="route('admin.subscription-plans.edit', $plan)"
                            :delete="route('admin.subscription-plans.destroy', $plan)"
                            :name="'plan '.$plan->title"
                            :confirm="($live ? $live.' learner'.($live === 1 ? ' is' : 's are').' subscribed to this plan right now. ' : '').'The plan leaves the Store, and iPhone purchases of us.languify.app.sub.'.$plan->key.' will no longer be recognised. Past subscriptions stay on record. To stop selling it for now, switch it off instead.'" />
                    </div></div>
                </article>
            @empty
                <div class="card p-10 text-center md:col-span-2 lg:col-span-3">
                    <p class="font-bold text-ink-900">No subscription plans yet.</p>
                    <p class="mt-1 text-sm text-gray-500">Learners can't subscribe until there is at least one plan switched on.</p>
                    <a href="{{ route('admin.subscription-plans.create') }}" class="mt-2 inline-block text-sm font-bold text-brand-600 hover:underline">Add the first plan</a>
                </div>
            @endforelse
        </div>

        <div>{{ $subscriptionPlans->links() }}</div>
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
