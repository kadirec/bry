<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Redirect as RedirectRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RedirectController extends Controller
{
    public function index(): View
    {
        return view('admin.redirects.index', [
            'items' => RedirectRule::orderByDesc('is_active')
                ->orderBy('from_path')
                ->paginate(50),
        ]);
    }

    public function create(): View
    {
        return view('admin.redirects.form', [
            'item' => new RedirectRule([
                'status_code' => 301,
                'is_active'   => true,
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        RedirectRule::create($data);

        return redirect()->route('admin.redirects.index')
            ->with('status', 'Yönlendirme eklendi: ' . $data['from_path']);
    }

    public function edit(RedirectRule $redirect): View
    {
        return view('admin.redirects.form', ['item' => $redirect]);
    }

    public function update(Request $request, RedirectRule $redirect): RedirectResponse
    {
        $data = $this->validateData($request, $redirect);

        $redirect->update($data);

        return redirect()->route('admin.redirects.index')
            ->with('status', 'Yönlendirme güncellendi: ' . $redirect->from_path);
    }

    public function destroy(RedirectRule $redirect): RedirectResponse
    {
        $from = $redirect->from_path;
        $redirect->delete();

        return back()->with('status', 'Silindi: ' . $from);
    }

    private function validateData(Request $request, ?RedirectRule $current = null): array
    {
        $data = $request->validate([
            'from_path'   => ['required', 'string', 'max:500',
                Rule::unique('redirects', 'from_path')->ignore($current?->id)],
            'to_path'     => ['required', 'string', 'max:500'],
            'status_code' => ['required', 'integer', Rule::in([301, 302, 307, 308])],
            'note'        => ['nullable', 'string', 'max:255'],
            'is_active'   => ['nullable', 'boolean'],
        ], [
            'from_path.unique' => 'Bu kaynak URL için zaten bir yönlendirme var.',
        ]);

        $data['from_path'] = RedirectRule::normalizePath($data['from_path']);
        // Hedef dış URL de olabilir; sadece boşlukları temizle.
        $data['to_path']   = trim($data['to_path']);
        $data['is_active'] = $request->boolean('is_active');
        $data['note']      = $data['note'] ?? null;

        if ($data['from_path'] === RedirectRule::normalizePath($data['to_path'])) {
            throw ValidationException::withMessages([
                'to_path' => 'Kaynak ve hedef aynı olamaz.',
            ]);
        }

        return $data;
    }
}
