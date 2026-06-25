<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    protected $fillable = [
        'route', 'label', 'title', 'description', 'keywords',
        'canonical', 'og_image', 'og_type', 'robots', 'jsonld',
    ];

    public static function forRoute(?string $route): ?self
    {
        if (! $route) {
            return null;
        }
        return static::where('route', $route)->first();
    }
}
