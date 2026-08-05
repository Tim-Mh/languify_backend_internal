@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-2">Users</h2>
    <div class="grid grid-cols-2 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">{{ number_format($totalUsers) }}</div>
            <div class="text-sm text-gray-500">Total Users</div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">{{ number_format($newUsersThisMonth) }}</div>
            <div class="text-sm text-gray-500">New This Month</div>
        </div>
    </div>

    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-2">Engagement</h2>
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">{{ number_format($usersWithActiveStreak) }}</div>
            <div class="text-sm text-gray-500">Active Streaks</div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">{{ $averageStreak }}</div>
            <div class="text-sm text-gray-500">Avg. Streak (days)</div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">{{ number_format($lessonsCompletedThisWeek) }}</div>
            <div class="text-sm text-gray-500">Lessons This Week</div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">{{ number_format($languagesFullyCompleted) }}</div>
            <div class="text-sm text-gray-500">Languages Completed</div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">{{ number_format($triviaAttempts) }}</div>
            <div class="text-sm text-gray-500">Trivia Attempts</div>
        </div>
    </div>

    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-2">Revenue</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">${{ number_format($overallRevenueCents / 100, 2) }}</div>
            <div class="text-sm text-gray-500">Overall Revenue</div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">${{ number_format($totalRevenueCents / 100, 2) }}</div>
            <div class="text-sm text-gray-500">Total Gem Revenue</div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">{{ number_format($activeSubscriberCount) }}</div>
            <div class="text-sm text-gray-500">Active Subscribers</div>
        </div>
    </div>

    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-2">Content</h2>
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">{{ $languageCount }}</div>
            <div class="text-sm text-gray-500">Languages</div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">{{ $chapterCount }}</div>
            <div class="text-sm text-gray-500">Chapters</div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">{{ $unitCount }}</div>
            <div class="text-sm text-gray-500">Units</div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">{{ $lessonCount }}</div>
            <div class="text-sm text-gray-500">Lessons</div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-2xl font-semibold">{{ $exerciseCount }}</div>
            <div class="text-sm text-gray-500">Exercises</div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4">
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="font-semibold mb-3">Most Popular Courses</h2>
            @php $maxEnrollments = $popularLanguages->max('enrollments') ?: 1; @endphp
            @forelse ($popularLanguages as $row)
                <div class="mb-2">
                    <div class="flex justify-between text-sm mb-1">
                        <span>{{ $row->language?->name ?? 'Language #' . $row->language_id }}</span>
                        <span class="text-gray-500">{{ $row->enrollments }}</span>
                    </div>
                    <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-500" style="width: {{ round(($row->enrollments / $maxEnrollments) * 100) }}%"></div>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-400">No course enrollments yet.</p>
            @endforelse
        </div>
    </div>
@endsection
