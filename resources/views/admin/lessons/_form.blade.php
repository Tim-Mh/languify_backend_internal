@php
    $lesson ??= null;
    $defaults ??= [];
    $selected = (int) old('unit_id', $lesson?->unit_id ?? $defaults['unit_id'] ?? 0);
@endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label for="unit_id" class="field-label">Unit</label>
        <select id="unit_id" name="unit_id" required class="field-input">
            <option value="">Choose a unit</option>
            @foreach ($units as $group => $groupUnits)
                <optgroup label="{{ $group }}">
                    @foreach ($groupUnits as $unit)
                        <option value="{{ $unit->id }}" @selected($selected === $unit->id)>{{ $unit->title }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
        @error('unit_id') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="title" class="field-label">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $lesson?->title) }}" required class="field-input" placeholder="Lesson 1: Hello">
        @error('title') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="order_number" class="field-label">Position</label>
        <input type="number" id="order_number" name="order_number" min="0" value="{{ old('order_number', $lesson?->order_number ?? $defaults['order_number'] ?? 1) }}" required class="field-input">
        <p class="field-hint">Lower numbers come first in the unit.</p>
        @error('order_number') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>
