<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdSettingController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'interstitial_seconds' => ['required', 'integer', 'min:1', 'max:60'],
            'sidebar_seconds' => ['required', 'integer', 'min:2', 'max:120'],
        ]);

        AdSetting::current()->update($data);

        return redirect()->route('admin.ads.index')->with('status', 'Ad settings updated.');
    }
}
