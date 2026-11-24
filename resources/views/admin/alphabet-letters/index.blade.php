@extends('layouts.admin')

@section('title', 'Alphabet')

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">
        {{-- One row that scrolls sideways (swipe or mouse wheel). --}}
        <nav id="language-strip" data-hscroll class="-mx-1 flex gap-2 overflow-x-auto overscroll-x-contain px-1 py-1 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden" aria-label="Choose a language">
            @foreach ($languages as $language)
                @php $current = $selectedLanguage?->id === $language->id; @endphp
                <a href="{{ route('admin.alphabet-letters.index', ['language_id' => $language->id]) }}" @if ($current) aria-current="page" @endif class="{{ $current ? 'chip-active' : 'chip' }} shrink-0 whitespace-nowrap">
                    {{ $language->flag_emoji }} {{ $language->name }}
                    <span class="rounded-full px-2 py-0.5 text-xs {{ $current ? 'bg-white/20' : 'bg-gray-100 text-gray-500' }}">{{ $language->alphabet_letters_count }}</span>
                </a>
            @endforeach
        </nav>
        <script>document.querySelector('#language-strip [aria-current]')?.scrollIntoView({ block: 'nearest', inline: 'center' });</script>

        @if ($selectedLanguage)
            <div class="flex flex-wrap items-center justify-between gap-3">
                <h2 class="font-display text-xl font-bold text-ink-900">{{ $selectedLanguage->flag_emoji }} {{ $selectedLanguage->name }} <span class="text-base font-semibold text-gray-400">{{ $letters->count() }} letters</span></h2>
                <a href="{{ route('admin.alphabet-letters.create', ['language_id' => $selectedLanguage->id]) }}" class="btn-primary">+ Add letter</a>
            </div>

            @forelse ($letters->groupBy(fn ($letter) => $letter->script_group ?: '') as $group => $groupLetters)
                <section class="space-y-3">
                    @if ($group !== '')
                        <h3 class="text-sm font-bold uppercase tracking-wide text-gray-500">{{ ucfirst($group) }} <span class="font-semibold normal-case text-gray-400">· {{ $groupLetters->count() }}</span></h3>
                    @endif
                    <ul class="grid grid-cols-2 gap-3 sm:grid-cols-4 lg:grid-cols-6">
                        @foreach ($groupLetters as $letter)
                            <li class="card group relative flex flex-col items-center px-3 pb-3 pt-6 text-center">
                                <span class="absolute left-3 top-2 text-[11px] font-bold text-gray-300">{{ $letter->order_number }}</span>
                                <span class="font-display text-4xl font-bold text-ink-900" lang="{{ $selectedLanguage->code }}">{{ $letter->character }}</span>
                                <span class="mt-1 text-sm font-bold text-brand-600">{{ $letter->romanization ?: ' ' }}</span>
                                <span class="mt-0.5 w-full truncate text-xs text-gray-500" lang="{{ $selectedLanguage->code }}">{{ $letter->example_word }}</span>
                                {{-- Corner buttons, shown on hover or keyboard focus. --}}
                                <div class="absolute right-1 top-1 rounded-lg bg-white/90 transition sm:opacity-0 sm:group-hover:opacity-100 sm:group-focus-within:opacity-100">
                                    <x-admin.row-actions :edit="route('admin.alphabet-letters.edit', $letter)" :delete="route('admin.alphabet-letters.destroy', $letter)" :name="'letter '.$letter->character" confirm="It disappears from the {{ $selectedLanguage->name }} alphabet screen." />
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @empty
                <div class="card p-10 text-center">
                    <p class="font-bold text-ink-900">{{ $selectedLanguage->name }} has no alphabet letters yet.</p>
                    <p class="mt-1 text-sm text-gray-500">Languages written in the Latin alphabet usually don't need any.</p>
                </div>
            @endforelse
        @endif
    </div>
@endsection
