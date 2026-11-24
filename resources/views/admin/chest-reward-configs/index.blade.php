@extends('layouts.admin')

@section('title', 'Chest rewards')

@php
    $typeLabels = ['daily' => 'Daily chest', 'unit_bonus' => 'Unit bonus', 'streak' => 'Streak milestone'];
    $typeTones = ['daily' => 'bg-sky-100 text-sky-800', 'unit_bonus' => 'bg-emerald-100 text-emerald-800', 'streak' => 'bg-orange-100 text-orange-800'];
    $range = fn (int $min, int $max) => $min >= $max ? number_format($min) : number_format($min).' to '.number_format($max);
    $hearts = fn (int $n) => $n === 1 ? 'heart' : 'hearts';
@endphp

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">
        <div class="flex flex-wrap items-start justify-end gap-4">
            <a href="{{ route('admin.chest-reward-configs.create', array_filter(['chest_type' => $type?->value])) }}" class="btn-primary">
                <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Add chest reward
            </a>
        </div>

        @foreach ($missing as $missingType)
            <div class="rounded-xl bg-rose-100 px-4 py-3 text-sm font-semibold text-rose-800">
                @php $chestName = $missingType->value === 'daily' ? 'daily chest' : 'unit bonus chest'; @endphp
                Learners cannot open the {{ $chestName }}: there is no {{ $chestName }} reward without a streak length. Add one.
            </div>
        @endforeach

        <nav class="flex flex-wrap gap-2" aria-label="Filter by kind of chest">
            @foreach (['' => 'All'] + $typeLabels as $key => $label)
                @php $isCurrent = ($type?->value ?? '') === $key; @endphp
                <a href="{{ route('admin.chest-reward-configs.index', array_filter(['chest_type' => $key, 'per_page' => request('per_page')])) }}" @if ($isCurrent) aria-current="true" @endif class="{{ $isCurrent ? 'chip-active' : 'chip' }}">
                    {{ $key === 'streak' ? 'Streak milestones' : $label }}
                    <span class="rounded-full px-2 py-0.5 text-xs {{ $isCurrent ? 'bg-white/20' : 'bg-gray-100 text-gray-500' }}">{{ $key === '' ? $allCount : (int) ($typeCounts[$key] ?? 0) }}</span>
                </a>
            @endforeach
        </nav>


        <div class="card overflow-hidden">
            <div class="relative overflow-x-auto">
                <table class="w-full min-w-[760px] text-left text-sm">
                    <thead class="border-b border-gray-100 bg-gray-50/80">
                        <tr>
                            <th class="th">Chest</th>
                            <th class="th">When</th>
                            <th class="th">Pays</th>
                            <th class="th">Status</th>
                            <th class="th"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($chestRewardConfigs as $config)
                            @php
                                $kind = $config->chest_type->value;
                                // Daily and unit chests are only read from the row with no reference.
                                $unused = $kind !== 'streak' && $config->reference !== null;
                            @endphp
                            <tr class="hover:bg-brand-50/40">
                                <td class="td">
                                    <span class="block font-bold text-ink-900">{{ $config->label }}</span>
                                    <span class="tag mt-1 {{ $typeTones[$kind] ?? 'bg-gray-100 text-gray-700' }}">{{ $typeLabels[$kind] ?? $kind }}</span>
                                </td>
                                <td class="td text-gray-600">
                                    @if ($kind === 'streak')
                                        At a <span class="font-semibold text-ink-900">{{ $config->reference }}-day</span> streak
                                    @elseif ($kind === 'daily')
                                        Every 24 hours
                                    @else
                                        Once per unit, after its first lesson
                                    @endif
                                </td>
                                <td class="td">
                                    @if ($kind === 'streak')
                                        <span class="whitespace-nowrap font-bold text-ink-900">{{ number_format($config->min_gems) }} gems</span>
                                        @if ($config->reward_description)
                                            <span class="block text-xs text-gray-500">{{ $config->reward_description }}</span>
                                        @endif
                                    @elseif ($kind === 'daily')
                                        <span class="whitespace-nowrap font-bold text-ink-900">{{ $range($config->min_gems, $config->max_gems) }} gems</span>
                                    @else
                                        <span class="block whitespace-nowrap font-bold text-ink-900">{{ $range($config->min_gems, $config->max_gems) }} gems</span>
                                        <span class="block whitespace-nowrap text-xs font-semibold text-gray-600">{{ $range($config->min_xp, $config->max_xp) }} XP · {{ $range($config->min_hearts, $config->max_hearts) }} {{ $hearts($config->max_hearts) }}</span>
                                    @endif
                                </td>
                                <td class="td">
                                    @if ($unused)
                                        <span class="tag bg-amber-100 text-amber-800" title="The app only uses the {{ $kind === 'daily' ? 'daily chest' : 'unit bonus chest' }} reward without a streak length">Not used</span>
                                    @elseif ($kind !== 'streak')
                                        <span class="tag bg-emerald-100 text-emerald-800">Always on</span>
                                    @elseif ($config->is_active)
                                        <span class="tag bg-emerald-100 text-emerald-800">On</span>
                                    @else
                                        <span class="tag bg-gray-100 text-gray-600">Off</span>
                                    @endif
                                </td>
                                <td class="td">
                                    <x-admin.row-actions
                                        :edit="route('admin.chest-reward-configs.edit', $config)"
                                        :delete="route('admin.chest-reward-configs.destroy', $config)"
                                        :name="$config->label"
                                        :confirm="match (true) {
                                            $kind === 'streak' => 'Learners can no longer claim the '.$config->reference.'-day milestone. Anyone who already claimed it keeps the gems. To pause it instead, switch it off.',
                                            $unused => 'This row is not used by the app, so learners will not notice. It cannot be undone.',
                                            default => 'Learners cannot open the '.($kind === 'daily' ? 'daily chest' : 'unit bonus chest').' at all until you add a new one. It cannot be undone.',
                                        }" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-12 text-center">
                                    <p class="font-bold text-ink-900">No chest rewards here.</p>
                                    @if ($type)
                                        <a href="{{ route('admin.chest-reward-configs.index') }}" class="mt-1 inline-block text-sm font-bold text-brand-600 hover:underline">Show all</a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>{{ $chestRewardConfigs->links() }}</div>
    </div>
@endsection
