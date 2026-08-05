<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FamilyGroup;
use Illuminate\View\View;

class FamilyGroupController extends Controller
{
    public function index(): View
    {
        return view('admin.family-groups.index', [
            'familyGroups' => FamilyGroup::with(['owner.activeSubscription', 'members.user', 'pendingInvites'])
                ->latest()
                ->paginate(20),
        ]);
    }
}
