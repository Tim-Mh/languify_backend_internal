<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GemPurchase;
use App\Support\PerPage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GemPurchaseController extends Controller
{
    public function index(Request $request): View
    {
        $query = GemPurchase::with('user')->orderByDesc('created_at');

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        $purchases = (clone $query)->paginate(PerPage::resolve($request))->withQueryString();

        return view('admin.gem-purchases.index', [
            'purchases' => $purchases,
            'selectedStatus' => $status,
            'totalRevenueCents' => GemPurchase::where('status', 'completed')->sum('amount_cents'),
        ]);
    }
}
