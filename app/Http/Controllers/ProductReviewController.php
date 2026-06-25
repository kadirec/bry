<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ProductReviewController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'product_slug' => ['required', Rule::in(array_keys(ProductReview::PRODUCTS))],
            'name'         => ['required', 'string', 'max:120'],
            'message'      => ['required', 'string', 'min:8', 'max:2000'],
            'captcha'      => ['required', 'string'],
            'kvkk'         => ['accepted'],
        ], [
            'product_slug.required' => 'Lütfen bir kategori seçin.',
            'product_slug.in'       => 'Lütfen geçerli bir kategori seçin.',
            'kvkk.accepted'         => 'Değerlendirme gönderebilmek için KVKK aydınlatma metnini kabul etmeniz gerekir.',
        ]);

        $expected = (string) $request->session()->get('review_captcha');
        if ($expected === '' || trim($data['captcha']) !== $expected) {
            throw ValidationException::withMessages([
                'captcha' => 'Güvenlik sorusunun cevabı hatalı. Lütfen tekrar deneyin.',
            ]);
        }
        $request->session()->forget('review_captcha');

        ProductReview::create([
            'product_slug'  => $data['product_slug'],
            'name'          => $data['name'],
            'phone'         => '—',
            'message'       => $data['message'],
            'is_approved'   => false,
            'kvkk_accepted' => true,
            'sort'          => 0,
            'ip'            => $request->ip(),
            'user_agent'    => substr((string) $request->userAgent(), 0, 255),
        ]);

        return redirect()
            ->to(url()->previous() . '#degerlendir')
            ->with('review_status', 'Değerlendirmen alındı. Onaylandıktan sonra sayfada yayınlanacak.');
    }
}
