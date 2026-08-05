@extends('layouts.admin')

@section('title', 'Gem Purchases')

@section('content')
    <div class="bg-white rounded-lg shadow p-4 mb-4 inline-block">
        <div class="text-2xl font-semibold">${{ number_format($totalRevenueCents / 100, 2) }}</div>
        <div class="text-sm text-gray-500">Total completed revenue</div>
    </div>

    <form method="GET" class="mb-4 flex items-end gap-3">
        <div>
            <label class="block text-xs text-gray-500 mb-1">Status</label>
            <select name="status" onchange="this.form.submit()" class="border rounded px-3 py-2">
                <option value="">All statuses</option>
                <option value="pending" @selected($selectedStatus === 'pending')>Pending</option>
                <option value="completed" @selected($selectedStatus === 'completed')>Completed</option>
            </select>
        </div>
    </form>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Pack</th>
                    <th class="px-4 py-2">Gems Credited</th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($purchases as $purchase)
                    <tr>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.users.show', $purchase->user_id) }}" class="text-blue-600 hover:underline">{{ $purchase->user?->email ?? 'User #' . $purchase->user_id }}</a>
                        </td>
                        <td class="px-4 py-2">{{ $purchase->pack_key }}</td>
                        <td class="px-4 py-2">{{ $purchase->gems_credited }}</td>
                        <td class="px-4 py-2">${{ number_format($purchase->amount_cents / 100, 2) }} {{ strtoupper($purchase->currency) }}</td>
                        <td class="px-4 py-2">
                            @if ($purchase->status === 'completed')
                                <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">Completed</span>
                            @else
                                <span class="text-yellow-700 bg-yellow-100 px-2 py-0.5 rounded text-sm">Pending</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-500">{{ $purchase->created_at?->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">No gem purchases yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $purchases->links() }}
    </div>
@endsection
