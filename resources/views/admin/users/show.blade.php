@extends('layouts.admin')

@section('title', 'User: ' . ($user->full_name ?: $user->email))

@section('content')
    <div class="mb-4 flex items-center justify-between">
        <a href="{{ route('admin.users.index') }}" class="text-sm text-gray-500 hover:underline">&larr; Back to users</a>
        <div class="space-x-3">
            <a href="{{ route('admin.users.edit', $user) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit User</a>
            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline"
                  onsubmit="return confirm('Delete this user permanently? This removes all their progress, purchases, and content.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4 lg:col-span-1">
            <h2 class="font-semibold mb-3">Profile</h2>
            <dl class="text-sm space-y-2">
                <div><dt class="text-gray-500">Name</dt><dd>{{ $user->full_name ?: '—' }}</dd></div>
                <div><dt class="text-gray-500">Email</dt><dd>{{ $user->email }}</dd></div>
                <div><dt class="text-gray-500">Role</dt><dd class="capitalize">{{ $user->role }}</dd></div>
                <div><dt class="text-gray-500">Tester</dt><dd>{{ $user->isTester() ? 'Yes (everything unlocked)' : 'No' }}</dd></div>
                <div><dt class="text-gray-500">Verified</dt><dd>{{ $user->email_verified_at ? $user->email_verified_at->format('Y-m-d H:i') : 'Not verified' }}</dd></div>
                <div><dt class="text-gray-500">Native language</dt><dd>{{ $user->nativeLanguage?->name ?? '—' }}</dd></div>
                <div><dt class="text-gray-500">Learning language</dt><dd>{{ $user->learningLanguage?->name ?? '—' }}</dd></div>
                <div><dt class="text-gray-500">Proficiency</dt><dd>{{ $user->proficiency_level ?? '—' }}</dd></div>
                <div><dt class="text-gray-500">Streak goal</dt><dd>{{ $user->streak_goal_days ?? '—' }} days</dd></div>
                <div><dt class="text-gray-500">Timezone</dt><dd>{{ $user->timezone ?? '—' }}</dd></div>
                <div><dt class="text-gray-500">Joined</dt><dd>{{ $user->created_at->format('Y-m-d H:i') }}</dd></div>
            </dl>
        </div>

        <div class="bg-white rounded-lg shadow p-4 lg:col-span-1">
            <h2 class="font-semibold mb-3">Game State</h2>
            @php $state = $user->gameState @endphp
            @if ($state)
                <dl class="text-sm space-y-2">
                    <div><dt class="text-gray-500">Gems</dt><dd>{{ $state->gems }}</dd></div>
                    <div><dt class="text-gray-500">Hearts</dt><dd>{{ $state->hearts }} / 5</dd></div>
                    <div><dt class="text-gray-500">Total XP</dt><dd>{{ number_format($state->total_xp) }}</dd></div>
                    <div><dt class="text-gray-500">Streak</dt><dd>{{ $state->streak }} days (longest {{ $state->longest_streak }})</dd></div>
                    <div><dt class="text-gray-500">Lessons completed</dt><dd>{{ $state->total_lessons_completed }}</dd></div>
                    <div><dt class="text-gray-500">Perfect lessons</dt><dd>{{ $state->perfect_lessons }}</dd></div>
                </dl>
            @else
                <p class="text-sm text-gray-500">No game state yet.</p>
            @endif

            <form action="{{ route('admin.users.adjust-game-state', $user) }}" method="POST" class="mt-4 border-t pt-3 space-y-2">
                @csrf
                <p class="text-xs text-gray-500 mb-1">Adjust (use negative numbers to subtract)</p>
                <div class="flex gap-2">
                    <input type="number" name="gems_delta" placeholder="Gems ±" class="border rounded px-2 py-1 w-full text-sm">
                    <input type="number" name="hearts_delta" placeholder="Hearts ±" class="border rounded px-2 py-1 w-full text-sm">
                    <input type="number" name="xp_delta" placeholder="XP ±" class="border rounded px-2 py-1 w-full text-sm">
                </div>
                <button type="submit" class="bg-gray-800 text-white px-3 py-1.5 rounded text-sm hover:bg-gray-900">Apply</button>
            </form>
        </div>

        <div class="bg-white rounded-lg shadow p-4 lg:col-span-1">
            <h2 class="font-semibold mb-3">Subscription &amp; Courses</h2>
            <p class="text-sm text-gray-500 mb-1">Subscription</p>
            @if ($user->activeSubscription)
                <p class="text-sm mb-3">{{ ucfirst($user->activeSubscription->plan_key) }} — <span class="text-green-700">{{ $user->activeSubscription->status }}</span></p>
            @else
                <p class="text-sm text-gray-400 mb-3">No active subscription</p>
            @endif

            <p class="text-sm text-gray-500 mb-1">Enrolled courses</p>
            @forelse ($user->courses as $course)
                <p class="text-sm">{{ $course->language?->name }} {{ $course->is_active ? '(active)' : '' }}</p>
            @empty
                <p class="text-sm text-gray-400">None</p>
            @endforelse

            <p class="text-sm text-gray-500 mb-1 mt-3">Completed languages</p>
            @forelse ($user->completedLanguages as $completed)
                <p class="text-sm">{{ $completed->language?->name }} — {{ number_format($completed->xp_at_completion) }} XP</p>
            @empty
                <p class="text-sm text-gray-400">None</p>
            @endforelse
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="font-semibold mb-3">Badges Earned ({{ $badgeDetails->count() }})</h2>
            @forelse ($badgeDetails as $badge)
                <div class="flex justify-between text-sm py-1 border-b last:border-0">
                    <span>{{ $badge['meta']['title'] ?? $badge['meta']['id'] ?? 'Unknown badge' }}</span>
                    <span class="text-gray-400">{{ $badge['earnedAt']?->format('Y-m-d') }}</span>
                </div>
            @empty
                <p class="text-sm text-gray-400">No badges yet.</p>
            @endforelse
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="font-semibold mb-3">Recent Chest Claims</h2>
            @forelse ($recentChestClaims as $claim)
                <div class="flex justify-between text-sm py-1 border-b last:border-0">
                    <span class="capitalize">{{ $claim->chest_type->value ?? $claim->chest_type }}</span>
                    <span class="text-gray-500">+{{ $claim->gems_awarded }}g +{{ $claim->xp_awarded }}xp +{{ $claim->hearts_awarded }}h</span>
                    <span class="text-gray-400">{{ $claim->claimed_at?->format('Y-m-d') }}</span>
                </div>
            @empty
                <p class="text-sm text-gray-400">No chest claims yet.</p>
            @endforelse
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="font-semibold mb-3">Recent Lesson Completions</h2>
            @forelse ($recentLessonCompletions as $completion)
                <div class="text-sm py-1 border-b last:border-0">
                    <p>{{ $completion->lesson?->title ?? 'Lesson #' . $completion->lesson_id }}</p>
                    <p class="text-gray-400 text-xs">{{ $completion->completed_at?->format('Y-m-d H:i') }} · {{ $completion->mistakes }} mistake(s)</p>
                </div>
            @empty
                <p class="text-sm text-gray-400">None yet.</p>
            @endforelse
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="font-semibold mb-3">Recent Trivia Attempts</h2>
            @forelse ($recentTriviaAttempts as $attempt)
                <div class="text-sm py-1 border-b last:border-0">
                    <p>{{ $attempt->topic?->title ?? 'Topic #' . $attempt->topic_id }} — {{ $attempt->correct_count }}/{{ $attempt->total_questions }}</p>
                    <p class="text-gray-400 text-xs">{{ $attempt->completed_at?->format('Y-m-d H:i') }}</p>
                </div>
            @empty
                <p class="text-sm text-gray-400">None yet.</p>
            @endforelse
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="font-semibold mb-3">Gem Purchases</h2>
            @forelse ($gemPurchases as $purchase)
                <div class="text-sm py-1 border-b last:border-0">
                    <p>{{ $purchase->pack_key }} — {{ $purchase->gems_credited }} gems — ${{ number_format($purchase->amount_cents / 100, 2) }}</p>
                    <p class="text-gray-400 text-xs">{{ $purchase->status }} · {{ $purchase->created_at?->format('Y-m-d') }}</p>
                </div>
            @empty
                <p class="text-sm text-gray-400">None yet.</p>
            @endforelse
        </div>
    </div>
@endsection
