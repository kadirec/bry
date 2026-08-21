<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Canonical host — sayfalardaki @section('canonical') değerleriyle birebir
     * aynı olmalı, yoksa Google sitemap URL'ini "alternate" sayar.
     */
    private const BASE = 'https://www.bilincliritmikyasam.com';

    /**
     * Statik sayfalar: [route adı => [changefreq, priority]]
     * Sıra sitemap'teki sıradır.
     */
    private const STATIC_PAGES = [
        'home'                     => ['weekly',  '1.0'],
        'bry-nedir'                => ['monthly', '0.9'],
        'bry-metodu-ile-tanis'     => ['monthly', '0.9'],
        'tuncay-vural'             => ['monthly', '0.8'],
        'programs.bireysel'        => ['monthly', '0.8'],
        'programs.online'          => ['monthly', '0.8'],
        'programs.methodu-egitimi' => ['monthly', '0.8'],
        'programs.gercek-ben'      => ['monthly', '0.8'],
        'programs.kurumsal'        => ['monthly', '0.8'],
        'deneyimler.donusen'       => ['weekly',  '0.7'],
        'deneyimler.etkinlik'      => ['monthly', '0.7'],
        'deneyimler.referanslar'   => ['monthly', '0.6'],
        'deneyimler.kurumsal'      => ['monthly', '0.6'],
        'blog'                     => ['daily',   '0.9'],
        'iletisim'                 => ['yearly',  '0.6'],
    ];

    private static function url(string $path): string
    {
        return self::BASE . ($path === '/' ? '/' : rtrim($path, '/'));
    }

    public function __invoke(): Response
    {
        $urls = [];

        foreach (self::STATIC_PAGES as $name => [$changefreq, $priority]) {
            $urls[] = [
                'loc'        => self::url(route($name, absolute: false)),
                'changefreq' => $changefreq,
                'priority'   => $priority,
            ];
        }

        Post::published()
            ->newestFirst()
            ->get(['slug', 'updated_at', 'published_at'])
            ->each(function (Post $post) use (&$urls) {
                $urls[] = [
                    'loc'        => self::url(route('blog.show', $post, absolute: false)),
                    'lastmod'    => ($post->updated_at ?? $post->published_at)?->toAtomString(),
                    'changefreq' => 'monthly',
                    'priority'   => '0.7',
                ];
            });

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
