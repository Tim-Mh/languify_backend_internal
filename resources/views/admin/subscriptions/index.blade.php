@extends('layouts.admin')

@section('title', 'Subscriptions')

@section('content')
    <div class="bg-white rounded-lg shadow p-4 mb-4 inline-block">
        <div class="text-2xl font-semibold">{{ number_format($activeCount) }}</div>
        <div class="text-sm text-gray-500">Active + trialing subscribers</div>
    </div>

    <form method="GET" class="mb-4 flex items-end gap-3">
        <div>
            <label class="block text-xs text-gray-500 mb-1">Status</label>
            <select name="status" onchange="this.form.submit()" class="border rounded px-3 py-2">
                <option value="">All statuses</option>
                @foreach (['active', 'trialing', 'past_due', 'canceled', 'unpaid'] as $status)
                    <option value="{{ $status }}" @selected($selectedStatus === $status)>{{ ucfirst(str_replace('_', ' ', $status)) }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <x-per-page :paginator="$subscriptions" noun="subscriptions" />

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Plan</th>
                    <th class="px-4 py-2">Price Paid</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Current Period Ends</th>
                    <th class="px-4 py-2">Stripe Subscription</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($subscriptions as $sub)
                    @php($plan = $planPrices->get($sub->plan_key))
                    <tr>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.users.show', $sub->user_id) }}" class="text-blue-600 hover:underline">{{ $sub->user?->email ?? 'User #' . $sub->user_id }}</a>
                        </td>
                        <td class="px-4 py-2 capitalize">{{ $sub->plan_key }}</td>
                        <td class="px-4 py-2">
                            @if ($plan)
                                ${{ number_format($plan->amount_cents / 100, 2) }}/{{ $plan->interval }}
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            @if (in_array($sub->status, ['active', 'trialing']))
                                <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">{{ ucfirst($sub->status) }}</span>
                            @else
                                <span class="text-gray-600 bg-gray-100 px-2 py-0.5 rounded text-sm">{{ ucfirst($sub->status) }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-500">{{ $sub->current_period_end?->format('Y-m-d') ?? '—' }}</td>
                        <td class="px-4 py-2 text-xs text-gray-400 font-mono">{{ $sub->stripe_subscription_id }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">No subscriptions yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $subscriptions->links() }}
    </div>
@endsection
