@php
    $config = $chest_reward_config ?? null;
    $defaults ??= [];
    $chestType = old('chest_type', $config?->chest_type?->value ?? $defaults['chest_type'] ?? 'daily');
    $types = [
        'daily' => ['Daily chest', 'Opens once every 24 hours. Pays a random number of gems between the two amounts below.'],
        'unit_bonus' => ['Unit bonus chest', 'One per unit, unlocked once the learner finishes the unit\'s first lesson. Pays random gems, XP and hearts within the ranges below.'],
        'streak' => ['Streak milestone', 'Claimable once when a learner\'s streak reaches the number of days below. Pays a fixed number of gems.'],
    ];
@endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div>
        <label for="chest_type" class="field-label">Kind of chest</label>
        <select id="chest_type" name="chest_type" required class="field-input" data-chest-type>
            @foreach ($types as $value => [$label, $hint])
                <option value="{{ $value }}" data-hint="{{ $hint }}" @selected($chestType === $value)>{{ $label }}</option>
            @endforeach
        </select>
        <p class="field-hint" data-chest-type-hint>{{ $types[$chestType][1] ?? '' }}</p>
        @error('chest_type') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="label" class="field-label">Name</label>
        <input type="text" id="label" name="label" value="{{ old('label', $config?->label) }}" required maxlength="255" class="field-input" placeholder="Daily Chest">
        <p class="field-hint">For this admin list.</p>
        @error('label') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>

{{-- Daily and unit chests are read from the row with no reference, so the field only exists for streak milestones. --}}
<div class="grid gap-5 border-t border-gray-100 pt-5 sm:grid-cols-2" data-chest-show="streak">
    <div>
        <label for="reference" class="field-label">Streak length (days)</label>
        <input type="text" id="reference" name="reference" inputmode="numeric" value="{{ old('reference', $config?->reference) }}" maxlength="20" class="field-input" placeholder="7">
        <p class="field-hint">The milestone is reached when the learner's streak hits this many days. Each length can only be used once.</p>
        @error('reference') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="badge_key" class="field-label">Badge shown with it <span class="font-normal text-gray-400">(optional)</span></label>
        <input type="text" id="badge_key" name="badge_key" list="badge-keys" value="{{ old('badge_key', $config?->badge_key) }}" maxlength="50" class="field-input font-mono" placeholder="streak-7">
        <datalist id="badge-keys">
            @foreach ($badges ?? [] as $badge)
                <option value="{{ $badge->key }}">{{ $badge->title }}</option>
            @endforeach
        </datalist>
        <p class="field-hint">Sent to the app with the milestone. Pick from the list of badges. It does not award the badge by itself.</p>
        @error('badge_key') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div class="sm:col-span-2">
        <label for="reward_description" class="field-label">Reward text <span class="font-normal text-gray-400">(optional)</span></label>
        <input type="text" id="reward_description" name="reward_description" value="{{ old('reward_description', $config?->reward_description) }}" maxlength="255" class="field-input" placeholder="Badge + Gems">
        <p class="field-hint">A short line describing the prize, sent to the app with the milestone.</p>
        @error('reward_description') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="border-t border-gray-100 pt-5">
    <h2 class="font-display text-base font-bold text-ink-900">What it pays</h2>
    <p class="text-sm text-gray-500" data-chest-pay-hint></p>

    <div class="mt-4 space-y-4">
        @foreach ([['gems', 'Gems'], ['xp', 'XP'], ['hearts', 'Hearts']] as [$key, $label])
            <div class="grid gap-4 sm:grid-cols-2" data-chest-row="{{ $key }}">
                <div>
                    <label for="min_{{ $key }}" class="field-label" data-chest-min-label="{{ $key }}">{{ $label }}, at least</label>
                    <input type="number" id="min_{{ $key }}" name="min_{{ $key }}" min="0" value="{{ old('min_'.$key, $config?->{'min_'.$key} ?? 0) }}" required class="field-input">
                    @error('min_'.$key) <p class="field-error">{{ $message }}</p> @enderror
                </div>
                <div data-chest-max="{{ $key }}">
                    <label for="max_{{ $key }}" class="field-label">{{ $label }}, at most</label>
                    <input type="number" id="max_{{ $key }}" name="max_{{ $key }}" min="0" value="{{ old('max_'.$key, $config?->{'max_'.$key} ?? 0) }}" required class="field-input">
                    @error('max_'.$key) <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="grid gap-5 border-t border-gray-100 pt-5 sm:grid-cols-2">
    <div>
        <label for="order_number" class="field-label">Position</label>
        <input type="number" id="order_number" name="order_number" min="0" value="{{ old('order_number', $config?->order_number ?? $defaults['order_number'] ?? 0) }}" required class="field-input">
        <p class="field-hint" data-chest-show="streak">Milestones are checked in this order, so keep shorter streaks first.</p>
        <p class="field-hint" data-chest-show="daily unit_bonus">Only sorts this admin list.</p>
        @error('order_number') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="divide-y divide-gray-100 border-t border-gray-100" data-chest-show="streak">
    <label class="flex cursor-pointer items-start justify-between gap-4 py-4">
        <span>
            <span class="block font-bold text-ink-900">Milestone is on</span>
            <span class="block text-xs text-gray-500">Switched off, learners can no longer claim this milestone.</span>
        </span>
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $config?->is_active ?? true)) class="peer sr-only">
        <span class="relative mt-1 h-6 w-11 shrink-0 rounded-full bg-gray-300 transition after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:bg-brand-500 peer-checked:after:translate-x-5 peer-focus-visible:ring-2 peer-focus-visible:ring-brand-500 peer-focus-visible:ring-offset-2" aria-hidden="true"></span>
    </label>
