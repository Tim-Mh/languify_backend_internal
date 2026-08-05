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
                <input type="password" name="password" id="password" required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-500">
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
</body>
</html>
