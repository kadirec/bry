<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            // General
            ['general',  'site_name',         'text',     'Site Adı',           'Bilinçli Ritmik Yaşam',                  1],
            ['general',  'site_tagline',      'text',     'Slogan / Alt başlık', 'Tuncay Vural · BRY Metodu',             2],
            ['general',  'site_short_desc',   'textarea', 'Kısa Açıklama',      'Kendini tanı, ritmini bul, bilinçle yaşa.', 3],
            ['general',  'site_url',          'url',      'Üretim URL',         'https://www.bilincliritmikyasam.com',     4],
            ['general',  'logo_light',        'image',    'Logo (açık zemin)',  'assets/logo.png',                         5],
            ['general',  'logo_dark',         'image',    'Logo (koyu zemin)',  'assets/logo-dark.png',                    6],

            // Contact
            ['contact',  'phone',             'tel',      'Telefon',            '+90 555 555 55 55',  1],
            ['contact',  'whatsapp',          'tel',      'WhatsApp',           '+90 555 555 55 55',  2],
            ['contact',  'email',             'email',    'E-posta',            'info@bilincliritmikyasam.com', 3],
            ['contact',  'address',           'textarea', 'Adres',              'İstanbul, Türkiye',  4],
            ['contact',  'working_hours',     'text',     'Çalışma Saatleri',   'Pzt – Cum · 09:00 – 18:00',   5],

            // Social
            ['social',   'social_youtube',    'url', 'YouTube',   'https://www.youtube.com/@bilincliritmikyasam',   1],
            ['social',   'social_instagram',  'url', 'Instagram', 'https://www.instagram.com/tuncayvural_bry/',      2],
            ['social',   'social_facebook',   'url', 'Facebook',  'https://www.facebook.com/BilincliRitmikYasam',    3],
            ['social',   'social_tiktok',     'url', 'TikTok',    'https://www.tiktok.com/@bilincliritmikyasam',     4],
            ['social',   'social_spotify',    'url', 'Spotify',   'https://open.spotify.com/show/1GDAZ6JAynBhv7L3wZwJps', 5],
        ];

        foreach ($defaults as [$group, $key, $type, $label, $value, $sort]) {
            Setting::updateOrCreate(
                ['key' => $key],
                compact('group', 'type', 'label', 'value', 'sort')
            );
        }
    }
}
