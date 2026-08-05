@extends('layouts.admin')

@section('title', 'Avatar Options')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500">Gem-purchasable avatar customization options. Exactly one option per attribute type should be Default (free starting look).</p>
        <a href="{{ route('admin.avatar-options.create', ['attribute_type' => $selectedType]) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Option</a>
    </div>

    <form method="GET" class="mb-4">
        <label class="block text-sm font-medium mb-1">Attribute Type</label>
        <select name="attribute_type" onchange="this.form.submit()" class="border rounded px-3 py-2">
            @foreach ($attributeTypes as $type)
                <option value="{{ $type }}" @selected($selectedType === $type)>{{ $type }}</option>
            @endforeach
        </select>
    </form>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Order</th>
                    <th class="px-4 py-2">Value</th>
                    <th class="px-4 py-2">Price (Gems)</th>
                    <th class="px-4 py-2">Default</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($options as $option)
                    <tr>
                        <td class="px-4 py-2 text-gray-500">{{ $option->order_number }}</td>
                        <td class="px-4 py-2 font-semibold">{{ $option->value }}</td>
                        <td class="px-4 py-2">{{ $option->is_default ? 'Free' : $option->price_gems }}</td>
                        <td class="px-4 py-2">
                            @if ($option->is_default)
                                <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">Default</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.avatar-options.edit', $option) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.avatar-options.destroy', $option) }}" method="POST" class="inline" onsubmit="return confirm('Delete this option? Any users who unlocked it will lose access to it.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">No options for this attribute yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
