@extends('layouts.admin')

@section('title', 'Exercise Instructions')

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">
        <nav class="flex flex-wrap gap-2" aria-label="Learner's language">
            @foreach ($languages as $option)
                @php $current = $language?->id === $option->id; $missing = count($types) - $option->exercise_instructions_count; @endphp
                <a href="{{ route('admin.exercise-instructions.index', ['language_id' => $option->id]) }}" @if ($current) aria-current="page" @endif class="{{ $current ? 'chip-active' : 'chip' }}">
                    {{ $option->flag_emoji }} {{ $option->name }}
                    @if ($missing > 0)
                        <span class="rounded-full px-2 py-0.5 text-xs {{ $current ? 'bg-white/20' : 'bg-amber-100 text-amber-800' }}">{{ $missing }} missing</span>
                    @endif
                </a>
            @endforeach
        </nav>

        @if ($language)
            <div class="card divide-y divide-gray-100">
                @foreach ($types as $type)
                    @php $instruction = $instructions->get($type->value); @endphp
                    <div class="flex flex-wrap items-start justify-between gap-4 p-5">
                        <div class="min-w-0 flex-1 basis-80">
                            <p class="text-xs font-bold uppercase tracking-wide text-gray-500">{{ $type->label() }}</p>
                            @if ($instruction)
                                <p class="mt-1 font-semibold text-ink-900" dir="auto">{{ $instruction->template }}</p>
                                @if ($instruction->fallback_template)
                                    <p class="mt-1 text-sm text-gray-500" dir="auto"><span class="font-bold">If a word is missing:</span> {{ $instruction->fallback_template }}</p>
                                @endif
                            @else
                                <p class="mt-1 font-semibold text-amber-700">Not written yet. Learners using {{ $language->name }} see no instruction for this type.</p>
                            @endif
                        </div>
                        @if ($instruction)
                            <x-admin.row-actions :edit="route('admin.exercise-instructions.edit', $instruction)" :delete="route('admin.exercise-instructions.destroy', $instruction)"
                                :name="$type->label().' instruction'" confirm="Learners using {{ $language->name }} will see no instruction for {{ $type->label() }} exercises." />
                        @else
                            <a href="{{ route('admin.exercise-instructions.create', ['language_id' => $language->id, 'exercise_type' => $type->value]) }}" class="btn-primary">Write it</a>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
