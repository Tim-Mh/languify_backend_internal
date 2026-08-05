@csrf
@if (isset($subscription_plan))
    @method('PUT')
@endif

@php
    $interval = old('interval', $subscription_plan->interval ?? 'month');
@endphp

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title" value="{{ old('title', $subscription_plan->title ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="255">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Description</label>
        <textarea name="description" rows="2" class="w-full border rounded px-3 py-2" maxlength="500">{{ old('description', $subscription_plan->description ?? '') }}</textarea>
        @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Features (one per line)</label>
        <textarea name="features_text" rows="4" class="w-full border rounded px-3 py-2">{{ old('features_text', isset($subscription_plan) && $subscription_plan->features ? implode("\n", $subscription_plan->features) : '') }}</textarea>
        @error('features') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        @error('features_text') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Price (USD)</label>
        <input type="number" step="0.01" name="amount_dollars" value="{{ old('amount_dollars', isset($subscription_plan) ? number_format($subscription_plan->amount_cents / 100, 2, '.', '') : '') }}" class="w-full border rounded px-3 py-2" min="0.01">
        @error('amount_dollars') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Interval</label>
        <select name="interval" class="w-full border rounded px-3 py-2">
            <option value="month" @selected($interval === 'month')>Month</option>
            <option value="year" @selected($interval === 'year')>Year</option>
        </select>
        @error('interval') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Badge Label</label>
        <input type="text" name="badge_label" value="{{ old('badge_label', $subscription_plan->badge_label ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="50">
        @error('badge_label') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Savings Label</label>
        <input type="text" name="savings_label" value="{{ old('savings_label', $subscription_plan->savings_label ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="100">
        @error('savings_label') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order</label>
        <input type="number" name="order_number" value="{{ old('order_number', $subscription_plan->order_number ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $subscription_plan->is_active ?? true) ? 'checked' : '' }}>
        <label for="is_active" class="text-sm font-medium">Active</label>
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.subscription-plans.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
