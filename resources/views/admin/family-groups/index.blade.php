@extends('layouts.admin')

@section('title', 'Family Plans')

@section('content')
    <p class="mb-4 text-sm text-gray-500">Every active Family plan group — the owner is the paying subscriber; members ride on the owner's subscription for free (see FamilyService).</p>

    <x-per-page :paginator="$familyGroups" noun="groups" />

    <div class="space-y-4">
        @forelse ($familyGroups as $group)
            @php
                $seatsUsed = $group->members->count() + $group->pendingInvites->count() + 1;
                $ownerActive = optional($group->owner->activeSubscription)->status === 'active' && optional($group->owner->activeSubscription)->plan_key === 'family';
            @endphp
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-4 py-3 bg-gray-50 flex items-center justify-between border-b">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-400">Owner</span>
                        <span class="font-semibold">{{ $group->owner->full_name ?? $group->owner->email }}</span>
                        <span class="text-sm text-gray-500">{{ $group->owner->email }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-gray-500">{{ $seatsUsed }}/5 seats</span>
                        @if ($ownerActive)
                            <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">Plan Active</span>
                        @else
                            <span class="text-red-700 bg-red-100 px-2 py-0.5 rounded text-sm">Plan Inactive</span>
                        @endif
                    </div>
                </div>

                <div class="px-4 py-3">
                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-2">Members ({{ $group->members->count() }})</p>
                    @forelse ($group->members as $member)
                        <div class="flex items-center justify-between py-1.5 pl-4 border-l-2 border-gray-200 mb-1">
                            <div>
                                <span class="font-medium">{{ $member->user->full_name ?? $member->user->email }}</span>
                                <span class="text-sm text-gray-500 ml-2">{{ $member->user->email }}</span>
                            </div>
                            <span class="text-sm text-gray-400">joined {{ $member->joined_at->format('M j, Y') }}</span>
                        </div>
                    @empty
                        <p class="pl-4 text-sm text-gray-400">No members yet.</p>
                    @endforelse

                    @if ($group->pendingInvites->count() > 0)
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400 mt-3 mb-2">Pending Invites ({{ $group->pendingInvites->count() }})</p>
                        @foreach ($group->pendingInvites as $invite)
                            <div class="flex items-center justify-between py-1.5 pl-4 border-l-2 border-dashed border-gray-200 mb-1">
                                <span class="text-gray-600">{{ $invite->email }}</span>
                                <span class="text-sm text-gray-400">expires {{ $invite->expires_at->format('M j, Y') }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @empty
            <div class="bg-white rounded-lg shadow p-6 text-center text-gray-500">No family plan groups yet.</div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $familyGroups->links() }}
    </div>
@endsection
