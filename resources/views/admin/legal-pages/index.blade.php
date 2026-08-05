@extends('layouts.admin')

@section('title', 'Content Pages')

@section('content')
    <p class="mb-4 text-sm text-gray-500">These pages are publicly visible on the website (Terms and Conditions, Privacy Policy, Contact Us) and are not linked to a specific language — content is shown as-is to every visitor.</p>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Slug</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Last Updated</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($pages as $page)
                    <tr>
                        <td class="px-4 py-2 font-mono text-sm text-gray-500">{{ $page->slug }}</td>
                        <td class="px-4 py-2">{{ $page->title }}</td>
                        <td class="px-4 py-2 text-sm text-gray-500">{{ $page->updated_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.legal-pages.edit', $page) }}" class="text-blue-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">No pages yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
