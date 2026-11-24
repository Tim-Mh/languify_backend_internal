<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ReturnsToPreviousPage;
use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use App\Models\UserSubscription;
use App\Support\PerPage;
use App\Support\Sluggable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SubscriptionPlanController extends Controller
{
    use ReturnsToPreviousPage;

    public function index(Request $request): View
    {
        return view('admin.subscription-plans.index', [
            'subscriptionPlans' => SubscriptionPlan::orderBy('order_number')->paginate(PerPage::resolve($request))->withQueryString(),
            // Same "live" rule as the Subscriptions page: active or on trial
            // and not past the end of the paid period.
            'subscribers' => UserSubscription::whereIn('status', ['active', 'trialing'])
                ->where(fn ($q) => $q->whereNull('current_period_end')->orWhere('current_period_end', '>', now()))
                ->selectRaw('plan_key, count(*) as total')
                ->groupBy('plan_key')
                ->pluck('total', 'plan_key'),
        ]);
    }

    public function create(Request $request): View
    {
        return view('admin.subscription-plans.create', ['return' => $this->returnUrl($request)]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['key'] = Sluggable::unique('subscription_plans', 'key', $data['title']);

        $plan = SubscriptionPlan::create($data);

        return $this->backTo($request, 'admin.subscription-plans.index', "Plan \"{$plan->title}\" added.");
    }

    public function edit(Request $request, SubscriptionPlan $subscription_plan): View
    {
        return view('admin.subscription-plans.edit', ['subscription_plan' => $subscription_plan, 'return' => $this->returnUrl($request)]);
    }

    public function update(Request $request, SubscriptionPlan $subscription_plan): RedirectResponse
    {
        $subscription_plan->update($this->validateData($request, $subscription_plan));

        return $this->backTo($request, 'admin.subscription-plans.index', "Plan \"{$subscription_plan->title}\" saved.");
    }

    public function destroy(Request $request, SubscriptionPlan $subscription_plan): RedirectResponse
    {
        $subscription_plan->delete();

        return $this->backTo($request, 'admin.subscription-plans.index', "Plan \"{$subscription_plan->title}\" deleted.");
    }

    private function validateData(Request $request, ?SubscriptionPlan $plan = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:500'],
            'features_text' => ['nullable', 'string'],
            'amount_dollars' => ['required', 'numeric', 'min:0.01'],
            'interval' => ['required', Rule::in(['month', 'year'])],
            'badge_label' => ['nullable', 'string', 'max:50'],
            'savings_label' => ['nullable', 'string', 'max:100'],
            'order_number' => ['required', 'integer', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $data['features'] = array_values(array_filter(array_map('trim', explode("\n", (string) $request->input('features_text', '')))));
        unset($data['features_text']);

        $data['amount_cents'] = (int) round($request->input('amount_dollars') * 100);
        unset($data['amount_dollars']);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
