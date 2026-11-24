@php
    // ?modal=1: the page is being shown inside the edit popup, so it drops
    // the sidebar and header and shows only the form.
    $inModal = request()->boolean('modal');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- The learner app's brand colours (web src/index.css). Pages can use
         brand-* and ink-* alongside Tailwind's own palette. --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { 50: '#fdf2f8', 100: '#fce7f3', 400: '#e878bb', 500: '#9e1a69', 600: '#831b5a', 700: '#6f154b', 900: '#3b0a28' },
                        ink: { 800: '#30213f', 900: '#281b37', 950: '#1c1227' },
                    },
                    fontFamily: {
                        display: ['"Twemoji Country Flags"', 'Poppins', 'Nunito', 'system-ui', 'sans-serif'],
                        body: ['"Twemoji Country Flags"', 'Nunito', 'system-ui', 'sans-serif'],
                    },
                },
            },
        };
    </script>
    {{-- Shared building blocks for every admin page, so a button or a field
         looks the same everywhere without repeating a dozen utilities. --}}
    {{-- Windows has no flag emoji and shows letters like "SA" instead, so
         flag characters (and only those) come from this font. Twemoji
         artwork, CC-BY 4.0. --}}
    <style>
        @font-face {
            font-family: "Twemoji Country Flags";
            src: url("{{ asset('fonts/TwemojiCountryFlags.woff2') }}") format("woff2");
            unicode-range: U+1F1E6-1F1FF, U+1F3F4, U+E0062-E007F;
            font-display: swap;
        }
    </style>
    <style type="text/tailwindcss">
        @layer components {
            .card { @apply rounded-2xl bg-white shadow-sm ring-1 ring-gray-100; }
            .btn { @apply inline-flex items-center justify-center gap-2 rounded-xl px-4 py-2.5 text-sm font-bold transition disabled:opacity-60; }
            .btn-primary { @apply btn bg-brand-600 text-white hover:bg-brand-700; }
            .btn-secondary { @apply btn bg-white text-gray-700 ring-1 ring-gray-200 hover:bg-gray-50; }
            .btn-danger { @apply btn bg-white text-rose-600 ring-1 ring-rose-200 hover:bg-rose-50; }
            .icon-btn { @apply inline-flex rounded-lg p-2 text-gray-500 transition hover:bg-gray-100 hover:text-brand-600; }
            .field-label { @apply mb-1.5 block text-sm font-bold text-ink-800; }
            .field-input { @apply w-full rounded-xl border border-gray-200 bg-white px-3 py-2.5 text-ink-900 outline-none transition focus:border-brand-400 focus:ring-2 focus:ring-brand-500/30; }
            .field-hint { @apply mt-1 text-xs text-gray-500; }
            .field-error { @apply mt-1 text-sm text-rose-600; }
            .th { @apply px-4 py-3 text-xs font-bold uppercase tracking-wide text-gray-500; }
            .td { @apply px-4 py-3; }
            .chip { @apply inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-sm font-bold text-gray-600 ring-1 ring-gray-200 transition hover:text-gray-900; }
            .chip-active { @apply inline-flex items-center gap-2 rounded-full bg-brand-500 px-4 py-2 text-sm font-bold text-white shadow-md shadow-brand-500/30; }
            .tag { @apply inline-flex items-center whitespace-nowrap rounded-full px-2.5 py-1 text-xs font-bold; }
            /* A list inside a card keeps its height and scrolls instead of
               stretching the card as more rows arrive. */
            .scroll-list { @apply max-h-80 overflow-y-auto overscroll-contain pr-2 [scrollbar-width:thin] [scrollbar-color:#d1d5db_transparent]; }
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-100 font-body text-gray-900 antialiased">
    @if ($inModal)
        <style>
            html { scrollbar-width: none; }
            html::-webkit-scrollbar { display: none; }
        </style>
        <header class="sticky top-0 z-20 flex items-center gap-3 border-b border-gray-200 bg-white px-5 py-3">
            <h1 class="min-w-0 flex-1 truncate font-display text-lg font-bold text-ink-900">@yield('title', 'Edit')</h1>
            <button type="button" data-modal-close class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900" aria-label="Close">
                <svg class="h-5 w-5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
            </button>
        </header>
        <main class="p-4 sm:p-6">
            @yield('content')
        </main>
        <script>
            // Cancel, the X and Escape close the popup in the page behind.
            const closePopup = () => window.parent !== window && window.parent.adminCloseEditor?.()
            document.addEventListener('click', (event) => { if (event.target.closest('[data-modal-close]')) { event.preventDefault(); closePopup() } })
            document.addEventListener('keydown', (event) => { if (event.key === 'Escape' && !document.querySelector('#confirm-modal.flex')) closePopup() })
        </script>
    @else
    <div class="flex min-h-screen">
        {{-- Below lg the sidebar is a drawer opened from the header's menu
             button; from lg up it is always there. --}}
        <div id="nav-backdrop" class="fixed inset-0 z-30 hidden bg-black/50 lg:hidden"></div>
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 flex w-72 -translate-x-full flex-col bg-gradient-to-b from-ink-900 to-ink-950 text-white transition-transform duration-200 lg:sticky lg:top-0 lg:h-screen lg:w-64 lg:translate-x-0">
            <div class="flex items-center justify-between gap-3 border-b border-white/10 px-5 py-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white p-1">
                        <img src="{{ asset('images/admin/logo.webp') }}" alt="" class="h-full w-auto">
                    </span>
                    <span class="leading-tight">
                        <span class="block font-display text-base font-bold">{{ config('app.name') }}</span>
                        <span class="block text-xs font-semibold text-white/50">Admin panel</span>
                    </span>
                </a>
                <button type="button" id="nav-close" class="rounded-lg p-2 text-white/60 hover:bg-white/10 hover:text-white lg:hidden" aria-label="Close menu">
                    <svg class="h-5 w-5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                </button>
            </div>

            @include('layouts.partials.admin-nav')

            <div class="border-t border-white/10 p-3">
                <div class="flex items-center gap-3 rounded-xl px-2 py-2">
                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-brand-500 text-sm font-bold uppercase">
                        {{ mb_substr(auth()->user()->full_name ?: auth()->user()->email, 0, 1) }}
                    </span>
                    <span class="min-w-0 flex-1 leading-tight">
                        <span class="block truncate text-sm font-bold">{{ auth()->user()->full_name ?: 'Admin' }}</span>
                        <span class="block truncate text-xs text-white/50">{{ auth()->user()->email }}</span>
                    </span>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="rounded-lg p-2 text-white/60 hover:bg-white/10 hover:text-white" aria-label="Log out" title="Log out">
                            <svg class="h-5 w-5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" /></svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <div class="flex min-w-0 flex-1 flex-col">
            <header class="sticky top-0 z-20 flex items-center gap-3 border-b border-gray-200 bg-white/90 px-4 py-3 backdrop-blur sm:px-6">
                <button type="button" id="nav-open" class="-ml-1 rounded-lg p-2 text-gray-600 hover:bg-gray-100 lg:hidden" aria-label="Open menu" aria-controls="sidebar" aria-expanded="false">
                    <svg class="h-6 w-6" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
                </button>
                <h1 class="min-w-0 flex-1 truncate font-display text-lg font-bold text-ink-900 sm:text-xl">@yield('title', 'Dashboard')</h1>
            </header>

            <main class="flex-1 p-4 sm:p-6">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- Edit popup. Any "edit" or "add" link in the panel opens its form here,
         over the current page, instead of leaving it. The form page is loaded
         in a frame with ?modal=1. After a save the frame lands back on a
         normal page: its messages are carried over and this page reloads, so
         the list shows the change. A form with errors simply stays open. --}}
    <div id="editor-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-ink-950/60 p-2 backdrop-blur-sm sm:p-6" role="dialog" aria-modal="true" aria-label="Edit">
        <div class="relative flex h-full max-h-[56rem] w-full max-w-4xl flex-col overflow-hidden rounded-2xl bg-gray-100 shadow-2xl">
            <div id="editor-loading" class="absolute inset-0 flex items-center justify-center bg-gray-100">
                <svg class="h-8 w-8 animate-spin text-brand-500" aria-hidden="true" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8v4a4 4 0 0 0-4 4H4z"></path></svg>
                <span class="sr-only">Loading</span>
            </div>
            <iframe id="editor-frame" title="Edit" class="h-full w-full flex-1 border-0"></iframe>
        </div>
    </div>
    <script>
        (() => {
            const modal = document.getElementById('editor-modal')
            const frame = document.getElementById('editor-frame')
            const loading = document.getElementById('editor-loading')
            const formPage = (url) => url.origin === location.origin && /^\/admin\/.+\/(edit|create)$/.test(url.pathname)
            let returnFocus = null
            let submitted = false

            const close = () => {
                modal.classList.add('hidden')
                modal.classList.remove('flex')
                frame.removeAttribute('src')
                document.body.classList.remove('overflow-hidden')
                returnFocus?.focus()
            }
            window.adminCloseEditor = close

            const open = (url) => {
                url.searchParams.set('modal', '1')
                submitted = false
                loading.classList.remove('hidden')
                frame.src = url.toString()
                modal.classList.remove('hidden')
                modal.classList.add('flex')
                document.body.classList.add('overflow-hidden')
            }

            document.addEventListener('click', (event) => {
                const link = event.target.closest('a[href]')
                if (!link || link.target || event.ctrlKey || event.metaKey || event.shiftKey || event.button !== 0 || link.hasAttribute('data-no-popup')) return
                const url = new URL(link.href, location.href)
                if (!formPage(url)) return
                event.preventDefault()
                returnFocus = link
                open(url)
            })

            frame.addEventListener('load', () => {
                let doc, url
                try { doc = frame.contentDocument; url = new URL(frame.contentWindow.location.href) } catch (e) { return }
                if (!doc || url.href === 'about:blank') return
                if (formPage(url)) {
                    loading.classList.add('hidden')
                    doc.addEventListener('submit', () => { submitted = true })
                    // Whatever page loads next (the list after a save, or the
                    // form again with errors) stays behind the spinner until
                    // it is known, so the popup never shows a full page.
                    frame.contentWindow.addEventListener('beforeunload', () => loading.classList.remove('hidden'))
                    doc.querySelector('input:not([type=hidden]), select, textarea')?.focus()
                    return
                }
                // Saved (or left the form): carry its messages over and refresh.
                const messages = [...doc.querySelectorAll('#toasts [role]')].map((toast) => ({
                    text: toast.querySelector('p')?.textContent || '',
                    type: toast.getAttribute('role') === 'alert' ? 'error' : 'success',
                })).filter((message) => message.text)
                close()
                if (messages.length || submitted) {
                    try { sessionStorage.setItem('admin-toasts', JSON.stringify(messages)) } catch (e) {}
                    location.reload()
                }
            })

            modal.addEventListener('click', (event) => { if (event.target === modal) close() })
            document.addEventListener('keydown', (event) => { if (event.key === 'Escape' && modal.classList.contains('flex')) close() })
        })()
    </script>
    @endif

    @unless ($inModal)
    <script>
        (() => {
            // Drawer below lg.
            const sidebar = document.getElementById('sidebar')
            const backdrop = document.getElementById('nav-backdrop')
            const openButton = document.getElementById('nav-open')
            const setOpen = (open) => {
                sidebar.classList.toggle('-translate-x-full', !open)
                backdrop.classList.toggle('hidden', !open)
                openButton.setAttribute('aria-expanded', open ? 'true' : 'false')
            }
            openButton.addEventListener('click', () => setOpen(true))
            document.getElementById('nav-close').addEventListener('click', () => setOpen(false))
            backdrop.addEventListener('click', () => setOpen(false))
            document.addEventListener('keydown', (event) => { if (event.key === 'Escape') setOpen(false) })

            // Groups remember being folded away; the one holding the current
            // page always stays open.
            const KEY = 'admin-nav-closed'
            let closed = []
            try { closed = JSON.parse(localStorage.getItem(KEY) || '[]') } catch (e) {}
            document.querySelectorAll('.nav-group').forEach((group) => {
                const hasCurrent = group.querySelector('[data-active-group]')
                if (closed.includes(group.dataset.group) && !hasCurrent) group.open = false
                group.addEventListener('toggle', () => {
                    const name = group.dataset.group
                    closed = closed.filter((key) => key !== name)
                    if (!group.open) closed.push(name)
                    try { localStorage.setItem(KEY, JSON.stringify(closed)) } catch (e) {}
                })
            })
            document.querySelector('[aria-current="page"]')?.scrollIntoView({ block: 'nearest' })
        })()
    </script>
    @endunless

    {{-- Confirmation popup for any form marked data-confirm="message"
         (optional data-confirm-title), used instead of the browser's alert. --}}
    <div id="confirm-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4" role="dialog" aria-modal="true" aria-labelledby="confirm-title">
        <div class="w-full max-w-sm rounded-xl bg-white p-6 shadow-xl">
            <h2 id="confirm-title" class="text-lg font-semibold text-gray-900">Are you sure?</h2>
            <p id="confirm-message" class="mt-2 text-sm text-gray-600"></p>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" id="confirm-cancel" class="rounded border border-gray-300 px-4 py-2 text-sm hover:bg-gray-50">Cancel</button>
                <button type="button" id="confirm-ok" class="rounded bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">Delete</button>
            </div>
        </div>
    </div>
    <script>
        (() => {
            const modal = document.getElementById('confirm-modal')
            const ok = document.getElementById('confirm-ok')
            const tones = {
                danger: 'rounded bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700',
                primary: 'rounded bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-700',
            }
            let resolver = null

            const finish = (answer) => {
                modal.classList.add('hidden')
                modal.classList.remove('flex')
                const done = resolver
                resolver = null
                done?.(answer)
            }

            // window.adminConfirm({ title, message, ok, tone }) resolves true
            // when the admin confirms, false when they cancel.
            window.adminConfirm = ({ title = 'Are you sure?', message = '', ok: okLabel = 'Delete', tone = 'danger' } = {}) => {
                resolver?.(false)
                document.getElementById('confirm-title').textContent = title
                document.getElementById('confirm-message').textContent = message
                ok.textContent = okLabel
                ok.className = tones[tone] || tones.danger
                ok.disabled = false
                modal.classList.remove('hidden')
                modal.classList.add('flex')
                ok.focus()
                return new Promise((resolve) => { resolver = resolve })
            }

            document.addEventListener('submit', async (event) => {
                const form = event.target
                if (!form.matches('form[data-confirm]') || form.dataset.confirmed) return
                event.preventDefault()
                const yes = await window.adminConfirm({ title: form.dataset.confirmTitle, message: form.dataset.confirm })
                if (!yes) return
                form.dataset.confirmed = '1'
                ok.disabled = true
                form.submit()
            })

            ok.addEventListener('click', () => {
                const done = resolver
                resolver = null
                modal.classList.add('hidden')
                modal.classList.remove('flex')
                done?.(true)
            })
            document.getElementById('confirm-cancel').addEventListener('click', () => finish(false))
            modal.addEventListener('click', (event) => { if (event.target === modal) finish(false) })
            document.addEventListener('keydown', (event) => { if (event.key === 'Escape' && resolver) finish(false) })
        })()
    </script>
    {{-- Toasts: every "saved", "deleted" or error message in the panel shows
         here, top right, and fades away by itself. Pages that save without a
         reload call window.adminToast(message, 'success' | 'error'). --}}
    <div id="toasts" class="pointer-events-none fixed right-4 top-4 z-[60] flex w-[calc(100%-2rem)] max-w-sm flex-col gap-2" aria-live="polite" aria-atomic="false"></div>
    <script>
        (() => {
            const stack = document.getElementById('toasts')
            const styles = {
                success: { box: 'bg-white ring-emerald-200', icon: 'text-emerald-600 bg-emerald-100', path: 'm4.5 12.75 6 6 9-13.5' },
                error: { box: 'bg-white ring-rose-200', icon: 'text-rose-600 bg-rose-100', path: 'M12 9v3.75m0 3.75h.008v.008H12v-.008Z' },
            }

            window.adminToast = (message, type = 'success') => {
                const style = styles[type] || styles.success
                const toast = document.createElement('div')
                toast.setAttribute('role', type === 'error' ? 'alert' : 'status')
                toast.className = `pointer-events-auto flex items-start gap-3 rounded-2xl p-4 shadow-xl ring-1 transition duration-300 translate-x-4 opacity-0 ${style.box}`
                toast.innerHTML = `
                    <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full ${style.icon}">
                        <svg class="h-5 w-5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="${style.path}" /></svg>
                    </span>
                    <p class="min-w-0 flex-1 pt-1 text-sm font-semibold text-ink-900"></p>
                    <button type="button" class="-m-1 rounded-lg p-1 text-gray-400 hover:bg-gray-100 hover:text-gray-700" aria-label="Dismiss">
                        <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                    </button>`
                toast.querySelector('p').textContent = message
                stack.append(toast)
                requestAnimationFrame(() => toast.classList.remove('translate-x-4', 'opacity-0'))

                const close = () => {
                    toast.classList.add('translate-x-4', 'opacity-0')
                    setTimeout(() => toast.remove(), 300)
                }
                toast.querySelector('button').addEventListener('click', close)
                // Errors stay a little longer, so there is time to read them.
                let timer = setTimeout(close, type === 'error' ? 7000 : 4000)
                toast.addEventListener('mouseenter', () => clearTimeout(timer))
                toast.addEventListener('mouseleave', () => { timer = setTimeout(close, 2000) })
            }

            // A list marked data-visible-rows="7" shows exactly that many rows
            // and scrolls for the rest, whatever height each row turns out to be.
            const fitRows = () => document.querySelectorAll('[data-visible-rows]').forEach((list) => {
                const rows = list.children
                const count = Number(list.dataset.visibleRows)
                list.style.maxHeight = rows.length > count
                    ? Math.ceil(rows[count - 1].getBoundingClientRect().bottom - list.getBoundingClientRect().top + list.scrollTop) + 'px'
                    : 'none'
            })
            window.addEventListener('load', fitRows)
            window.addEventListener('resize', fitRows)

            try {
                const carried = JSON.parse(sessionStorage.getItem('admin-toasts') || '[]')
                sessionStorage.removeItem('admin-toasts')
                carried.forEach((message) => adminToast(message.text, message.type))
            } catch (e) {}

            // A one-row strip marked data-hscroll moves sideways with the
            // ordinary mouse wheel, since it has no visible scrollbar.
            document.querySelectorAll('[data-hscroll]').forEach((strip) => strip.addEventListener('wheel', (event) => {
                if (strip.scrollWidth <= strip.clientWidth || Math.abs(event.deltaX) > Math.abs(event.deltaY)) return
                const before = strip.scrollLeft
                strip.scrollLeft += event.deltaY
                if (strip.scrollLeft !== before) event.preventDefault()
            }, { passive: false }))

            @if (session('status')) adminToast(@json(session('status')), 'success'); @endif
            @if (session('error')) adminToast(@json(session('error')), 'error'); @endif
            @if ($errors->any()) adminToast(@json($errors->count() === 1 ? $errors->first() : 'Please fix the '.$errors->count().' highlighted fields.'), 'error'); @endif
        })()
    </script>
    @stack('scripts')
</body>
</html>
