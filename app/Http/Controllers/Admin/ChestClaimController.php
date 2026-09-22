<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ChestType;
use App\Http\Controllers\Controller;
use App\Models\ChestClaim;
use App\Support\PerPage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChestClaimController extends Controller
{
    public function index(Request $request): View
    {
        $query = ChestClaim::with('user')->orderByDesc('claimed_at');

        if ($type = $request->query('chest_type')) {
            $query->where('chest_type', $type);
        }

        return view('admin.chest-claims.index', [
            'claims' => $query->paginate(PerPage::resolve($request))->withQueryString(),
            'chestTypes' => ChestType::cases(),
            'selectedType' => $type,
        ]);
    }
}
