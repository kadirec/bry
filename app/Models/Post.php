<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'category_id', 'title', 'slug', 'excerpt', 'body',
        'featured_image', 'author', 'reading_minutes',
        'is_featured', 'is_featured_all', 'show_on_home', 'home_sort',
        'status', 'published_at', 'views',
        'meta_title', 'meta_description', 'og_image',
    ];

    protected function casts(): array
    {
        return [
            'is_featured'     => 'boolean',
            'is_featured_all' => 'boolean',
            'show_on_home' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('status', 'published')
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            });
    }

    /**
     * En yeniden eskiye sıralar. published_at boşsa created_at'e düşer,
     * böylece tarihi girilmemiş yeni yazılar listenin sonuna atılmaz.
     */
    public function scopeNewestFirst(Builder $query): Builder
    {
        return $query
            ->orderByDesc(DB::raw('COALESCE(published_at, created_at)'))
            ->orderByDesc('id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function featuredImageUrl(): ?string
    {
        if (! $this->featured_image) {
            return null;
        }
        return preg_match('#^https?://#', $this->featured_image)
            ? $this->featured_image
            : asset('storage/' . ltrim($this->featured_image, '/'));
    }
}
