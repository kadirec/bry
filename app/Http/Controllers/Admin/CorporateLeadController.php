<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CorporateLead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CorporateLeadController extends Controller
{
    public function index(Request $request): View
    {
        $query = CorporateLead::query();

        if ($status = $request->string('status')->toString()) {
            if (array_key_exists($status, CorporateLead::STATUSES)) {
                $query->where('status', $status);
            }
        }

        $leads = $query->orderByDesc('created_at')->paginate(30)->withQueryString();

        return view('admin.corporate_leads.index', [
            'leads'       => $leads,
            'statuses'    => CorporateLead::STATUSES,
            'activeStatus' => $status,
            'counts'      => CorporateLead::selectRaw('status, count(*) as c')
                ->groupBy('status')->pluck('c', 'status')->all(),
        ]);
    }

    public function show(CorporateLead $corporateLead): View
    {
        return view('admin.corporate_leads.show', [
            'lead' => $corporateLead,
        ]);
    }

    public function update(Request $request, CorporateLead $corporateLead): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:' . implode(',', array_keys(CorporateLead::STATUSES))],
            'notes'  => ['nullable', 'string', 'max:6000'],
        ]);

        $corporateLead->update($data);

        return redirect()->route('admin.corporate-leads.show', $corporateLead)
            ->with('status', 'Kayıt güncellendi.');
    }

    public function destroy(CorporateLead $corporateLead): RedirectResponse
    {
        $corporateLead->delete();
        return redirect()->route('admin.corporate-leads.index')
            ->with('status', 'Kayıt silindi.');
    }
}
