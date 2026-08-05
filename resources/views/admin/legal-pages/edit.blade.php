@extends('layouts.admin')

@php($useRichEditor = in_array($page->slug, ['terms', 'privacy']))

@section('title', 'Edit ' . $page->title)

@if ($useRichEditor)
    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
        <style>
            #editor { min-height: 420px; background: white; }
            .ql-editor h2 { font-size: 1.3em; font-weight: 700; margin-top: 0.8em; }
            .ql-editor h3 { font-size: 1.1em; font-weight: 700; margin-top: 0.8em; }
        </style>
    @endpush
@endif

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-3xl">
        <form id="legal-page-form" action="{{ route('admin.legal-pages.update', $page) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $page->title) }}" class="w-full border rounded px-3 py-2" maxlength="255">
                @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-2">
                <label class="block text-sm font-medium mb-1">Content</label>

                @if ($useRichEditor)
                    <div id="editor"></div>
                    <textarea name="content" class="hidden">{{ old('content', $page->content) }}</textarea>
                    <p class="text-xs text-gray-500 mt-2">
                        Just type and format like a normal document — use the toolbar for bold, headings, font size, lists, and links.
                        This is shown to every visitor on the public <code>/{{ $page->slug }}</code> page.
                    </p>
                @else
                    <textarea name="content" rows="22" class="w-full border rounded px-3 py-2 font-mono text-sm">{{ old('content', $page->content) }}</textarea>
                    <p class="text-xs text-gray-500 mt-2">
                        Basic HTML tags are supported: <code>&lt;h2&gt;</code>, <code>&lt;p&gt;</code>, <code>&lt;ul&gt;/&lt;li&gt;</code>,
                        <code>&lt;strong&gt;</code>, <code>&lt;a href="..."&gt;</code>. This is shown to every visitor on the public
                        <code>/{{ $page->slug }}</code> page — there is no preview here, so check the live page after saving.
                    </p>
                @endif
                @error('content') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
                <a href="{{ route('admin.legal-pages.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
@endsection

@if ($useRichEditor)
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var SizeStyle = Quill.import('attributors/style/size');
                SizeStyle.whitelist = ['small', false, 'large', 'huge'];
                Quill.register(SizeStyle, true);

                var quill = new Quill('#editor', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{ header: [2, 3, false] }],
                            ['bold', 'italic', 'underline'],
                            [{ size: ['small', false, 'large', 'huge'] }],
                            [{ list: 'ordered' }, { list: 'bullet' }],
                            [{ align: [] }],
                            ['link'],
                            ['clean'],
                        ],
                    },
                });

                var hiddenTextarea = document.querySelector('textarea[name="content"]');
                quill.root.innerHTML = hiddenTextarea.value;

                document.getElementById('legal-page-form').addEventListener('submit', function () {
                    hiddenTextarea.value = quill.root.innerHTML;
                });
            });
        </script>
    @endpush
@endif
