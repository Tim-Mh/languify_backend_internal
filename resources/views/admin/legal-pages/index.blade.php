@extends('layouts.admin')

@section('title', 'Content Pages')

@section('content')
    <p class="mb-4 text-sm text-gray-500">
        These pages are shown on the website and in the mobile app (Terms and Conditions, Privacy Policy).
        Each one is written in English first and can then be translated into every language the app offers —
        click Edit and use the language tabs. Anyone whose language has not been translated yet is shown the
        English version, so a page is never blank.
    </p>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Slug</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Translations</th>
                    <th class="px-4 py-2">Last Updated</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($pages as $page)
                    @php($stats = $summary[$page->slug] ?? ['written' => 0, 'total' => 0, 'outdated' => 0])
                    <tr>
                        <td class="px-4 py-2 font-mono text-sm text-gray-500">{{ $page->slug }}</td>
                        <td class="px-4 py-2">{{ $page->title }}</td>
                        <td class="px-4 py-2 text-sm">
                            <span class="text-gray-700">{{ $stats['written'] }} / {{ $stats['total'] }}</span>
                            @if ($stats['outdated'] > 0)
                                <span class="ml-2 rounded bg-amber-100 px-2 py-0.5 text-xs text-amber-800">
                                    {{ $stats['outdated'] }} out of date
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-500">{{ $page->updated_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.legal-pages.edit', ['legal_page' => $page->slug]) }}" class="text-blue-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">No pages yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
