<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles')
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-gray-900 text-gray-200 flex-shrink-0 flex flex-col h-screen sticky top-0">
            <div class="px-6 py-4 text-lg font-semibold text-white border-b border-gray-800 flex-shrink-0">
                {{ config('app.name') }} Admin
            </div>
            <nav class="mt-4 space-y-1 px-2 pb-6 overflow-y-auto flex-1">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : '' }}">Dashboard</a>

                <p class="px-4 pt-4 pb-1 text-xs font-semibold uppercase tracking-wide text-gray-500">Users</p>
                <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.users.*') ? 'bg-gray-800 text-white' : '' }}">Users</a>

                <p class="px-4 pt-4 pb-1 text-xs font-semibold uppercase tracking-wide text-gray-500">Content</p>
                <a href="{{ route('admin.content-tree') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.content-tree') ? 'bg-gray-800 text-white' : '' }}">Content Tree</a>
                <a href="{{ route('admin.language-activation.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.language-activation.*') ? 'bg-gray-800 text-white' : '' }}">Language Activation</a>
                {{-- Hidden from sidebar (routes still work via direct URL):
                <a href="{{ route('admin.languages.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.languages.*') ? 'bg-gray-800 text-white' : '' }}">Languages</a>
                <a href="{{ route('admin.chapters.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.chapters.*') ? 'bg-gray-800 text-white' : '' }}">Chapters</a>
                <a href="{{ route('admin.units.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.units.*') ? 'bg-gray-800 text-white' : '' }}">Units</a>
                <a href="{{ route('admin.lessons.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.lessons.*') ? 'bg-gray-800 text-white' : '' }}">Lessons</a>
                <a href="{{ route('admin.exercises.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.exercises.*') ? 'bg-gray-800 text-white' : '' }}">Exercises</a>
                <a href="{{ route('admin.exercise-instructions.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.exercise-instructions.*') ? 'bg-gray-800 text-white' : '' }}">Exercise Instructions</a>
                <a href="{{ route('admin.alphabet-letters.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.alphabet-letters.*') ? 'bg-gray-800 text-white' : '' }}">Alphabet Letters</a>
                <a href="{{ route('admin.avatar-options.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.avatar-options.*') ? 'bg-gray-800 text-white' : '' }}">Avatar Options</a>
                --}}

                {{-- Trivia section hidden from sidebar (routes still work via direct URL):
                <p class="px-4 pt-4 pb-1 text-xs font-semibold uppercase tracking-wide text-gray-500">Trivia</p>
                <a href="{{ route('admin.trivia-topics.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.trivia-topics.*') ? 'bg-gray-800 text-white' : '' }}">Topics</a>
                <a href="{{ route('admin.trivia-questions.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.trivia-questions.*') ? 'bg-gray-800 text-white' : '' }}">Questions</a>
                --}}

                <p class="px-4 pt-4 pb-1 text-xs font-semibold uppercase tracking-wide text-gray-500">Gamification</p>
                <a href="{{ route('admin.badges.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.badges.*') ? 'bg-gray-800 text-white' : '' }}">Badges</a>
                <a href="{{ route('admin.badge-tiers.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.badge-tiers.*') ? 'bg-gray-800 text-white' : '' }}">Badge Tiers</a>
                <a href="{{ route('admin.league-tiers.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.league-tiers.*') ? 'bg-gray-800 text-white' : '' }}">League Tiers</a>
                <a href="{{ route('admin.quests.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.quests.*') ? 'bg-gray-800 text-white' : '' }}">Daily Quests</a>
                {{-- Hidden from sidebar (route still works via direct URL):
                <a href="{{ route('admin.chest-reward-configs.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.chest-reward-configs.*') ? 'bg-gray-800 text-white' : '' }}">Chest Rewards</a>
                --}}
                {{-- Hidden from sidebar (route still works via direct URL):
                <a href="{{ route('admin.chest-claims.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.chest-claims.*') ? 'bg-gray-800 text-white' : '' }}">Chest Claims</a>
                --}}

                <p class="px-4 pt-4 pb-1 text-xs font-semibold uppercase tracking-wide text-gray-500">Monetization</p>
                <a href="{{ route('admin.gem-packs.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.gem-packs.*') ? 'bg-gray-800 text-white' : '' }}">Gem Packs</a>
                <a href="{{ route('admin.heart-refill-tiers.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.heart-refill-tiers.*') ? 'bg-gray-800 text-white' : '' }}">Heart Refill Tiers</a>
                <a href="{{ route('admin.subscription-plans.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.subscription-plans.*') ? 'bg-gray-800 text-white' : '' }}">Subscription Plans</a>
                <a href="{{ route('admin.gem-purchases.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.gem-purchases.*') ? 'bg-gray-800 text-white' : '' }}">Gem Purchases</a>
                <a href="{{ route('admin.subscriptions.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.subscriptions.*') ? 'bg-gray-800 text-white' : '' }}">Subscriptions</a>
                <a href="{{ route('admin.family-groups.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.family-groups.*') ? 'bg-gray-800 text-white' : '' }}">Family Plans</a>
                <a href="{{ route('admin.ad-images.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.ad-images.*') ? 'bg-gray-800 text-white' : '' }}">Ad Images</a>

                <p class="px-4 pt-4 pb-1 text-xs font-semibold uppercase tracking-wide text-gray-500">Site Content</p>
                <a href="{{ route('admin.legal-pages.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.legal-pages.*') ? 'bg-gray-800 text-white' : '' }}">Terms / Privacy / Contact</a>
                <a href="{{ route('admin.contact-messages.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.contact-messages.*') ? 'bg-gray-800 text-white' : '' }}">Contact Messages</a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-white border-b px-6 py-3 flex items-center justify-between">
                <h1 class="text-xl font-semibold">@yield('title', 'Dashboard')</h1>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-gray-600 hover:text-gray-900">
                        Logout ({{ auth()->user()->full_name ?? auth()->user()->email }})
                    </button>
                </form>
            </header>

            <main class="flex-1 p-6">
                @if (session('status'))
                    <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-2">{{ session('status') }}</div>
                @endif

                @if (session('error'))
                    <div class="mb-4 rounded bg-red-100 text-red-800 px-4 py-2">{{ session('error') }}</div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
