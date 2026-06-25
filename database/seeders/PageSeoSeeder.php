<?php

namespace Database\Seeders;

use App\Models\PageSeo;
use Illuminate\Database\Seeder;

class PageSeoSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            ['home',                     'Anasayfa'],
            ['bry-nedir',                'BRY Nedir?'],
            ['tuncay-vural',             'Tuncay Vural'],
            ['programs.bireysel',        'Bireysel ve Özel Programlar'],
            ['programs.online',          'BRY Online Akademi'],
            ['programs.kurumsal',        'Kurumsal Programlar'],
            ['deneyimler.donusen',       'BRY ile Dönüşen Hayatlar'],
            ['deneyimler.etkinlik',      'Etkinlik ve Kamp'],
            ['deneyimler.referanslar',   'Kurumsal Referanslar'],
            ['deneyimler.kurumsal',      'Kurumsal Etkinlikler'],
            ['blog',                     'Blog'],
            ['iletisim',                 'İletişim'],
        ];

        foreach ($pages as [$route, $label]) {
            PageSeo::updateOrCreate(
                ['route' => $route],
                [
                    'label'     => $label,
                    'og_type'   => 'website',
                    'robots'    => 'index, follow, max-image-preview:large',
                ]
            );
        }
    }
}
