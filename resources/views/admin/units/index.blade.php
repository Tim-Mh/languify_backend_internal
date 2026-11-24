@extends('layouts.admin')

@section('title', 'Units')

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
                    <input type="search" id="search" name="search" value="{{ $search }}" placeholder="Search units" class="field-input">
                </div>
                <button class="btn-secondary">Apply</button>
            </form>
            <a href="{{ route('admin.units.create') }}" class="btn-primary">+ Add unit</a>
        </div>

        <x-per-page :paginator="$units" noun="units" />

        <div class="card overflow-hidden">
            <div class="relative overflow-x-auto">
                <table class="w-full min-w-[680px] text-left text-sm">
                    <thead class="border-b border-gray-100 bg-gray-50/80">
                        <tr><th class="th">Order</th><th class="th">Unit</th><th class="th">Chapter</th><th class="th">Lessons</th><th class="th"><span class="sr-only">Actions</span></th></tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($units as $unit)
                            <tr class="hover:bg-brand-50/40">
                                <td class="td w-16 font-bold text-gray-400">{{ $unit->order_number }}</td>
                                <td class="td font-bold text-ink-900">{{ $unit->title }}</td>
                                <td class="td">{{ $unit->chapter->language->flag_emoji }} {{ $unit->chapter->language->name }} <span class="text-gray-400">/</span> {{ $unit->chapter->title }}</td>
                                <td class="td">{{ $unit->lessons_count }}</td>
                                <td class="td">
                                    <x-admin.row-actions :edit="route('admin.units.edit', $unit)" :delete="route('admin.units.destroy', $unit)" :name="'unit '.$unit->title"
                                        confirm="This also deletes its {{ $unit->lessons_count }} lessons and all their exercises. It cannot be undone." />
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-5 py-12 text-center text-gray-500">No units match.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>{{ $units->links() }}</div>
    </div>
@endsection
