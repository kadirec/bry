<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class KurumsalPhoto extends Model
{
    protected $fillable = ['image_path', 'caption', 'sort', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    public function scopeActive(Builder $q): Builder
    {
        return $q->where('is_active', true);
    }

    public function imageUrl(): ?string
    {
        if (! $this->image_path) {
            return null;
        }
        return preg_match('#^https?://#', $this->image_path)
            ? $this->image_path
            : asset('storage/' . ltrim($this->image_path, '/'));
    }
}
