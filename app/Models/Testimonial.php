<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'slug', 'role_text', 'quote', 'story', 'tag', 'duration', 'color',
        'youtube_id', 'video_file', 'video_mime', 'thumbnail',
        'is_active', 'show_on_home', 'sort',
    ];

    protected static function booted(): void
    {
        static::saving(function (Testimonial $t) {
            if (empty($t->slug)) {
                $base = Str::slug($t->name) ?: 'hikaye';
                $slug = $base;
                $i = 2;
                while (static::where('slug', $slug)->where('id', '!=', $t->id ?? 0)->exists()) {
                    $slug = $base . '-' . $i++;
                }
                $t->slug = $slug;
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected function casts(): array
    {
        return [
            'is_active'    => 'boolean',
            'show_on_home' => 'boolean',
        ];
    }

    public const COLORS = [
        'plum'  => 'Plum (mor)',
        'sage'  => 'Sage (yeşil)',
        'peach' => 'Peach (şeftali)',
        'gold'  => 'Gold (altın)',
        'ink'   => 'Ink (siyah)',
    ];

    public function scopeActive(Builder $q): Builder
    {
        return $q->where('is_active', true);
    }

    public function scopeForHome(Builder $q): Builder
    {
        return $q->where('show_on_home', true);
    }

    public function youtubeThumbnailUrl(): ?string
    {
        return $this->youtube_id
            ? "https://img.youtube.com/vi/{$this->youtube_id}/hqdefault.jpg"
            : null;
    }

    public function videoFileUrl(): ?string
    {
        if (! $this->video_file) {
            return null;
        }
        return preg_match('#^https?://#', $this->video_file)
            ? $this->video_file
            : asset('storage/' . ltrim($this->video_file, '/'));
    }

    /**
     * Kart poster'ı / video kapağı.
     * Önce kullanıcının yüklediği özel thumbnail, yoksa YouTube hqdefault.
     */
    public function posterUrl(): ?string
    {
        if ($this->thumbnail) {
            return preg_match('#^https?://#', $this->thumbnail)
                ? $this->thumbnail
                : asset('storage/' . ltrim($this->thumbnail, '/'));
        }
        return $this->youtubeThumbnailUrl();
    }

    /**
     * Frontend tetikleyici için: önce yüklenen video, yoksa YouTube.
     * Hiçbiri yoksa null döner (kart disabled).
     */
    public function videoTrigger(): ?array
    {
        if ($this->video_file) {
            return [
                'type'  => 'file',
                'value' => $this->videoFileUrl(),
                'mime'  => $this->video_mime ?: 'video/mp4',
            ];
        }
        if ($this->youtube_id) {
            return ['type' => 'youtube', 'value' => $this->youtube_id, 'mime' => null];
        }
        return null;
    }
}
