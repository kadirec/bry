<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AcademyCourse extends Model
{
    public const TYPE_COURSE = 'course';
    public const TYPE_LIVE   = 'live';

    protected $fillable = [
        'type', 'title', 'title_note', 'quote', 'image_path', 'body',
        'badge', 'show_seal', 'link_url', 'link_label', 'sort', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'show_seal' => 'boolean',
        ];
    }

    public function scopeActive(Builder $q): Builder
    {
        return $q->where('is_active', true);
    }

    public function scopeOfType(Builder $q, string $type): Builder
    {
        return $q->where('type', $type);
    }

    public function scopeOrdered(Builder $q): Builder
    {
        return $q->orderBy('sort')->orderBy('id');
    }

    public function imageUrl(): ?string
    {
        if (! $this->image_path) {
            return null;
        }
        if (preg_match('#^https?://#', $this->image_path)) {
            return $this->image_path;
        }
        // Repoya dahil statik görseller (public/assets/...) vs. panelden yüklenenler (storage/...)
        return str_starts_with($this->image_path, 'assets/')
            ? asset($this->image_path)
            : asset('storage/' . ltrim($this->image_path, '/'));
    }

    /** *vurgu* → <em>vurgu</em> (yalnızca em; geri kalan escape edilir) */
    public static function emphasize(?string $text): string
    {
        if (! $text) {
            return '';
        }
        return preg_replace('/\*(.+?)\*/u', '<em>$1</em>', e($text));
    }

    public function titleHtml(): string
    {
        return static::emphasize($this->title);
    }

    public function quoteHtml(): string
    {
        return static::emphasize($this->quote);
    }

    /** Boş satırla ayrılmış metni paragraf dizisine çevirir. */
    public function paragraphs(): array
    {
        if (! $this->body) {
            return [];
        }
        $parts = preg_split('/\R\s*\R/u', trim($this->body));
        return array_values(array_filter(array_map('trim', $parts ?: [])));
    }
}
