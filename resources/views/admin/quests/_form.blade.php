@php
    $quest ??= null;
    $requirementLabels = [
        'lessons_completed' => ['Finish lessons', 'Counts lessons finished today.', 'lessons', 'lesson'],
        'xp_earned' => ['Earn XP', 'Counts XP earned today from any source.', 'XP', 'XP'],
        'perfect_lesson' => ['Perfect lessons', 'Counts lessons finished today with no mistakes.', 'perfect lessons', 'perfect lesson'],
        'units_completed' => ['Finish units', 'Counts whole units finished today.', 'units', 'unit'],
    ];
    $selectedRequirement = old('requirement_type', $quest?->requirement_type ?? 'lessons_completed');
@endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label for="title" class="field-label">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $quest?->title) }}" required maxlength="255" class="field-input" placeholder="Lesson Goal">
        @error('title') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div class="sm:col-span-2">
        <label for="description" class="field-label">Description <span class="font-normal text-gray-400">(optional)</span></label>
        <input type="text" id="description" name="description" value="{{ old('description', $quest?->description) }}" maxlength="255" class="field-input" placeholder="Complete lessons today">
        <p class="field-hint">For your reference. The apps write their own wording from the goal below, in each learner's language.</p>
        @error('description') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="border-t border-gray-100 pt-5">
    <h2 class="font-display text-base font-bold text-ink-900">What the learner has to do</h2>
    <p class="text-sm text-gray-500">Progress is counted from today's activity only, so an unfinished quest starts again from zero tomorrow.</p>

    <div class="mt-4 grid gap-5 sm:grid-cols-2">
        <div>
            <label for="requirement_type" class="field-label">Goal</label>
            <select id="requirement_type" name="requirement_type" required class="field-input" data-quest-requirement>
                @foreach ($requirementLabels as $value => [$label, $hint, $unit, $unitOne])
                    <option value="{{ $value }}" data-hint="{{ $hint }}" data-unit="{{ $unit }}" data-unit-one="{{ $unitOne }}" @selected($selectedRequirement === $value)>{{ $label }}</option>
                @endforeach
            </select>
            <p class="field-hint" data-quest-requirement-hint>{{ $requirementLabels[$selectedRequirement][1] ?? '' }}</p>
            @error('requirement_type') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="target_count" class="field-label">Starting goal</label>
            <input type="number" id="target_count" name="target_count" min="1" value="{{ old('target_count', $quest?->target_count ?? 1) }}" required class="field-input" data-quest-input>
            <p class="field-hint">How many a brand-new learner has to reach in one day.</p>
            @error('target_count') <p class="field-error">{{ $message }}</p> @enderror
        </div>
    </div>
</div>

<div class="border-t border-gray-100 pt-5">
    <h2 class="font-display text-base font-bold text-ink-900">Getting harder over time</h2>
    <p class="text-sm text-gray-500">The goal rises as a learner finishes more lessons in total, so one quest keeps fitting them for months. Rewards rise by the same proportion. It never eases back down.</p>

    <div class="mt-4 grid gap-5 sm:grid-cols-2">
        <div>
            <label for="target_increment" class="field-label">Add to the goal every {{ \App\Services\QuestService::LESSONS_PER_STEP }} lessons</label>
            <input type="number" id="target_increment" name="target_increment" min="0" value="{{ old('target_increment', $quest?->target_increment ?? 0) }}" required class="field-input" data-quest-input>
            <p class="field-hint">0 keeps the goal the same for everyone.</p>
            @error('target_increment') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="max_target" class="field-label">Highest the goal can go</label>
            <input type="number" id="max_target" name="max_target" min="1" value="{{ old('max_target', $quest?->max_target) }}" class="field-input" placeholder="Not set" data-quest-input>
            <p class="field-hint">Needed for the goal to grow at all. Left empty, the goal stays at the starting goal.</p>
            @error('max_target') <p class="field-error">{{ $message }}</p> @enderror
        </div>
    </div>
</div>

