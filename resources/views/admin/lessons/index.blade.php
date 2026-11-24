@extends('layouts.admin')

@section('title', 'Lessons')

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">
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
                    <label for="search" class="field-label">Title</label>
                    <input type="search" id="search" name="search" value="{{ $search }}" placeholder="Search lessons" class="field-input">
                </div>
                <label class="flex items-center gap-2 py-2.5 text-sm font-semibold text-gray-700">
                    <input type="checkbox" name="empty" value="1" @checked($emptyOnly) class="h-4 w-4 accent-brand-500"> Only lessons with no exercises
                </label>
                <button class="btn-secondary">Apply</button>
            </form>
            <a href="{{ route('admin.lessons.create') }}" class="btn-primary">+ Add lesson</a>
        </div>

        <x-per-page :paginator="$lessons" noun="lessons" />

        <div class="card overflow-hidden">
            <div class="relative overflow-x-auto">
                <table class="w-full min-w-[760px] text-left text-sm">
                    <thead class="border-b border-gray-100 bg-gray-50/80">
                        <tr><th class="th">Order</th><th class="th">Lesson</th><th class="th">Where</th><th class="th">Exercises</th><th class="th"><span class="sr-only">Actions</span></th></tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($lessons as $lesson)
                            <tr class="hover:bg-brand-50/40">
                                <td class="td w-16 font-bold text-gray-400">{{ $lesson->order_number }}</td>
                                <td class="td font-bold text-ink-900">{{ $lesson->title }}</td>
                                <td class="td text-gray-600">{{ $lesson->unit->chapter->language->flag_emoji }} {{ $lesson->unit->chapter->title }} <span class="text-gray-400">/</span> {{ $lesson->unit->title }}</td>
                                <td class="td">
                                    @if ($lesson->exercises_count === 0)
                                        <span class="tag bg-rose-100 text-rose-700">None</span>
                                    @else
                                        {{ $lesson->exercises_count }}
                                    @endif
                                </td>
                                <td class="td">
                                    <x-admin.row-actions :edit="route('admin.lessons.edit', $lesson)" :delete="route('admin.lessons.destroy', $lesson)" :name="'lesson '.$lesson->title"
                                        confirm="This also deletes its {{ $lesson->exercises_count }} exercises, and learners lose their progress on it. It cannot be undone.">
                                        <a href="{{ route('admin.exercises.index', ['lesson_id' => $lesson->id]) }}" class="rounded-lg px-2.5 py-2 text-xs font-bold text-brand-600 hover:bg-brand-50">Exercises</a>
                                    </x-admin.row-actions>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-5 py-12 text-center text-gray-500">No lessons match.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>{{ $lessons->links() }}</div>
    </div>
@endsection
