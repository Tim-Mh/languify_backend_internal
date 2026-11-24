@extends('layouts.admin')

@php($useRichEditor = in_array($slug, ['terms', 'privacy']))
@php($isSource = $locale === \App\Models\LegalPage::SOURCE_LOCALE)
@php($localeName = \App\Models\LegalPage::LOCALE_NAMES[$locale] ?? $locale)
@php($site = rtrim((string) config('app.frontend_url'), '/'))

@section('title', 'Edit ' . $source->title . ' (' . $localeName . ')')

@push('styles')
    @if ($useRichEditor)
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
        <style>
            #editor { min-height: 420px; background: white; font-size: 15px; }
            .ql-toolbar.ql-snow { border-radius: 0.75rem 0.75rem 0 0; border-color: #e5e7eb; background: #f9fafb; }
            .ql-container.ql-snow { border-radius: 0 0 0.75rem 0.75rem; border-color: #e5e7eb; }
            .ql-editor h2 { font-size: 1.3em; font-weight: 700; margin-top: 0.8em; }
            .ql-editor h3 { font-size: 1.1em; font-weight: 700; margin-top: 0.8em; }
        </style>
    @endif
    {{-- Tailwind's reset strips heading and list styles; give the English
         reference copy enough back to be readable. --}}
    <style>
        .legal-source h2 { font-size: 1.15em; font-weight: 700; margin: 1em 0 0.4em; }
        .legal-source h3 { font-weight: 700; margin: 0.8em 0 0.3em; }
        .legal-source p { margin: 0.5em 0; }
        .legal-source ul { list-style: disc; padding-left: 1.4em; }
        .legal-source ol { list-style: decimal; padding-left: 1.4em; }
        .legal-source a { color: #831b5a; text-decoration: underline; }
    </style>
@endpush

@section('content')
    <div class="mx-auto max-w-4xl space-y-5">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <a href="{{ route('admin.legal-pages.index') }}" class="inline-flex items-center gap-1 text-sm font-bold text-gray-500 hover:text-gray-900">
                <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
                Back to content pages
            </a>
            @if ($site)
                <a href="{{ $site.'/'.$slug }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1 text-sm font-bold text-brand-600 hover:underline">
                    View live page
                    <svg class="h-3.5 w-3.5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" /></svg>
                </a>
            @endif
        </div>

        {{-- One tab per language. English is the source everything else is
             translated from, so it is first and labelled as such. --}}
        <nav aria-label="Language" class="card p-3">
            <p class="mb-2 px-1 text-xs font-bold text-gray-500">Language</p>
            <div class="flex flex-wrap gap-2">
                @foreach (\App\Models\LegalPage::LOCALES as $code)
                    @php($row = $translations->get($code))
                    @php($written = $row && trim((string) $row->content) !== '')
                    @php($stale = $row && $row->isOutdated($source))
                    @php($current = $code === $locale)
                    <a href="{{ route('admin.legal-pages.edit', ['legal_page' => $slug, 'locale' => $code]) }}"
                       @if ($current) aria-current="page" @endif
                       class="inline-flex items-center gap-1.5 rounded-full px-3 py-1.5 text-sm font-bold transition {{ $current ? 'bg-brand-500 text-white shadow-md shadow-brand-500/30' : 'bg-white text-gray-600 ring-1 ring-gray-200 hover:text-gray-900' }}">
                        {{ \App\Models\LegalPage::LOCALE_NAMES[$code] ?? $code }}
                        @if ($code === \App\Models\LegalPage::SOURCE_LOCALE)
                            <span class="text-xs font-semibold {{ $current ? 'text-white/80' : 'text-gray-400' }}">source</span>
                        @elseif (! $written)
                            <span class="text-xs font-semibold {{ $current ? 'text-white/80' : 'text-gray-400' }}">empty</span>
                        @else
                            <svg class="h-3.5 w-3.5 {{ $current ? 'text-white' : 'text-emerald-600' }}" aria-label="written" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                        @endif
                    </a>
                @endforeach
            </div>
        </nav>

        @if (! $isSource && ! $page)
            <div class="rounded-xl bg-gray-50 px-4 py-3 text-sm text-gray-700 ring-1 ring-gray-200">
                Nothing written in {{ $localeName }} yet. Until you save something here, learners with this
                language are shown the English page.
            </div>
        @endif

        <form id="legal-page-form" action="{{ route('admin.legal-pages.update', ['legal_page' => $slug]) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <input type="hidden" name="locale" value="{{ $locale }}">

            <div class="card space-y-5 p-4 sm:p-6">
                <div>
                    <label for="title" class="field-label">Title <span class="font-normal text-gray-400">({{ $localeName }})</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title', $page->title ?? $source->title) }}" maxlength="255" class="field-input">
                    @error('title') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label @if (! $useRichEditor) for="content" @endif class="field-label">Full text <span class="font-normal text-gray-400">({{ $localeName }})</span></label>

                    @if ($useRichEditor)
                        <div id="editor"></div>
                        {{-- Deliberately blank rather than pre-filled with the English when a
                             translation does not exist yet: a page that looks translated but is
                             not is the exact problem this feature exists to avoid. The English
                             is shown below to translate from. --}}
                        <textarea name="content" class="hidden">{{ old('content', $page->content ?? '') }}</textarea>
                        <p class="field-hint mt-2">
                            Type and format it like a normal document: use the toolbar for headings, bold, font size, lists and links.
                            @if ($isSource)
                                This is the source text, the one the other languages are translated from.
                            @else
                                Shown to learners whose app language is {{ $localeName }}.
                            @endif
                        </p>
                    @else
                        <textarea id="content" name="content" rows="22" class="field-input font-mono text-sm">{{ old('content', $page->content ?? '') }}</textarea>
                        <p class="field-hint mt-2">
                            Basic HTML tags are supported: <code>&lt;h2&gt;</code>, <code>&lt;p&gt;</code>, <code>&lt;ul&gt;/&lt;li&gt;</code>,
                            <code>&lt;strong&gt;</code>, <code>&lt;a href="..."&gt;</code>.
                        </p>
                    @endif
                    @error('content') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.legal-pages.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary px-6">Save {{ $localeName }}</button>
            </div>
        </form>

        {{-- The English, to translate from, so the admin is not flipping tabs and
             holding a legal document in their head. --}}
        @if (! $isSource)
            <section class="card p-4 sm:p-6">
                <h2 class="font-display text-base font-bold text-ink-900">English original</h2>
                <p class="text-xs text-gray-500">For reference while translating. Not editable here.</p>
                <div class="legal-source mt-3 max-h-96 overflow-y-auto break-words rounded-xl bg-gray-50 p-4 text-sm text-gray-800 ring-1 ring-gray-200">
                    {!! $source->content !!}
                </div>
            </section>
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
