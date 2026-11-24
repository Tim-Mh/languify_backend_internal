<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- The learner app's brand colours (web src/index.css), so the admin
         login reads as the same product. --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { 400: '#e878bb', 500: '#9e1a69', 600: '#831b5a', 700: '#6f154b' },
                        ink: { 800: '#30213f', 900: '#281b37' },
                    },
                    fontFamily: {
                        display: ['Poppins', 'Nunito', 'system-ui', 'sans-serif'],
                        body: ['Nunito', 'system-ui', 'sans-serif'],
                    },
                },
            },
        };
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-brand-400/10 font-body text-ink-900 antialiased">
    <div class="flex min-h-screen">
        <main class="flex w-full items-center justify-center px-4 py-10 sm:px-6">
            <div class="w-full max-w-md">
                <div class="mb-8 flex flex-col items-center">
                    <img src="{{ asset('images/admin/logo.webp') }}" alt="{{ config('app.name') }}" width="234" height="240" class="h-24 w-auto">
                </div>

                <div class="rounded-3xl bg-white p-8 shadow-xl shadow-ink-900/5 ring-1 ring-gray-100 sm:p-10">
                    <span class="inline-flex items-center rounded-full bg-brand-500/10 px-3 py-1 text-xs font-bold uppercase tracking-wide text-brand-600">Admin panel</span>
                    <h1 class="mt-4 font-display text-2xl font-bold text-ink-900 sm:text-3xl">Welcome back</h1>
                    <p class="mt-2 text-gray-600">Sign in to manage {{ config('app.name') }}.</p>

                    @if ($errors->any())
                        <div class="mt-6 flex items-start gap-3 rounded-2xl bg-red-50 px-4 py-3 text-sm text-red-800 ring-1 ring-red-200" role="alert">
                            <svg class="mt-0.5 h-5 w-5 shrink-0" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                        @csrf
                        <div>
                            <label class="mb-1.5 block text-sm font-bold text-ink-800" for="email">Email</label>
                            <div class="relative">
                                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                    placeholder="admin@example.com"
                                    class="w-full rounded-2xl border-2 border-gray-200 bg-white py-3 pl-12 pr-4 text-ink-900 placeholder-gray-400 outline-none transition focus:border-brand-400 focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2">
                            </div>
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-bold text-ink-800" for="password">Password</label>
                            {{-- The toggle sits inside the field, so the input carries extra
                                 right padding to keep a long password from running under it. --}}
                            <div class="relative">
                                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                                <input type="password" name="password" id="password" required autocomplete="current-password"
                                    class="w-full rounded-2xl border-2 border-gray-200 bg-white py-3 pl-12 pr-12 text-ink-900 outline-none transition focus:border-brand-400 focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2">
                                {{-- Hidden inline rather than with the `hidden` attribute: Tailwind's
                                     preflight `[hidden]{display:none}` and the `flex` utility have the
                                     same specificity, and utilities win on source order, so the
                                     attribute alone would not hide a flex button. Revealed by the
                                     script below, so it is never a dead control without JavaScript. --}}
                                <button type="button" id="toggle-password" style="display:none"
                                    aria-pressed="false" aria-controls="password" aria-label="Show password"
                                    class="absolute inset-y-0 right-0 flex w-12 items-center justify-center rounded-r-2xl text-gray-500 hover:text-brand-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500">
                                    <svg id="icon-show" class="h-5 w-5" aria-hidden="true" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <svg id="icon-hide" class="h-5 w-5" style="display:none" aria-hidden="true" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <label class="flex w-fit cursor-pointer items-center gap-2.5 text-sm text-gray-700">
                            <input type="checkbox" name="remember" class="h-4 w-4 rounded border-gray-300 accent-brand-500">
                            Remember me
                        </label>

                        <button type="submit" id="submit"
                            class="flex w-full items-center justify-center gap-2 rounded-full bg-brand-600 px-6 py-3.5 font-bold text-white shadow-lg shadow-brand-500/30 transition hover:bg-brand-700 active:scale-[0.98] focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 disabled:opacity-70">
                            <svg id="submit-spinner" class="h-5 w-5 animate-spin" style="display:none" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8v4a4 4 0 0 0-4 4H4Z"></path>
                            </svg>
                            <span id="submit-label">Log in</span>
                        </button>
                    </form>
                </div>

                <p class="mt-6 text-center text-xs text-gray-500">Admin access only. Learners sign in through the {{ config('app.name') }} app.</p>
            </div>
        </main>
    </div>

    <script>
        (function () {
            var input = document.getElementById('password');
            var button = document.getElementById('toggle-password');
            var iconShow = document.getElementById('icon-show');
            var iconHide = document.getElementById('icon-hide');

            if (input && button) {
                button.style.display = 'flex';

                button.addEventListener('click', function () {
                    var revealed = input.type === 'text';

                    input.type = revealed ? 'password' : 'text';
                    button.setAttribute('aria-pressed', revealed ? 'false' : 'true');
                    button.setAttribute('aria-label', revealed ? 'Show password' : 'Hide password');
                    iconShow.style.display = revealed ? '' : 'none';
                    iconHide.style.display = revealed ? 'none' : '';

                    // Focus stays on the button: moving it to the input would make a
                    // keyboard user tab back here just to hide the password again.
                });
            }

            // One submit only: the button shows it is working instead of
            // inviting a second click while the login is in flight.
            var form = document.querySelector('form');
            var submit = document.getElementById('submit');

            form.addEventListener('submit', function () {
                submit.disabled = true;
                document.getElementById('submit-spinner').style.display = '';
                document.getElementById('submit-label').textContent = 'Logging in...';
            });
        })();
    </script>
</body>
</html>
