@extends('layouts.admin')

@section('title', 'Chapters')

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">
        <div class="flex flex-wrap items-end justify-between gap-3">
            <form method="GET" class="flex items-end gap-2">
                <div>
                    <label for="language_id" class="field-label">Language</label>
                    <select id="language_id" name="language_id" onchange="this.form.submit()" class="field-input !w-auto pr-8">
                        <option value="">All languages</option>
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}" @selected($languageId === $language->id)>{{ $language->flag_emoji }} {{ $language->name }}</option>
                        @endforeach
                    </select>
                </div>
                <noscript><button class="btn-secondary">Apply</button></noscript>
            </form>
            <a href="{{ route('admin.chapters.create', ['language_id' => $languageId]) }}" class="btn-primary">+ Add chapter</a>
        </div>

        <x-per-page :paginator="$chapters" noun="chapters" />

        <div class="card overflow-hidden">
            <div class="relative overflow-x-auto">
                <table class="w-full min-w-[640px] text-left text-sm">
                    <thead class="border-b border-gray-100 bg-gray-50/80">
                        <tr><th class="th">Order</th><th class="th">Chapter</th><th class="th">Language</th><th class="th">Kind</th><th class="th">Units</th><th class="th"><span class="sr-only">Actions</span></th></tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($chapters as $chapter)
                            <tr class="hover:bg-brand-50/40">
                                <td class="td w-16 font-bold text-gray-400">{{ $chapter->order_number }}</td>
                                <td class="td font-bold text-ink-900">{{ $chapter->title }}</td>
                                <td class="td whitespace-nowrap">{{ $chapter->language->flag_emoji }} {{ $chapter->language->name }}</td>
                                <td class="td"><span class="tag bg-gray-100 text-gray-700">{{ ucfirst(str_replace('_', ' ', $chapter->chapter_key->value)) }}</span></td>
                                <td class="td">{{ $chapter->units_count }}</td>
                                <td class="td">
                                    <x-admin.row-actions :edit="route('admin.chapters.edit', $chapter)" :delete="route('admin.chapters.destroy', $chapter)" :name="'chapter '.$chapter->title"
                                        confirm="This also deletes its {{ $chapter->units_count }} units with all their lessons and exercises. It cannot be undone.">
                                        <a href="{{ route('admin.content-tree', ['language_id' => $chapter->language_id]) }}" class="rounded-lg px-2.5 py-2 text-xs font-bold text-brand-600 hover:bg-brand-50">Open in tree</a>
                                    </x-admin.row-actions>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="px-5 py-12 text-center text-gray-500">No chapters yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>{{ $chapters->links() }}</div>
    </div>
@endsection