</div>
<p class="text-xs text-gray-500" data-chest-show="daily unit_bonus">The daily and unit bonus chests are always on. The app uses the one without a streak length, so keep exactly one of each.</p>

@push('scripts')
<script>
    (() => {
        const select = document.querySelector('[data-chest-type]')
        const form = select.form
        const reference = document.getElementById('reference')
        const payHints = {
            daily: 'Only gems: the daily chest never pays XP or hearts.',
            unit_bonus: 'A random amount in each range, picked when the chest is opened. Set both numbers the same for a fixed amount.',
            streak: 'Only the gems number is paid. Streak milestones never pay XP or hearts.',
        }
        // Which reward rows each kind actually pays out (see ChestService).
        const paid = { daily: ['gems'], unit_bonus: ['gems', 'xp', 'hearts'], streak: ['gems'] }

        const sync = () => {
            const type = select.value
            document.querySelector('[data-chest-type-hint]').textContent = select.selectedOptions[0].dataset.hint
            document.querySelector('[data-chest-pay-hint]').textContent = payHints[type]
            document.querySelectorAll('[data-chest-show]').forEach((el) => {
                el.classList.toggle('hidden', !el.dataset.chestShow.split(' ').includes(type))
            })
            document.querySelectorAll('[data-chest-row]').forEach((row) => {
                row.classList.toggle('hidden', !paid[type].includes(row.dataset.chestRow))
            })
            // A streak milestone pays one fixed amount, so a single box.
            document.querySelector('[data-chest-max="gems"]').classList.toggle('hidden', type === 'streak')
            document.querySelector('[data-chest-min-label="gems"]').textContent = type === 'streak' ? 'Gems' : 'Gems, at least'
        }

        select.addEventListener('change', sync)
        form.addEventListener('submit', () => {
            if (select.value === 'streak') {
                // Unused for milestones; kept equal so the "at most" check passes.
                document.getElementById('max_gems').value = document.getElementById('min_gems').value
            } else {
                reference.value = ''
            }
        })
        sync()
    })()
</script>
@endpush
