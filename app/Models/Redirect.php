<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    protected $fillable = [
        'from_path', 'to_path', 'status_code', 'is_active', 'note',
    ];

    protected function casts(): array
    {
        return [
            'is_active'   => 'boolean',
            'status_code' => 'integer',
            'hits'        => 'integer',
            'last_hit_at' => 'datetime',
        ];
    }

    public function scopeActive(Builder $q): Builder
    {
        return $q->where('is_active', true);
    }

    /**
     * Sorgu ve trailing slash olmadan, tek "/" ile başlayan, küçük-büyük harfi
     * korunmuş normalize edilmiş path. Kök "/" için boş string döndürür.
     */
    public static function normalizePath(?string $path): string
    {
        if ($path === null || $path === '') {
            return '/';
        }
        $path = trim($path);
        // Sorgu ve fragment temizle
        $path = strtok($path, '?');
        $path = strtok($path ?: '', '#');
        // Mutlak URL geldi ise sadece path kısmını al
        if (preg_match('#^https?://[^/]+(/.*)?$#i', $path, $m)) {
            $path = $m[1] ?? '/';
        }
        if ($path === '' || $path[0] !== '/') {
            $path = '/' . ltrim($path, '/');
        }
        // Trailing slash sadeleştir (kök hariç)
        if (strlen($path) > 1) {
            $path = rtrim($path, '/');
        }
        return $path;
    }
}
