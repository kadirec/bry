<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['Ayşe K.',   'Bireysel Program',  'Kendimi tanıdıkça, tıkanmış hissettiğim alanlar teker teker açıldı.',          'Bireysel', '0:47', 'plum',  null, 1],
            ['Mehmet T.', 'Online Akademi',    '9 boyutlu bakış, hayatıma bambaşka bir derinlik kattı.',                       'Online',   '1:12', 'sage',  null, 2],
            ['Deniz Y.',  'Kurumsal Program',  'Ekip içi iletişimimiz köklü biçimde değişti. Sonuçları hala hissediyoruz.',    'Kurumsal', '2:05', 'peach', null, 3],
            ['Selin A.',  'Bireysel Program',  'Artık kararlarımı alma sürecim çok daha sakin ve net.',                        'Bireysel', '0:58', 'gold',  null, 4],
            ['Burak Ö.',  'Online Akademi',    'BRY benim için bir eğitim değil, yaşam pusulası oldu.',                        'Online',   '1:34', 'ink',   null, 5],
        ];

        foreach ($items as [$name, $role, $quote, $tag, $dur, $color, $yt, $sort]) {
            Testimonial::updateOrCreate(
                ['name' => $name, 'sort' => $sort],
                [
                    'role_text'    => $role,
                    'quote'        => $quote,
                    'tag'          => $tag,
                    'duration'     => $dur,
                    'color'        => $color,
                    'youtube_id'   => $yt,
                    'is_active'    => true,
                    'show_on_home' => true,
                ]
            );
        }
    }
}
