@extends('layouts.admin')

@section('title', 'Content Tree')

@php
    $plus = 'M12 4.5v15m7.5-7.5h-15';
    $chapterTones = [
        'beginner' => 'bg-emerald-100 text-emerald-800',
        'conversation' => 'bg-sky-100 text-sky-800',
        'restaurant' => 'bg-orange-100 text-orange-800',
        'supermarket' => 'bg-violet-100 text-violet-800',
        'final_test' => 'bg-rose-100 text-rose-800',
    ];
@endphp

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">
        {{-- Language switcher --}}
        {{-- One row that scrolls sideways, however many languages there are. --}}
        <nav id="language-strip" data-hscroll class="-mx-1 flex gap-2 overflow-x-auto overscroll-x-contain px-1 py-1 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden" aria-label="Choose a language">
            @forelse ($languages as $language)
                @php $current = $selectedLanguage?->id === $language->id; @endphp
                <a href="{{ route('admin.content-tree', ['language_id' => $language->id]) }}" @if ($current) aria-current="page" @endif
                   class="{{ $current ? 'chip-active' : 'chip' }} shrink-0 whitespace-nowrap">
                    <span>{{ $language->flag_emoji }}</span> {{ $language->name }}
                    <span class="h-2 w-2 rounded-full {{ $language->is_active ? 'bg-emerald-400' : 'bg-gray-300' }}" title="{{ $language->is_active ? 'Live' : 'Hidden' }}"></span>
                </a>
            @empty
                <p class="text-gray-500">No languages yet. <a href="{{ route('admin.languages.create') }}" class="font-bold text-brand-600 hover:underline">Add one</a>.</p>
            @endforelse
        </nav>
        <script>
            // Keep the chosen language in view when the strip is scrolled.
            document.querySelector('#language-strip [aria-current]')?.scrollIntoView({ block: 'nearest', inline: 'center' });
        </script>

        @if ($selectedLanguage)
            <div class="card flex flex-wrap items-center justify-between gap-4 p-5">
                <div>
                    <h2 class="font-display text-xl font-bold text-ink-900">{{ $selectedLanguage->flag_emoji }} {{ $selectedLanguage->name }} course</h2>
                    <p class="mt-1 text-sm text-gray-500">
                        {{ $totals['chapters'] }} chapters · {{ number_format($totals['units']) }} units · {{ number_format($totals['lessons']) }} lessons · {{ number_format($totals['exercises']) }} exercises
                        @if ($totals['empty'] > 0)
                            · <span class="font-bold text-rose-600">{{ $totals['empty'] }} {{ \Illuminate\Support\Str::plural('lesson', $totals['empty']) }} with no exercises</span>
                        @endif
                    </p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('admin.exercises.index', ['language_id' => $selectedLanguage->id]) }}" class="btn-secondary">All exercises</a>
                    <a href="{{ route('admin.chapters.create', ['language_id' => $selectedLanguage->id]) }}" class="btn-primary">
                        <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $plus }}" /></svg>
                        Add chapter
                    </a>
                </div>
            </div>

            @if ($chapters->isNotEmpty())
                <div class="relative">
                    <svg class="pointer-events-none absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                    <label for="tree-filter" class="sr-only">Find a unit or lesson</label>
                    <input type="search" id="tree-filter" placeholder="Find a unit or lesson by name" class="field-input pl-10">
                </div>
            @endif

            <div class="space-y-4" id="tree">
                @forelse ($chapters as $chapter)
                    <details open class="group/chapter card overflow-hidden" data-chapter>
                        <summary class="flex cursor-pointer list-none flex-wrap items-center justify-between gap-3 p-5 [&::-webkit-details-marker]:hidden">
                            <span class="flex min-w-0 items-center gap-3">
                                <svg class="h-5 w-5 shrink-0 text-gray-400 transition group-open/chapter:rotate-90" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                                <span class="tag {{ $chapterTones[$chapter->chapter_key->value] ?? 'bg-gray-100 text-gray-700' }}">Chapter {{ $chapter->order_number }}</span>
                                <span class="truncate font-display text-lg font-bold text-ink-900">{{ $chapter->title }}</span>
                                <span class="text-sm text-gray-500">{{ $chapter->units->count() }} {{ \Illuminate\Support\Str::plural('unit', $chapter->units->count()) }}</span>
                            </span>
                            <span class="flex items-center gap-1">
                                <a href="{{ route('admin.units.create', ['chapter_id' => $chapter->id]) }}" class="btn-secondary !px-3 !py-1.5 text-xs">+ Unit</a>
                                <x-admin.row-actions :edit="route('admin.chapters.edit', $chapter)" :name="'chapter '.$chapter->title" />
                            </span>
                        </summary>

                        <div class="space-y-2 border-t border-gray-100 bg-gray-50/60 p-4">
                            @forelse ($chapter->units as $unit)
                                <details class="group/unit rounded-xl bg-white ring-1 ring-gray-200" data-unit data-name="{{ \Illuminate\Support\Str::lower($unit->title) }}">
                                    <summary class="flex cursor-pointer list-none items-center justify-between gap-3 px-4 py-3 [&::-webkit-details-marker]:hidden">
                                        <span class="flex min-w-0 items-center gap-3">
                                            <svg class="h-4 w-4 shrink-0 text-gray-400 transition group-open/unit:rotate-90" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                                            <span class="w-6 text-center text-xs font-bold text-gray-400">{{ $unit->order_number }}</span>
                                            <span class="truncate font-bold text-ink-900">{{ $unit->title }}</span>
                                            <span class="shrink-0 text-xs text-gray-500">{{ $unit->lessons->count() }} {{ \Illuminate\Support\Str::plural('lesson', $unit->lessons->count()) }}</span>
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <a href="{{ route('admin.lessons.create', ['unit_id' => $unit->id]) }}" class="btn-secondary !px-3 !py-1.5 text-xs">+ Lesson</a>
                                            <x-admin.row-actions :edit="route('admin.units.edit', $unit)" :name="'unit '.$unit->title" />
                                        </span>
                                    </summary>

                                    <ul class="divide-y divide-gray-100 border-t border-gray-100">
                                        @forelse ($unit->lessons as $lesson)
                                            <li class="flex flex-wrap items-center justify-between gap-3 px-4 py-2.5 pl-14" data-lesson data-name="{{ \Illuminate\Support\Str::lower($lesson->title) }}">
                                                <span class="flex min-w-0 items-center gap-3">
                                                    <span class="w-5 text-center text-xs font-bold text-gray-400">{{ $lesson->order_number }}</span>
                                                    <span class="truncate font-semibold text-ink-800">{{ $lesson->title }}</span>
                                                </span>
                                                <span class="flex items-center gap-2">
                                                    @if ($lesson->exercises_count === 0)
                                                        <span class="tag bg-rose-100 text-rose-700">No exercises</span>
                                                    @else
                                                        <span class="text-xs text-gray-500">{{ $lesson->exercises_count }} exercises · {{ $lesson->exercises_max_session_number ?? 1 }} {{ \Illuminate\Support\Str::plural('session', $lesson->exercises_max_session_number ?? 1) }}</span>
                                                    @endif
                                                    <a href="{{ route('admin.exercises.index', ['lesson_id' => $lesson->id]) }}" class="rounded-lg px-2.5 py-1.5 text-xs font-bold text-brand-600 hover:bg-brand-50">Exercises</a>
                                                    <x-admin.row-actions :edit="route('admin.lessons.edit', $lesson)" :name="'lesson '.$lesson->title" />
                                                </span>
                                            </li>
                                        @empty
                                            <li class="px-4 py-3 pl-14 text-sm text-gray-400">No lessons yet.</li>
                                        @endforelse
                                    </ul>
                                </details>
                            @empty
                                <p class="px-2 py-2 text-sm text-gray-400">No units yet.</p>
                            @endforelse
                        </div>
                    </details>
                @empty
                    <div class="card p-10 text-center">
                        <p class="font-bold text-ink-900">{{ $selectedLanguage->name }} has no chapters yet.</p>
                        <a href="{{ route('admin.chapters.create', ['language_id' => $selectedLanguage->id]) }}" class="mt-2 inline-block text-sm font-bold text-brand-600 hover:underline">Add the first chapter</a>
                    </div>
                @endforelse
            </div>
            <p id="tree-empty" class="hidden text-center text-sm text-gray-500">No unit or lesson matches that name.</p>
        @endif
    </div>
@endsection

@push('scripts')
<script>
    // Typing narrows the tree to matching units and lessons and opens them.
    (() => {
        const input = document.getElementById('tree-filter');
        if (!input) return;
        input.addEventListener('input', () => {
            const term = input.value.trim().toLowerCase();
            let anything = false;
            document.querySelectorAll('[data-chapter]').forEach((chapter) => {
                let chapterHit = false;
                chapter.querySelectorAll('[data-unit]').forEach((unit) => {
                    const unitHit = !term || unit.dataset.name.includes(term);
                    let lessonHit = false;
                    unit.querySelectorAll('[data-lesson]').forEach((lesson) => {
                        const hit = !term || unitHit || lesson.dataset.name.includes(term);
                        lesson.hidden = !hit;
                        lessonHit ||= hit && !!term && lesson.dataset.name.includes(term);
                    });
                    const show = !term || unitHit || lessonHit;
                    unit.hidden = !show;
                    if (term) unit.open = lessonHit;
                    chapterHit ||= show;
                });
                chapter.hidden = !!term && !chapterHit;
                anything ||= !term || chapterHit;
            });
            document.getElementById('tree-empty').classList.toggle('hidden', anything);
        });
    })();
</script>
@endpush
