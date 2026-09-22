@extends('layouts.admin')

@php($useRichEditor = in_array($slug, ['terms', 'privacy']))
@php($isSource = $locale === \App\Models\LegalPage::SOURCE_LOCALE)
@php($localeName = \App\Models\LegalPage::LOCALE_NAMES[$locale] ?? $locale)

@section('title', 'Edit ' . $source->title . ' — ' . $localeName)

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
    <div class="max-w-3xl">
        {{-- One tab per language. English is the source everything else is
             translated from, so it is first and labelled as such. --}}
        <div class="flex flex-wrap gap-1 mb-4 border-b">
            @foreach (\App\Models\LegalPage::LOCALES as $code)
                @php($row = $translations->get($code))
                @php($written = $row && trim((string) $row->content) !== '')
                @php($stale = $row && $row->isOutdated($source))
                <a href="{{ route('admin.legal-pages.edit', ['legal_page' => $slug, 'locale' => $code]) }}"
                   class="px-3 py-2 -mb-px border-b-2 text-sm {{ $code === $locale ? 'border-blue-600 text-blue-700 font-semibold' : 'border-transparent text-gray-600 hover:text-gray-900' }}">
                    {{ \App\Models\LegalPage::LOCALE_NAMES[$code] ?? $code }}
                    @if ($code === \App\Models\LegalPage::SOURCE_LOCALE)
                        <span class="ml-1 text-xs text-gray-400">source</span>
                    @elseif ($stale)
                        <span class="ml-1 text-xs text-amber-600" title="The English text changed after this was written">out of date</span>
                    @elseif (! $written)
                        <span class="ml-1 text-xs text-gray-400">empty</span>
                    @else
                        <span class="ml-1 text-xs text-green-600">&check;</span>
                    @endif
                </a>
            @endforeach
        </div>

        @if ($outdated)
            <div class="mb-4 rounded border border-amber-300 bg-amber-50 px-4 py-3 text-sm text-amber-900">
                <strong>The English version changed after this translation was written.</strong>
                Re-read it against the English and save again to clear this notice. Learners are still
                being shown this text in the meantime.
            </div>
        @endif

        @if (! $isSource && ! $page)
            <div class="mb-4 rounded border border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-700">
                Nothing written in {{ $localeName }} yet. Until you save something here, learners with this
                language are shown the English page.
            </div>
        @endif

        <div class="bg-white rounded-lg shadow p-6">
            <form id="legal-page-form" action="{{ route('admin.legal-pages.update', ['legal_page' => $slug]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="locale" value="{{ $locale }}">

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Title <span class="text-gray-400">({{ $localeName }})</span></label>
                    <input type="text" name="title" value="{{ old('title', $page->title ?? $source->title) }}" class="w-full border rounded px-3 py-2" maxlength="255">
                    @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-2">
                    <label class="block text-sm font-medium mb-1">Content <span class="text-gray-400">({{ $localeName }})</span></label>

                    @if ($useRichEditor)
                        <div id="editor"></div>
                        {{-- Deliberately blank rather than pre-filled with the English when a
                             translation does not exist yet: a page that looks translated but is
                             not is the exact problem this feature exists to avoid. The English
                             is shown side by side below to translate from. --}}
                        <textarea name="content" class="hidden">{{ old('content', $page->content ?? '') }}</textarea>
                        <p class="text-xs text-gray-500 mt-2">
                            Just type and format like a normal document — use the toolbar for bold, headings, font size, lists, and links.
                            @if ($isSource)
                                This is the source text. Editing it marks every translation made from the old version as out of date.
                            @else
                                Shown to learners whose app language is {{ $localeName }}.
                            @endif
                        </p>
                    @else
                        <textarea name="content" rows="22" class="w-full border rounded px-3 py-2 font-mono text-sm">{{ old('content', $page->content ?? '') }}</textarea>
                        <p class="text-xs text-gray-500 mt-2">
                            Basic HTML tags are supported: <code>&lt;h2&gt;</code>, <code>&lt;p&gt;</code>, <code>&lt;ul&gt;/&lt;li&gt;</code>,
                            <code>&lt;strong&gt;</code>, <code>&lt;a href="..."&gt;</code>.
                        </p>
                    @endif
                    @error('content') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save {{ $localeName }}</button>
                    <a href="{{ route('admin.legal-pages.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
                </div>
            </form>
        </div>

        {{-- The English, to translate from, so the admin is not flipping tabs and
             holding a legal document in their head. --}}
        @if (! $isSource)
            <div class="mt-6 bg-white rounded-lg shadow p-6">
                <h2 class="text-sm font-semibold text-gray-700 mb-2">English (source)</h2>
                <div class="prose prose-sm max-w-none border rounded p-4 bg-gray-50 max-h-96 overflow-y-auto">
                    {!! $source->content !!}
                </div>
            </div>
        @endif
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
