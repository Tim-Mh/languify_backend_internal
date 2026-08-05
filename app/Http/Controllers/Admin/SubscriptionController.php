<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubscriptionController extends Controller
{
    public function index(Request $request): View
    {
        $query = UserSubscription::with('user')->orderByDesc('created_at');

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        return view('admin.subscriptions.index', [
            'subscriptions' => $query->paginate(25)->withQueryString(),
            'selectedStatus' => $status,
            'activeCount' => UserSubscription::whereIn('status', ['active', 'trialing'])->count(),
            'planPrices' => SubscriptionPlan::all()->keyBy('key'),
        ]);
    }
}
