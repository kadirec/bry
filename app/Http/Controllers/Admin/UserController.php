<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::orderByDesc('is_admin')->orderBy('name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.users.form', [
            'user' => new User(['is_admin' => true]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $data['password'],
            'is_admin' => $request->boolean('is_admin'),
        ]);

        return redirect()->route('admin.users.index')
            ->with('status', '"' . $data['name'] . '" kullanıcısı oluşturuldu.');
    }

    public function edit(User $user): View
    {
        return view('admin.users.form', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $this->validateData($request, $user);

        $isAdmin = $request->boolean('is_admin');

        // Kendi yönetici yetkini kaldıramazsın — panele erişimini kaybedersin.
        if ($user->id === $request->user()->id && ! $isAdmin) {
            return back()->withInput()
                ->with('error', 'Kendi yönetici yetkini kaldıramazsın.');
        }

        // Son yöneticinin yetkisi kaldırılamaz.
        if ($user->is_admin && ! $isAdmin && User::where('is_admin', true)->count() <= 1) {
            return back()->withInput()
                ->with('error', 'Sistemde en az bir yönetici kalmalı.');
        }

        $user->fill([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'is_admin' => $isAdmin,
        ]);

        if (! empty($data['password'])) {
            $user->password = $data['password'];
        }

        $user->save();

        return redirect()->route('admin.users.index')
            ->with('status', '"' . $user->name . '" güncellendi.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($user->id === $request->user()->id) {
            return back()->with('error', 'Kendi hesabını silemezsin.');
        }

        if ($user->is_admin && User::where('is_admin', true)->count() <= 1) {
            return back()->with('error', 'Sistemdeki son yönetici silinemez.');
        }

        $name = $user->name;
        $user->delete();

        return back()->with('status', '"' . $name . '" silindi.');
    }

    private function validateData(Request $request, ?User $user = null): array
    {
        return $request->validate([
            'name'     => ['required', 'string', 'max:120'],
            'email'    => ['required', 'string', 'email', 'max:190',
                Rule::unique('users', 'email')->ignore($user?->id)],
            'password' => [$user ? 'nullable' : 'required', 'string', 'min:8', 'confirmed'],
            'is_admin' => ['nullable', 'boolean'],
        ], [
            'password.confirmed' => 'Şifre tekrarı eşleşmiyor.',
            'password.min'       => 'Şifre en az 8 karakter olmalı.',
            'email.unique'       => 'Bu e-posta zaten kayıtlı.',
        ]);
    }
}
