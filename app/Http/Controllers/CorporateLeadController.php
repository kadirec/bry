<?php

namespace App\Http\Controllers;

use App\Models\CorporateLead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CorporateLeadController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:120'],
            'email'   => ['required', 'email', 'max:160'],
            'company' => ['required', 'string', 'max:160'],
            'phone'   => ['required', 'string', 'max:32', 'regex:/^[0-9 +()\-]{7,}$/'],
            'program' => ['nullable', 'string', 'max:160'],
            'kvkk'    => ['accepted'],
        ], [
            'kvkk.accepted'  => 'Teklif gönderebilmek için KVKK aydınlatma metnini kabul etmeniz gerekir.',
            'phone.regex'    => 'Geçerli bir telefon numarası giriniz.',
        ]);

        CorporateLead::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'company'       => $data['company'],
            'phone'         => $data['phone'],
            'program'       => $data['program'] ?? null,
            'kvkk_accepted' => true,
            'status'        => 'new',
            'ip'            => $request->ip(),
            'user_agent'    => substr((string) $request->userAgent(), 0, 255),
        ]);

        return redirect()
            ->to(url()->previous() . '#cta-kur')
            ->with('lead_status', 'Teklif talebiniz alındı. En kısa sürede dönüş yapacağız.');
    }
}
