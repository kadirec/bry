<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'group', 'type', 'label', 'hint', 'sort'];

    /**
     * Bir ayarı oku. Cache'ten döner.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $all = static::all()->pluck('value', 'key')->all();
        return $all[$key] ?? $default;
    }

    /**
     * Bütün ayarları cache'ten tek seferde al (view composer için).
     */
    public static function allKeyed(): array
    {
        return static::all()->pluck('value', 'key')->all();
    }
}
