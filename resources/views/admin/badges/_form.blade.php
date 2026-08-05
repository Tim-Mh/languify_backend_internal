@csrf
@if (isset($badge))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Category</label>
        <select name="category" class="w-full border rounded px-3 py-2">
            @foreach (['streak' => 'Streak', 'xp' => 'XP', 'lesson' => 'Lesson'] as $value => $label)
                <option value="{{ $value }}" @selected(old('category', $badge->category ?? '') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('category') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title" value="{{ old('title', $badge->title ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Description</label>
        <input type="text" name="description" value="{{ old('description', $badge->description ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Tier</label>
        <select name="tier" class="w-full border rounded px-3 py-2">
            @foreach ($tiers as $tierOption)
                <option value="{{ $tierOption->name }}" @selected(old('tier', $badge->tier ?? '') === $tierOption->name)>
                    {{ $tierOption->name }} ({{ $tierOption->gems_reward }} gems, {{ $tierOption->xp_reward }} xp, {{ $tierOption->hearts_reward }} hearts)
                </option>
            @endforeach
        </select>
        <p class="text-xs text-gray-500 mt-1">
            Tier determines the reward. <a href="{{ route('admin.badge-tiers.index') }}" class="text-blue-600 hover:underline">Manage tiers</a>.
        </p>
        @error('tier') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order Number</label>
        <input type="number" name="order_number" value="{{ old('order_number', $badge->order_number ?? 0) }}" class="w-full border rounded px-3 py-2" min="0">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Requirement Type</label>
        <select name="requirement_type" class="w-full border rounded px-3 py-2">
            @foreach ([
                'streak' => 'Streak (days)',
                'total_xp' => 'Total XP',
                'total_lessons_completed' => 'Total lessons completed',
                'perfect_lessons' => 'Perfect lessons',
                'units_completed_count' => 'Units completed',
                'max_lessons_in_a_day' => 'Max lessons in a day',
                'chapter_complete' => 'Any chapter complete',
            ] as $value => $label)
                <option value="{{ $value }}" @selected(old('requirement_type', $badge->requirement_type ?? '') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('requirement_type') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Requirement Value</label>
        <input type="number" name="requirement_value" value="{{ old('requirement_value', $badge->requirement_value ?? 0) }}" class="w-full border rounded px-3 py-2" min="0">
        <p class="text-xs text-gray-500 mt-1">Ignored for "Any chapter complete" — leave as 0.</p>
        @error('requirement_value') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $badge->is_active ?? true) ? 'checked' : '' }}>
        <label for="is_active" class="text-sm font-medium">Active (inactive badges can no longer be earned)</label>
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.badges.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
