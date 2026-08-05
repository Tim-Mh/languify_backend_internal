<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\GemPurchase;
use App\Models\User;
use App\Models\UserGameState;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    private const MAX_HEARTS = 5;

    public function index(Request $request): View
    {
        $query = User::query()->with(['nativeLanguage', 'learningLanguage']);

        if ($search = trim((string) $request->query('search', ''))) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($role = $request->query('role')) {
            $query->where('role', $role);
        }

        $users = $query->orderByDesc('created_at')->paginate(25)->withQueryString();

        return view('admin.users.index', [
            'users' => $users,
            'search' => $search ?? '',
            'role' => $role,
        ]);
    }

    public function show(User $user): View
    {
        $user->load([
            'nativeLanguage', 'learningLanguage', 'gameState', 'avatar', 'activeSubscription',
            'badges' => fn ($q) => $q->orderByDesc('earned_at'),
            'completedLanguages.language',
            'courses.language' => fn ($q) => $q->orderByDesc('is_active'),
        ]);

        $recentLessonCompletions = $user->lessonCompletions()
            ->with('lesson.unit.chapter')
            ->orderByDesc('completed_at')
            ->limit(10)
            ->get();

        $recentChestClaims = $user->chestClaims()->orderByDesc('claimed_at')->limit(10)->get();
        $recentTriviaAttempts = $user->triviaAttempts()->with('topic')->orderByDesc('completed_at')->limit(10)->get();
        $gemPurchases = GemPurchase::where('user_id', $user->id)->orderByDesc('created_at')->limit(10)->get();

        $badgeCatalog = Badge::whereIn('key', $user->badges->pluck('badge_key'))->get()->keyBy('key');

        $badgeDetails = $user->badges->map(fn ($badge) => [
            'earnedAt' => $badge->earned_at,
            'meta' => $badgeCatalog->has($badge->badge_key) ? [
                'id' => $badgeCatalog[$badge->badge_key]->key,
                'category' => $badgeCatalog[$badge->badge_key]->category,
                'title' => $badgeCatalog[$badge->badge_key]->title,
                'description' => $badgeCatalog[$badge->badge_key]->description,
                'tier' => $badgeCatalog[$badge->badge_key]->tier,
            ] : null,
        ]);

        return view('admin.users.show', [
            'user' => $user,
            'badgeDetails' => $badgeDetails,
            'recentLessonCompletions' => $recentLessonCompletions,
            'recentChestClaims' => $recentChestClaims,
            'recentTriviaAttempts' => $recentTriviaAttempts,
            'gemPurchases' => $gemPurchases,
        ]);
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'role' => ['required', Rule::in(['user', 'admin'])],
            'email_verified' => ['sometimes', 'boolean'],
            'is_tester' => ['sometimes', 'boolean'],
        ]);

        // Demoting an admin to 'user' — block it if it would remove the last
        // admin, otherwise everyone is permanently locked out of /admin (there
        // is no create-admin route to recover). Self-demotion is the most
        // common way to trip this.
        if ($user->role === 'admin' && $data['role'] !== 'admin' && $this->isLastAdmin($user)) {
            return redirect()->route('admin.users.edit', $user)
                ->with('error', "Can't remove admin from the last remaining admin account.");
        }

        $user->forceFill([
            'full_name' => $data['full_name'] ?? null,
            'email' => $data['email'],
            'role' => $data['role'],
            'email_verified_at' => $request->boolean('email_verified') ? ($user->email_verified_at ?? now()) : null,
            'is_tester' => $request->boolean('is_tester'),
        ])->save();

        return redirect()->route('admin.users.show', $user)->with('status', 'User updated.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($request->user()->id === $user->id) {
            return redirect()->route('admin.users.show', $user)
                ->with('error', "You can't delete your own account.");
        }

        if ($user->role === 'admin' && $this->isLastAdmin($user)) {
            return redirect()->route('admin.users.show', $user)
                ->with('error', "Can't delete the last remaining admin account.");
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('status', 'User deleted.');
    }

    private function isLastAdmin(User $user): bool
    {
        return $user->role === 'admin'
            && User::where('role', 'admin')->where('id', '!=', $user->id)->doesntExist();
    }

    public function adjustGameState(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'gems_delta' => ['nullable', 'integer'],
            'hearts_delta' => ['nullable', 'integer'],
            'xp_delta' => ['nullable', 'integer'],
        ]);

        DB::transaction(function () use ($user, $data) {
            UserGameState::firstOrCreate(['user_id' => $user->id]);
            $state = UserGameState::where('user_id', $user->id)->lockForUpdate()->firstOrFail();

            $state->gems = max(0, $state->gems + (int) ($data['gems_delta'] ?? 0));
            $state->hearts = max(0, min(self::MAX_HEARTS, $state->hearts + (int) ($data['hearts_delta'] ?? 0)));
            $state->total_xp = max(0, $state->total_xp + (int) ($data['xp_delta'] ?? 0));
            $state->save();
        });

        return redirect()->route('admin.users.show', $user)->with('status', 'Game state adjusted.');
    }
}
