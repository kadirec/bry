<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductReviewController extends Controller
{
    public function index(Request $request): View
    {
        $query = ProductReview::query();

        $status = $request->string('status')->toString();
        if ($status === 'pending') {
            $query->pending();
        } elseif ($status === 'approved') {
            $query->approved();
        }

        $product = $request->string('product')->toString();
        if ($product && array_key_exists($product, ProductReview::PRODUCTS)) {
            $query->forProduct($product);
        }

        $reviews = $query->orderByDesc('created_at')->paginate(30)->withQueryString();

        return view('admin.product_reviews.index', [
            'reviews'       => $reviews,
            'products'      => ProductReview::PRODUCTS,
            'activeStatus'  => $status,
            'activeProduct' => $product,
            'counts'        => [
                'total'    => ProductReview::count(),
                'pending'  => ProductReview::pending()->count(),
                'approved' => ProductReview::approved()->count(),
            ],
        ]);
    }

    public function create(): View
    {
        return view('admin.product_reviews.create', [
            'products' => ProductReview::PRODUCTS,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'product_slug' => ['required', Rule::in(array_keys(ProductReview::PRODUCTS))],
            'name'         => ['required', 'string', 'max:120'],
            'message'      => ['required', 'string', 'max:2000'],
            'is_approved'  => ['nullable', 'boolean'],
            'sort'         => ['nullable', 'integer', 'min:0', 'max:9999'],
        ]);

        $review = ProductReview::create([
            'product_slug'  => $data['product_slug'],
            'name'          => $data['name'],
            'phone'         => '—',
            'message'       => $data['message'],
            'is_approved'   => (bool) ($data['is_approved'] ?? true),
            'kvkk_accepted' => true,
            'sort'          => (int) ($data['sort'] ?? 0),
        ]);

        return redirect()->route('admin.product-reviews.edit', $review)
            ->with('status', 'Değerlendirme eklendi.');
    }

    public function edit(ProductReview $product_review): View
    {
        return view('admin.product_reviews.edit', [
            'review'   => $product_review,
            'products' => ProductReview::PRODUCTS,
        ]);
    }

    public function update(Request $request, ProductReview $product_review): RedirectResponse
    {
        $data = $request->validate([
            'product_slug' => ['required', Rule::in(array_keys(ProductReview::PRODUCTS))],
            'name'         => ['required', 'string', 'max:120'],
            'message'      => ['required', 'string', 'max:2000'],
            'is_approved'  => ['nullable', 'boolean'],
            'sort'         => ['nullable', 'integer', 'min:0', 'max:9999'],
        ]);

        $product_review->update([
            'product_slug' => $data['product_slug'],
            'name'         => $data['name'],
            'message'      => $data['message'],
            'is_approved'  => (bool) ($data['is_approved'] ?? false),
            'sort'         => (int) ($data['sort'] ?? 0),
        ]);

        return redirect()->route('admin.product-reviews.edit', $product_review)
            ->with('status', 'Değerlendirme güncellendi.');
    }

    public function toggle(ProductReview $product_review): RedirectResponse
    {
        $product_review->update(['is_approved' => ! $product_review->is_approved]);

        return back()->with('status', $product_review->is_approved
            ? 'Değerlendirme onaylandı, sitede görünür.'
            : 'Değerlendirme onayı kaldırıldı.');
    }

    public function destroy(ProductReview $product_review): RedirectResponse
    {
        $product_review->delete();
        return redirect()->route('admin.product-reviews.index')
            ->with('status', 'Değerlendirme silindi.');
    }
}
