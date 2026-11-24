@extends('layouts.admin')

@section('title', 'Languages')

@section('content')
    <div class="mx-auto max-w-7xl space-y-5">
        <div class="flex flex-wrap items-start justify-end gap-4">
            <a href="{{ route('admin.languages.create') }}" class="btn-primary">
                <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Add language
            </a>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($languages as $language)
                @php
                    $lessonCount = (int) ($lessons[$language->id] ?? 0);
                @endphp
                <article class="card flex flex-col p-5" data-language-row="{{ $language->id }}">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex min-w-0 items-center gap-3">
                            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-2xl">{{ $language->flag_emoji ?: strtoupper($language->code) }}</span>
                            <div class="min-w-0">
                                <h2 class="truncate font-display text-lg font-bold text-ink-900">{{ $language->name }}</h2>
                                <p class="truncate text-sm text-gray-500">{{ $language->native_name }} · <span class="font-mono">{{ $language->code }}</span></p>
                            </div>
                        </div>
                        <x-admin.row-actions
                            :edit="route('admin.languages.edit', $language)"
                            :delete="route('admin.languages.destroy', $language)"
                            :name="$language->name"
                            confirm="This also deletes every chapter, unit, lesson and exercise in {{ $language->name }}, and learners lose their course. It cannot be undone." />
                    </div>

                    <div class="mt-4 flex items-center justify-between gap-3">
                        <div class="flex flex-wrap gap-1.5">
                        @if ($language->is_active && $lessonCount === 0)
                            <span class="tag bg-rose-100 text-rose-700">Live with no lessons</span>
                        @endif
                        </div>
                            {{-- Saves the moment it is flipped, no Save button. --}}
                            <label class="flex shrink-0 cursor-pointer items-center gap-2">
                                <input type="checkbox" class="peer sr-only" data-activation-toggle
                                       data-url="{{ route('admin.language-activation.update', $language) }}"
                                       data-name="{{ $language->name }}" @checked($language->is_active)>
                                <span data-activation-badge class="text-xs font-bold {{ $language->is_active ? 'text-emerald-700' : 'text-gray-500' }}">{{ $language->is_active ? 'Live' : 'Hidden' }}</span>
                                <span class="relative h-6 w-11 rounded-full bg-gray-300 transition after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:bg-emerald-500 peer-checked:after:translate-x-5 peer-focus-visible:ring-2 peer-focus-visible:ring-brand-500 peer-focus-visible:ring-offset-2 peer-disabled:opacity-60" aria-hidden="true"></span>
                                <span class="sr-only">Offer {{ $language->name }} in the apps</span>
                            </label>
                    </div>

                    <dl class="mt-4 grid grid-cols-4 gap-2 text-center">
                        @foreach ([['Chapters', $language->chapters_count], ['Lessons', $lessonCount], ['Letters', $language->alphabet_letters_count], ['Learners', (int) ($learners[$language->id] ?? 0)]] as [$label, $value])
                            <div class="rounded-xl bg-gray-50 px-1 py-2">
                                <dd class="font-display text-base font-bold text-ink-900">{{ number_format($value) }}</dd>
                                <dt class="text-[11px] font-semibold text-gray-500">{{ $label }}</dt>
                            </div>
                        @endforeach
                    </dl>

                </article>
            @empty
                <div class="card p-10 text-center md:col-span-2 xl:col-span-3">
                    <p class="font-bold text-ink-900">No languages yet.</p>
                    <a href="{{ route('admin.languages.create') }}" class="mt-2 inline-block text-sm font-bold text-brand-600 hover:underline">Add the first one</a>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('scripts')
<script>
    (() => {
        const token = @json(csrf_token());
        const showToast = (message, ok) => window.adminToast(message, ok ? 'success' : 'error');

        const paint = (row, isActive) => {
            const badge = row.querySelector('[data-activation-badge]');
            badge.textContent = isActive ? 'Live' : 'Hidden';
            badge.className = 'text-xs font-bold ' + (isActive ? 'text-emerald-700' : 'text-gray-500');
        };

        document.querySelectorAll('[data-activation-toggle]').forEach((box) => {
            box.addEventListener('change', async () => {
                const row = box.closest('[data-language-row]');
                const desired = box.checked;
                // Ask first; the switch only moves once the admin agrees.
                box.checked = !desired;
                const name = box.dataset.name;
                const yes = await window.adminConfirm(desired
                    ? { title: 'Make ' + name + ' live?', message: 'Learners will see ' + name + ' in the web and mobile apps and can pick it as a course or as their own language.', ok: 'Yes, make live', tone: 'primary' }
                    : { title: 'Hide ' + name + '?', message: name + ' will disappear from the language lists in the apps. Learners already studying it keep their course and progress.', ok: 'Yes, hide it', tone: 'danger' });
                if (!yes) return;
                box.checked = desired;
                // Locked while saving, so a double click cannot send two
                // conflicting writes.
                box.disabled = true;
                try {
                    const res = await fetch(box.dataset.url, {
                        method: 'PATCH',
                        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': token, 'X-Requested-With': 'XMLHttpRequest' },
                        credentials: 'same-origin',
                        body: JSON.stringify({ is_active: desired }),
                    });
                    if (!res.ok) {
                        let detail = 'Request failed (' + res.status + ').';
                        if (res.status === 419) detail = 'Your session expired. Reload the page and try again.';
                        try { const err = await res.json(); if (err && err.message) detail = err.message; } catch (_) {}
                        throw new Error(detail);
                    }
                    const data = await res.json();
                    box.checked = data.isActive;
                    paint(row, data.isActive);
                    showToast(data.message, true);
                } catch (e) {
                    // Back to what the server still has, so the switch never
                    // shows a change that did not save.
                    box.checked = !desired;
                    paint(row, !desired);
                    showToast('Could not update ' + box.dataset.name + '. ' + e.message, false);
                } finally {
                    box.disabled = false;
                }
            });
        });
    })();
</script>
@endpush
