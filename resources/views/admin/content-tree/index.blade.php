@extends('layouts.admin')

@section('title', 'Content Tree')

@section('content')
    <div class="flex items-center gap-2 mb-4">
        @forelse ($languages as $language)
            <a href="{{ route('admin.content-tree', ['language_id' => $language->id]) }}"
               class="px-4 py-2 rounded-lg text-sm font-medium {{ $selectedLanguage && $selectedLanguage->id === $language->id ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 border' }}">
                {{ $language->flag_emoji }} {{ $language->name }}
            </a>
        @empty
            <p class="text-gray-500">No languages yet. <a href="{{ route('admin.languages.create') }}" class="text-blue-600 hover:underline">Add one</a>.</p>
        @endforelse
    </div>

    @if ($selectedLanguage)
        <div class="space-y-3">
            @forelse ($chapters as $chapter)
                <details open class="bg-white rounded-lg shadow">
                    <summary class="cursor-pointer px-4 py-3 font-semibold flex items-center justify-between">
                        <span>📖 Chapter: {{ ucfirst($chapter->chapter_key->value) }} — {{ $chapter->title }}</span>
                        <span class="flex items-center gap-3 text-sm font-normal text-gray-500">
                            {{ $chapter->units->count() }} unit(s)
                            <a href="{{ route('admin.chapters.edit', $chapter) }}" class="text-blue-600 hover:underline">Edit</a>
                        </span>
                    </summary>

                    <div class="pl-6 pb-3 pr-4 space-y-2">
                        @forelse ($chapter->units as $unit)
                            <details class="bg-gray-50 rounded border">
                                <summary class="cursor-pointer px-3 py-2 font-medium flex items-center justify-between">
                                    <span>📂 Unit: {{ $unit->title }}</span>
                                    <span class="flex items-center gap-3 text-sm font-normal text-gray-500">
                                        {{ $unit->lessons->count() }} lesson(s)
                                        <a href="{{ route('admin.units.edit', $unit) }}" class="text-blue-600 hover:underline">Edit</a>
                                    </span>
                                </summary>

                                <div class="pl-6 pb-2 pr-3 space-y-2">
                                    @forelse ($unit->lessons as $lesson)
                                        <details class="bg-white rounded border">
                                            @php
                                                // A lesson is played once per session; each play serves the
                                                // next session's set, so group the tree the same way.
                                                $sessions = $lesson->exercises->sortBy('order_number')->groupBy('session_number');
                                            @endphp
                                            <summary class="cursor-pointer px-3 py-2 flex items-center justify-between">
                                                <span>📄 Lesson: {{ $lesson->title }}</span>
                                                <span class="flex items-center gap-3 text-sm font-normal text-gray-500">
                                                    {{ $sessions->count() }} session(s) · {{ $lesson->exercises->count() }} exercise(s)
                                                    <a href="{{ route('admin.lessons.edit', $lesson) }}" class="text-blue-600 hover:underline">Edit</a>
                                                </span>
                                            </summary>

                                            <div class="pl-6 pb-2 pr-3">
                                                @forelse ($sessions as $sessionNumber => $sessionExercises)
                                                    <p class="mt-2 mb-1 text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                        🔁 Session {{ $sessionNumber }}
                                                        <span class="normal-case font-normal text-gray-400">({{ $sessionExercises->count() }} exercise(s))</span>
                                                    </p>
                                                    <ul class="divide-y border rounded bg-gray-50 px-3">
                                                        @foreach ($sessionExercises as $exercise)
                                                            <li class="py-2 text-sm flex items-center justify-between">
                                                                <span>
                                                                    <span class="inline-block bg-gray-200 text-gray-700 rounded px-2 py-0.5 text-xs mr-2">{{ $exercise->type->value }}</span>
                                                                    {{ $exercise->summaryText() }}
                                                                </span>
                                                                <a href="{{ route('admin.exercises.edit', $exercise) }}" class="text-blue-600 hover:underline">Edit</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @empty
                                                    <p class="py-2 text-sm text-gray-400 italic">No exercises yet.</p>
                                                @endforelse
                                            </div>
                                        </details>
                                    @empty
                                        <p class="text-sm text-gray-400 italic px-3 py-2">No lessons yet.</p>
                                    @endforelse
                                </div>
                            </details>
                        @empty
                            <p class="text-sm text-gray-400 italic px-3 py-2">No units yet.</p>
                        @endforelse
                    </div>
                </details>
            @empty
                <p class="text-gray-500">No chapters yet for this language. <a href="{{ route('admin.chapters.create') }}" class="text-blue-600 hover:underline">Add one</a>.</p>
            @endforelse
        </div>
    @endif
@endsection