<div class="border-t border-gray-100 pt-5">
    <h2 class="font-display text-base font-bold text-ink-900">Reward</h2>
    <p class="text-sm text-gray-500">Paid when the learner claims the finished quest. These amounts are for the starting goal.</p>

    <div class="mt-4 grid gap-5 sm:grid-cols-3">
        <div>
            <label for="gems_reward" class="field-label">Gems</label>
            <input type="number" id="gems_reward" name="gems_reward" min="0" value="{{ old('gems_reward', $quest?->gems_reward ?? 0) }}" required class="field-input" data-quest-input>
            @error('gems_reward') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="xp_reward" class="field-label">XP</label>
            <input type="number" id="xp_reward" name="xp_reward" min="0" value="{{ old('xp_reward', $quest?->xp_reward ?? 0) }}" required class="field-input" data-quest-input>
            <p class="field-hint">Also counts toward the weekly league.</p>
            @error('xp_reward') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="difficulty" class="field-label">Difficulty</label>
            <select id="difficulty" name="difficulty" required class="field-input">
                @foreach ([1 => 'Easy', 2 => 'Medium', 3 => 'Hard'] as $value => $label)
                    <option value="{{ $value }}" @selected((int) old('difficulty', $quest?->difficulty ?? 1) === $value)>{{ $label }}</option>
                @endforeach
            </select>
            <p class="field-hint">Sets the order the day's quests are listed in, easiest first.</p>
            @error('difficulty') <p class="field-error">{{ $message }}</p> @enderror
        </div>
    </div>

    {{-- Same arithmetic as QuestService::scaleForUser(), so the admin can see what a learner would actually get. --}}
    <div class="mt-4 rounded-xl bg-gray-50 p-4" data-quest-preview>
        <p class="text-xs font-bold uppercase tracking-wide text-gray-500">What learners would get</p>
        <ul class="mt-2 space-y-1 text-sm text-gray-700" data-quest-preview-list></ul>
    </div>
</div>

<div class="grid gap-5 border-t border-gray-100 pt-5 sm:grid-cols-2">
    <div>
        <label for="order_number" class="field-label">Position in this list</label>
        <input type="number" id="order_number" name="order_number" min="0" value="{{ old('order_number', $quest?->order_number ?? $nextOrder ?? 0) }}" required class="field-input">
        <p class="field-hint">Only sorts the admin list. Learners get quests picked at random.</p>
        @error('order_number') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="divide-y divide-gray-100 border-t border-gray-100">
    <label class="flex cursor-pointer items-start justify-between gap-4 py-4">
        <span>
            <span class="block font-bold text-ink-900">In the daily draw</span>
            <span class="block text-xs text-gray-500">Each learner gets 3 quests a day, picked at random from the ones switched on. Switching off does not take it from anyone who already has it today.</span>
        </span>
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $quest?->is_active ?? true)) class="peer sr-only">
        <span class="relative mt-1 h-6 w-11 shrink-0 rounded-full bg-gray-300 transition after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:bg-brand-500 peer-checked:after:translate-x-5 peer-focus-visible:ring-2 peer-focus-visible:ring-brand-500 peer-focus-visible:ring-offset-2" aria-hidden="true"></span>
    </label>
</div>

@push('scripts')
<script>
    (() => {
        const select = document.querySelector('[data-quest-requirement]')
        const hint = document.querySelector('[data-quest-requirement-hint]')
        const list = document.querySelector('[data-quest-preview-list]')
        const num = (id) => parseInt(document.getElementById(id).value, 10)

        const render = () => {
            const option = select.selectedOptions[0]
            hint.textContent = option.dataset.hint
            const base = Math.max(1, num('target_count') || 1)
            const increment = Math.max(0, num('target_increment') || 0)
            const capInput = num('max_target')
            const cap = Number.isNaN(capInput) ? base : capInput
            const gems = Math.max(0, num('gems_reward') || 0)
            const xp = Math.max(0, num('xp_reward') || 0)

            // Sample points: a new learner, then a few milestones along the way.
            const step = {{ \App\Services\QuestService::LESSONS_PER_STEP }};
            const rows = [0, 5, 10, 20, 50].map((lessons) => {
                const target = Math.max(1, Math.min(cap, base + Math.floor(lessons / step) * increment))
                const factor = target / base
                const reward = ['+' + Math.round(gems * factor) + ' gems', '+' + Math.round(xp * factor) + ' XP'].join(' · ')
                return { lessons, text: target + ' ' + (target === 1 ? option.dataset.unitOne : option.dataset.unit) + ', ' + reward }
            })
            list.replaceChildren(...rows.map(({ lessons, text }) => {
                const li = document.createElement('li')
                const who = document.createElement('span')
                who.className = 'inline-block w-40 text-gray-500'
                who.textContent = lessons === 0 ? 'New learner' : 'After ' + lessons + ' lessons'
                li.append(who, text)
                return li
            }))
        }

        select.addEventListener('change', render)
        document.querySelectorAll('[data-quest-input]').forEach((input) => input.addEventListener('input', render))
        render()
    })()
</script>
@endpush
