@extends('layouts.admin')

@section('title', $lesson ? $lesson->title : 'Exercises')

@php
    $typeTones = [
        'match_pairs' => 'bg-sky-100 text-sky-800',
        'fill_blank' => 'bg-amber-100 text-amber-800',
        'tap_word' => 'bg-violet-100 text-violet-800',
        'listen_select' => 'bg-emerald-100 text-emerald-800',
        'multiple_choice' => 'bg-orange-100 text-orange-800',
        'paragraph_translation' => 'bg-rose-100 text-rose-800',
        'translate' => 'bg-brand-100 text-brand-700',
    ];
@endphp

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">
        @if ($lesson)
            {{-- Working inside one lesson, reached from the Content Tree. --}}
            <div class="card flex flex-wrap items-center justify-between gap-4 p-5">
                <div class="min-w-0">
                    <a href="{{ route('admin.content-tree', ['language_id' => $lesson->unit->chapter->language_id]) }}" class="inline-flex items-center gap-1 text-sm font-bold text-gray-500 hover:text-gray-900">
                        <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
                        {{ $lesson->unit->chapter->language->flag_emoji }} {{ $lesson->unit->chapter->language->name }} course
                    </a>
                    <p class="mt-1 text-sm text-gray-500">{{ $lesson->unit->chapter->title }} / {{ $lesson->unit->title }}</p>
                    <h2 class="font-display text-xl font-bold text-ink-900">{{ $lesson->title }}</h2>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.lessons.edit', $lesson) }}" class="btn-secondary">Edit lesson</a>
                    <a href="{{ route('admin.exercises.create', ['lesson_id' => $lesson->id]) }}" class="btn-primary">+ Add exercise</a>
                </div>
            </div>
        @else
            <div class="flex flex-wrap items-end justify-between gap-3">
                <form method="GET" class="flex flex-wrap items-end gap-2">
                    <div>
                        <label for="language_id" class="field-label">Language</label>
                        <select id="language_id" name="language_id" class="field-input !w-auto pr-8">
                            <option value="">All languages</option>
                            @foreach ($languages as $language)
                                <option value="{{ $language->id }}" @selected($languageId === $language->id)>{{ $language->flag_emoji }} {{ $language->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="type" class="field-label">Type</label>
                        <select id="type" name="type" class="field-input !w-auto pr-8">
                            <option value="">All types</option>
                            @foreach ($types as $option)
                                <option value="{{ $option->value }}" @selected($type === $option)>{{ $option->label() }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="search" class="field-label">Contains</label>
                        <input type="search" id="search" name="search" value="{{ $search }}" placeholder="A word or sentence" class="field-input">
                    </div>
                    <button class="btn-secondary">Apply</button>
                    @if ($languageId || $type || $search)
                        <a href="{{ route('admin.exercises.index') }}" class="py-2.5 text-sm font-bold text-gray-500 hover:text-gray-900">Clear</a>
                    @endif
                </form>
                <a href="{{ route('admin.exercises.create') }}" class="btn-primary">+ Add exercise</a>
            </div>
            <p class="text-sm text-gray-500">Tip: open a lesson from the <a href="{{ route('admin.content-tree', ['language_id' => $languageId]) }}" class="font-bold text-brand-600 hover:underline">Content Tree</a> to see just its exercises, in the order learners meet them.</p>
        @endif

        <x-per-page :paginator="$exercises" noun="exercises" />

        <div class="card overflow-hidden">
            <div class="relative overflow-x-auto">
                <table class="w-full min-w-[760px] text-left text-sm">
                    <thead class="border-b border-gray-100 bg-gray-50/80">
                        <tr>
                            @if ($lesson)<th class="th">Session</th>@endif
                            <th class="th">Order</th>
                            <th class="th">Type</th>
                            <th class="th">Content</th>
                            @unless ($lesson)<th class="th">Lesson</th>@endunless
                            <th class="th"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @php $lastSession = null; @endphp
                        @forelse ($exercises as $exercise)
                            <tr class="hover:bg-brand-50/40 {{ $lesson && $lastSession !== null && $lastSession !== $exercise->session_number ? 'border-t-2 border-t-gray-200' : '' }}">
                                @if ($lesson)
                                    <td class="td w-20">
                                        @if ($lastSession !== $exercise->session_number)
                                            <span class="tag bg-gray-100 text-gray-700">Play {{ $exercise->session_number }}</span>
                                        @endif
                                    </td>
                                @endif
                                @php $lastSession = $exercise->session_number; @endphp
                                <td class="td w-16 font-bold text-gray-400">{{ $exercise->order_number }}</td>
                                <td class="td"><span class="tag {{ $typeTones[$exercise->type->value] ?? 'bg-gray-100 text-gray-700' }}">{{ $exercise->type->label() }}</span></td>
                                <td class="td max-w-md"><span class="line-clamp-2 font-semibold text-ink-900">{{ $exercise->summaryText() ?: 'No preview' }}</span></td>
                                @unless ($lesson)
                                    <td class="td text-gray-600">
                                        <a href="{{ route('admin.exercises.index', ['lesson_id' => $exercise->lesson_id]) }}" class="hover:text-brand-600 hover:underline">
                                            {{ $exercise->lesson->unit->chapter->language->flag_emoji }} {{ $exercise->lesson->unit->title }} / {{ $exercise->lesson->title }}
                                        </a>
                                    </td>
                                @endunless
                                <td class="td">
                                    <x-admin.row-actions :edit="route('admin.exercises.edit', $exercise)" :delete="route('admin.exercises.destroy', $exercise)" name="this exercise"
                                        confirm="Learners will no longer see it. It cannot be undone." />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-12 text-center">
                                    <p class="font-bold text-ink-900">{{ $lesson ? 'This lesson has no exercises yet.' : 'No exercises match.' }}</p>
                                    @if ($lesson)
                                        <a href="{{ route('admin.exercises.create', ['lesson_id' => $lesson->id]) }}" class="mt-1 inline-block text-sm font-bold text-brand-600 hover:underline">Add the first one</a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>{{ $exercises->links() }}</div>
    </div>
@endsection
