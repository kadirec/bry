<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

/**
 * Hızlı doldurma amaçlı 10 lorem ipsum yazısı (yalnızca başlık + kısa metin).
 * Temizlik: Post::where('slug', 'like', 'deneme-lorem-%')->delete();
 */
class DemoLoremPostsSeeder extends Seeder
{
    public function run(): void
    {
        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.';

        $catIds = Category::pluck('id')->all();

        for ($i = 1; $i <= 10; $i++) {
            Post::updateOrCreate(
                ['slug' => "deneme-lorem-{$i}"],
                [
                    'title'           => "Lorem Ipsum Deneme Yazısı {$i}",
                    'excerpt'         => $lorem,
                    'body'            => "<p>{$lorem}</p><p>{$lorem}</p>",
                    'category_id'     => $catIds ? $catIds[($i - 1) % count($catIds)] : null,
                    'author'          => 'Tuncay Vural',
                    'reading_minutes' => 3,
                    'status'          => 'published',
                    'published_at'    => now()->subDays(40 + $i),
                ]
            );
        }
    }
}
