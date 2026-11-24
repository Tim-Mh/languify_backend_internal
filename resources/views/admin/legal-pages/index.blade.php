@extends('layouts.admin')

@section('title', 'Content pages')

@php $site = rtrim((string) config('app.frontend_url'), '/'); @endphp

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($pages as $page)
                @php
                    $stats = $summary[$page->slug] ?? ['written' => 0, 'total' => 0, 'outdated' => 0];
                    $percent = $stats['total'] ? (int) round($stats['written'] / $stats['total'] * 100) : 0;
                @endphp
                <article class="card flex flex-col p-5">
                    <div class="flex items-start gap-3">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600">
                            <svg class="h-6 w-6" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" /></svg>
                        </span>
                        <div class="min-w-0">
                            <h2 class="font-display text-lg font-bold text-ink-900">{{ $page->title }}</h2>
                            <p class="truncate font-mono text-xs text-gray-500">/{{ $page->slug }}</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="flex items-center justify-between gap-2 text-sm">
                            <span class="font-bold text-ink-800">Translations</span>
                            <span class="text-gray-600">{{ $stats['written'] }} of {{ $stats['total'] }} languages</span>
                        </div>
                        <div class="mt-1.5 h-2 overflow-hidden rounded-full bg-gray-100" role="img" aria-label="{{ $percent }}% translated">
                            <div class="h-full rounded-full bg-brand-500" style="width: {{ $percent }}%"></div>
                        </div>
                    </div>

                    <p class="mt-3 text-xs text-gray-500">
                        English last updated <span class="font-semibold text-gray-700" title="{{ $page->updated_at->format('M j, Y g:i a') }}">{{ $page->updated_at->format('M j, Y') }}</span>
                        ({{ $page->updated_at->diffForHumans() }})
                    </p>

                    <div class="mt-auto pt-4"><div class="flex flex-wrap items-center justify-between gap-2 border-t border-gray-100 pt-3">
                        @if ($site)
                            <a href="{{ $site.'/'.$page->slug }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1 text-sm font-bold text-brand-600 hover:underline">
                                View live page
                                <svg class="h-3.5 w-3.5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" /></svg>
                            </a>
                        @else
                            <span></span>
                        @endif
                        <a href="{{ route('admin.legal-pages.edit', ['legal_page' => $page->slug]) }}" class="btn-secondary py-2">Edit page</a>
                    </div></div>
                </article>
            @empty
                <div class="card p-10 text-center md:col-span-2 lg:col-span-3">
                    <p class="font-bold text-ink-900">No pages yet.</p>
                </div>
            @endforelse
        </div>

        <p class="text-xs text-gray-500">
            The Contact us page is not edited here. Messages sent through it are in
            <a href="{{ route('admin.contact-messages.index') }}" class="font-bold text-brand-600 hover:underline">Contact messages</a>.
        </p>
    </div>
@endsection
