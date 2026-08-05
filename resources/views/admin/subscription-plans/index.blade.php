@extends('layouts.admin')

@section('title', 'Subscription Plans')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <div></div>
        <a href="{{ route('admin.subscription-plans.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Subscription Plan</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Key</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Badge Label</th>
                    <th class="px-4 py-2">Active</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($subscriptionPlans as $plan)
                    <tr>
                        <td class="px-4 py-2">{{ $plan->key }}</td>
                        <td class="px-4 py-2">{{ $plan->title }}</td>
                        <td class="px-4 py-2">${{ number_format($plan->amount_cents / 100, 2) }}/{{ $plan->interval }}</td>
                        <td class="px-4 py-2">{{ $plan->badge_label ?? '—' }}</td>
                        <td class="px-4 py-2">
                            @if ($plan->is_active)
                                <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">Active</span>
                            @else
                                <span class="text-gray-600 bg-gray-100 px-2 py-0.5 rounded text-sm">Inactive</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.subscription-plans.edit', $plan) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.subscription-plans.destroy', $plan) }}" method="POST" class="inline" onsubmit="return confirm('Delete this subscription plan?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">No subscription plans yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $subscriptionPlans->links() }}
    </div>
@endsection
