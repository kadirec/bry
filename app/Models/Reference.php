<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = 'references';

    protected $fillable = [
        'name', 'image_path', 'website', 'is_active', 'show_on_kurumsal', 'sort',
    ];

    protected function casts(): array
    {
        return [
            'is_active'        => 'boolean',
            'show_on_kurumsal' => 'boolean',
        ];
    }

    public function scopeActive(Builder $q): Builder
    {
        return $q->where('is_active', true);
    }

    public function scopeOnKurumsal(Builder $q): Builder
    {
        return $q->where('show_on_kurumsal', true);
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
