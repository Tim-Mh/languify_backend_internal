@extends('layouts.admin')

@section('title', 'Language Activation')

@section('content')
    <div class="mb-4 rounded bg-blue-50 border border-blue-200 text-blue-900 px-4 py-3 text-sm">
        Tick a language to make it selectable in the web app and the mobile app.
        Unticked languages are hidden from the native-language and
        learning-language pickers. Learners already studying a language keep
        their course and progress either way.
    </div>

    <div id="activation-toast" class="hidden mb-4 rounded px-4 py-2 text-sm"></div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2 w-20">Active</th>
                    <th class="px-4 py-2 w-16">Flag</th>
                    <th class="px-4 py-2">Language</th>
                    <th class="px-4 py-2">Native Name</th>
                    <th class="px-4 py-2 w-24">Code</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($languages as $language)
                    <tr data-language-row="{{ $language->id }}">
                        <td class="px-4 py-3">
                            <input
                                type="checkbox"
                                class="h-5 w-5 cursor-pointer align-middle"
                                data-activation-toggle
                                data-url="{{ route('admin.language-activation.update', $language) }}"
                                data-name="{{ $language->name }}"
                                {{ $language->is_active ? 'checked' : '' }}>
                        </td>
                        <td class="px-4 py-3 text-xl">{{ $language->flag_emoji }}</td>
                        <td class="px-4 py-3 font-medium">{{ $language->name }}</td>
                        <td class="px-4 py-3">{{ $language->native_name }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $language->code }}</td>
                        <td class="px-4 py-3">
                            <span data-activation-badge
                                class="px-2 py-0.5 rounded text-sm {{ $language->is_active ? 'text-green-700 bg-green-100' : 'text-gray-600 bg-gray-100' }}">
                                {{ $language->is_active ? 'Live' : 'Hidden' }}
                            </span>
                            {{-- A language can be live as an interface language while
                                 its course is still unwritten. Worth showing here so an
                                 admin does not read "Live" as "the course is ready". --}}
                            @unless ($language->is_learnable)
                                <span class="ml-1 px-2 py-0.5 rounded text-sm text-amber-700 bg-amber-100" title="Offered as an interface language only. Hidden from the learning-language picker.">Interface only</span>
                            @endunless
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">No languages yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script>
    (function () {
        const token = @json(csrf_token());
        const toast = document.getElementById('activation-toast');
        let hideTimer = null;

        function showToast(message, ok) {
            toast.textContent = message;
            toast.className = 'mb-4 rounded px-4 py-2 text-sm ' +
                (ok ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800');
            clearTimeout(hideTimer);
            hideTimer = setTimeout(() => toast.classList.add('hidden'), 3000);
        }

        function paintBadge(row, isActive) {
            const badge = row.querySelector('[data-activation-badge]');
            badge.textContent = isActive ? 'Live' : 'Hidden';
            badge.className = 'px-2 py-0.5 rounded text-sm ' +
                (isActive ? 'text-green-700 bg-green-100' : 'text-gray-600 bg-gray-100');
        }

        document.querySelectorAll('[data-activation-toggle]').forEach((box) => {
            box.addEventListener('change', async () => {
                const row = box.closest('[data-language-row]');
                const desired = box.checked;

                // Locked while in flight so a double-click cannot send two
                // conflicting writes and leave the box disagreeing with the DB.
                box.disabled = true;

                try {
                    const res = await fetch(box.dataset.url, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        credentials: 'same-origin',
                        body: JSON.stringify({ is_active: desired }),
                    });

                    if (!res.ok) {
                        // Surface the server's reason when it sent one. A 419
                        // (expired session) renders HTML, not JSON, so the
                        // parse is allowed to fail quietly.
                        let detail = 'Request failed (' + res.status + ').';
                        if (res.status === 419) detail = 'Your session expired. Reload the page and try again.';
                        try {
                            const err = await res.json();
                            if (err && err.message) detail = err.message;
                        } catch (_) { /* not JSON */ }
                        throw new Error(detail);
                    }

                    const data = await res.json();
                    box.checked = data.isActive;
                    paintBadge(row, data.isActive);
                    showToast(data.message, true);
                } catch (e) {
                    // Snap back to what the server still believes, so the
                    // checkbox never shows a change that did not save.
                    box.checked = !desired;
                    paintBadge(row, !desired);
                    showToast('Could not update ' + box.dataset.name + '. ' + e.message, false);
                } finally {
                    box.disabled = false;
                }
            });
        });
    })();
</script>
@endpush
