@csrf
@if (isset($quest))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Order Number</label>
        <input type="number" name="order_number" value="{{ old('order_number', $quest->order_number ?? 0) }}" class="w-full border rounded px-3 py-2" min="0">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title" value="{{ old('title', $quest->title ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Description</label>
        <input type="text" name="description" value="{{ old('description', $quest->description ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Requirement Type</label>
        <select name="requirement_type" class="w-full border rounded px-3 py-2">
            @foreach ([
                'lessons_completed' => 'Lessons completed today',
                'xp_earned' => 'XP earned today',
                'perfect_lesson' => 'Perfect lessons today',
                'units_completed' => 'Units completed today',
            ] as $value => $label)
                <option value="{{ $value }}" @selected(old('requirement_type', $quest->requirement_type ?? '') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('requirement_type') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Target Count (starting)</label>
        <input type="number" name="target_count" value="{{ old('target_count', $quest->target_count ?? 1) }}" class="w-full border rounded px-3 py-2" min="1">
        <p class="text-xs text-gray-500 mt-1">The goal for a brand-new learner. Grows with the fields below.</p>
        @error('target_count') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Target Increment</label>
        <input type="number" name="target_increment" value="{{ old('target_increment', $quest->target_increment ?? 0) }}" class="w-full border rounded px-3 py-2" min="0">
        <p class="text-xs text-gray-500 mt-1">How much the goal rises every 10 lessons the learner completes. 0 = never grows.</p>
        @error('target_increment') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Max Target (cap)</label>
        <input type="number" name="max_target" value="{{ old('max_target', $quest->max_target ?? '') }}" class="w-full border rounded px-3 py-2" min="1" placeholder="no cap">
        <p class="text-xs text-gray-500 mt-1">The hardest this quest ever gets. Leave blank for no cap. Rewards scale with the target.</p>
        @error('max_target') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Difficulty</label>
        <select name="difficulty" class="w-full border rounded px-3 py-2">
            @foreach ([1 => 'Easy', 2 => 'Medium', 3 => 'Hard'] as $value => $label)
                <option value="{{ $value }}" @selected((int) old('difficulty', $quest->difficulty ?? 1) === $value)>{{ $label }}</option>
            @endforeach
        </select>
        <p class="text-xs text-gray-500 mt-1">A label for how hard this quest feels; does not affect assignment (3 active quests are picked at random each day).</p>
        @error('difficulty') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Gems Reward</label>
        <input type="number" name="gems_reward" value="{{ old('gems_reward', $quest->gems_reward ?? 0) }}" class="w-full border rounded px-3 py-2" min="0">
        @error('gems_reward') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">XP Reward</label>
        <input type="number" name="xp_reward" value="{{ old('xp_reward', $quest->xp_reward ?? 0) }}" class="w-full border rounded px-3 py-2" min="0">
        @error('xp_reward') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $quest->is_active ?? true) ? 'checked' : '' }}>
        <label for="is_active" class="text-sm font-medium">Active (eligible for random daily assignment)</label>
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.quests.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
