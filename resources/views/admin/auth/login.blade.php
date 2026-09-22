<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-sm bg-white rounded-lg shadow p-8">
        <h1 class="text-xl font-semibold mb-6 text-center">{{ config('app.name') }} Admin</h1>

        @if ($errors->any())
            <div class="mb-4 rounded bg-red-100 text-red-800 px-4 py-2 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-500">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1" for="password">Password</label>
                {{-- The toggle sits inside the field, so the input carries extra
                     right padding to keep a long password from running under it. --}}
                <div class="relative">
                    <input type="password" name="password" id="password" required
                        class="w-full border rounded px-3 py-2 pr-11 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    {{-- Hidden inline rather than with the `hidden` attribute: Tailwind's
                         preflight `[hidden]{display:none}` and the `flex` utility have the
                         same specificity, and utilities win on source order, so the
                         attribute alone would not hide a flex button. Revealed by the
                         script below, so it is never a dead control without JavaScript. --}}
                    <button type="button" id="toggle-password" style="display:none"
                        aria-pressed="false" aria-controls="password" aria-label="Show password"
                        class="absolute inset-y-0 right-0 flex items-center px-3 rounded-r text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        <svg id="icon-show" class="w-5 h-5" aria-hidden="true" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg id="icon-hide" class="w-5 h-5" style="display:none" aria-hidden="true" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
            </div>
            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember">
                Remember me
            </label>
            <button type="submit" class="w-full bg-gray-900 text-white rounded py-2 hover:bg-gray-800">
                Log in
            </button>
        </form>
    </div>
    <script>
        (function () {
            var input = document.getElementById('password');
            var button = document.getElementById('toggle-password');
            var iconShow = document.getElementById('icon-show');
            var iconHide = document.getElementById('icon-hide');

            if (!input || !button) {
                return;
            }

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
        })();
    </script>
</body>
</html>
