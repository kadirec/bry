<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = [
        'product_slug',
        'name',
        'phone',
        'message',
        'is_approved',
        'kvkk_accepted',
        'sort',
        'ip',
        'user_agent',
    ];

    protected function casts(): array
    {
        return [
            'is_approved'   => 'boolean',
            'kvkk_accepted' => 'boolean',
        ];
    }

    public const PRODUCTS = [
        'genel'               => 'Genel Değerlendirme',
        'gercek-ben-egitimi'  => 'Gerçek Ben Eğitimi (Online Eğitim)',
        'bry-methodu-egitimi' => 'BRY Methodu Eğitimi (Online Eğitim)',
    ];

    public function productLabel(): string
    {
        return self::PRODUCTS[$this->product_slug] ?? $this->product_slug;
    }

    public function scopeApproved(Builder $q): Builder
    {
        return $q->where('is_approved', true);
    }

    public function scopePending(Builder $q): Builder
    {
        return $q->where('is_approved', false);
    }

    public function scopeForProduct(Builder $q, string $slug): Builder
    {
        return $q->where('product_slug', $slug);
    }
}
