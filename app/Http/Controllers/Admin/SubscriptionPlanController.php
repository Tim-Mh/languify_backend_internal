<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use App\Support\PerPage;
use App\Support\Sluggable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SubscriptionPlanController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.subscription-plans.index', [
            'subscriptionPlans' => SubscriptionPlan::orderBy('order_number')->paginate(PerPage::resolve($request))->withQueryString(),
        ]);
    }

    public function create(): View
    {
        return view('admin.subscription-plans.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['key'] = Sluggable::unique('subscription_plans', 'key', $data['title']);

        SubscriptionPlan::create($data);

        return redirect()->route('admin.subscription-plans.index')->with('status', 'Subscription plan created.');
    }

    public function edit(SubscriptionPlan $subscription_plan): View
    {
        return view('admin.subscription-plans.edit', ['subscription_plan' => $subscription_plan]);
    }

    public function update(Request $request, SubscriptionPlan $subscription_plan): RedirectResponse
    {
        $subscription_plan->update($this->validateData($request, $subscription_plan));

        return redirect()->route('admin.subscription-plans.index')->with('status', 'Subscription plan updated.');
    }

    public function destroy(SubscriptionPlan $subscription_plan): RedirectResponse
    {
        $subscription_plan->delete();

        return redirect()->route('admin.subscription-plans.index')->with('status', 'Subscription plan deleted.');
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
