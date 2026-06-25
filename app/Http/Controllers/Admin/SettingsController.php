<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function index(?string $group = null): View
    {
        $group ??= 'general';

        $groups = Setting::query()->select('group')->distinct()->orderBy('group')->pluck('group')->all();
        $items  = Setting::where('group', $group)->orderBy('sort')->orderBy('id')->get();

        return view('admin.settings.index', [
            'group'  => $group,
            'groups' => $groups,
            'items'  => $items,
        ]);
    }

    public function update(Request $request, string $group): RedirectResponse
    {
        $values = $request->input('value', []);

        foreach ($values as $key => $val) {
            Setting::where('key', $key)->update(['value' => $val]);
        }

        return back()->with('status', 'Ayarlar güncellendi.');
    }
}
