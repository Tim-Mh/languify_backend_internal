<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Exercise;
use App\Models\GemPurchase;
use App\Models\Language;
use App\Models\Lesson;
use App\Models\TriviaAttempt;
use App\Models\Unit;
use App\Models\User;
use App\Models\UserCompletedLanguage;
use App\Models\UserCourse;
use App\Models\UserGameState;
use App\Models\UserLessonCompletion;
use App\Models\UserSubscription;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $weekAgo = Carbon::now()->subDays(7);
        $monthAgo = Carbon::now()->subDays(30);

        // How many subscribers are paying RIGHT NOW (only currently-valid
        // plans — the manual-renewal expiry gate, mirrored here).
        $activeSubscriberCount = UserSubscription::whereIn('status', ['active', 'trialing'])
            ->where(function ($q) {
                $q->whereNull('current_period_end')->orWhere('current_period_end', '>', now());
            })
            ->count();

        // Actual lifetime subscription revenue: the sum of every payment ever
        // taken. Each purchase AND each renewal is its own row stamped with the
        // amount charged (see StripeService), so this counts renewals and never
        // shrinks when a plan later expires. 'incomplete' rows never paid.
        $subscriptionRevenueCents = (int) UserSubscription::where('status', '!=', 'incomplete')
            ->sum('amount_cents');
        $gemRevenueCents = (int) GemPurchase::where('status', 'completed')->sum('amount_cents');

        $popularLanguages = UserCourse::query()
            ->selectRaw('language_id, count(*) as enrollments')
            ->groupBy('language_id')
            ->orderByDesc('enrollments')
            ->with('language')
            ->limit(8)
            ->get();

        return view('admin.dashboard', [
            'languageCount' => Language::count(),
            'chapterCount' => Chapter::count(),
            'unitCount' => Unit::count(),
            'lessonCount' => Lesson::count(),
            'exerciseCount' => Exercise::count(),

            'totalUsers' => User::count(),
            'newUsersThisMonth' => User::where('created_at', '>=', $monthAgo)->count(),

            'usersWithActiveStreak' => UserGameState::where('streak', '>', 0)->count(),
            'lessonsCompletedThisWeek' => UserLessonCompletion::where('completed_at', '>=', $weekAgo)->count(),
            'averageStreak' => round((float) UserGameState::where('streak', '>', 0)->avg('streak'), 1),
            'languagesFullyCompleted' => UserCompletedLanguage::count(),
            'triviaAttempts' => TriviaAttempt::count(),

            'totalRevenueCents' => $gemRevenueCents,
            'activeSubscriberCount' => $activeSubscriberCount,
            'overallRevenueCents' => $gemRevenueCents + $subscriptionRevenueCents,

            'popularLanguages' => $popularLanguages,
        ]);
    }
}
