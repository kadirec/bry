<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Zihin',     'slug' => 'zihin',     'sort' => 1],
            ['name' => 'İlişkiler', 'slug' => 'iliskiler', 'sort' => 2],
            ['name' => 'Yaşam',     'slug' => 'yasam',     'sort' => 3],
            ['name' => 'Aile',      'slug' => 'aile',      'sort' => 4],
            ['name' => 'Kariyer',   'slug' => 'kariyer',   'sort' => 5],
        ];
        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }

        $catId = fn (string $slug) => Category::where('slug', $slug)->value('id');

        $posts = [
            [
                'title' => 'Değersizlik Duygusu ve Hissi ile Başa Çıkma Rehberi',
                'category_id' => $catId('zihin'),
                'excerpt' => 'Değersizlik duygusu neden oluşur ve nasıl aşılır? Bu rehberde, değersizlik hissini doğru anlayarak nasıl avantaja çevirebileceğinizi ve zihninizi nasıl yöneteceğinizi keşfedin.',
                'body'    => '<p>Değersizlik duygusu, herkesin yaşamında zaman zaman karşılaştığı bir histir. Bu yazıda, bu duygunun kökenlerini ve onu nasıl yönetebileceğinizi paylaşıyoruz.</p><h2>Değersizlik nereden gelir?</h2><p>Çoğu zaman çocukluk yıllarımızda şekillenen inanç kalıpları, yetişkinlikte değersizlik hissinin temelini oluşturur.</p>',
                'reading_minutes' => 8,
                'is_featured' => true,
            ],
            [
                'title' => 'Yetersizlik Hissini Yenmen Bu Yöntem İle Mümkün!',
                'category_id' => $catId('zihin'),
                'excerpt' => 'Yetersizlik hissi neden oluşur ve nasıl avantaja dönüştürülür? Doğru bakış açısı ve yöntemler bu duyguyu nasıl güce çevirebileceğinizi keşfedin.',
                'body' => '<p>Yetersizlik hissi, çoğu zaman büyümeyi tetikleyen bir motorlardan biridir...</p>',
                'reading_minutes' => 6,
            ],
            [
                'title' => 'İlişkide Nasıl Bir İnsan Aradığını Biliyor Musun?',
                'category_id' => $catId('iliskiler'),
                'excerpt' => 'İlişkide doğru kişiyi seçmek gerçekten mümkün mü? Kendinizi tanıyarak karakter odaklı doğru ilişki kurmanın nasıl mümkün olduğunu keşfedin.',
                'body' => '<p>Sağlıklı ilişkiler, önce kendini tanımakla başlar...</p>',
                'reading_minutes' => 7,
            ],
            [
                'title' => 'Erteleme Alışkanlığını Yönetmek Mümkün',
                'category_id' => $catId('yasam'),
                'excerpt' => 'Ertelemek bir karakter özelliği değil, yönetebileceğin bir alışkanlıktır. BRY Metodu ile bu alışkanlığın nedenlerini fark et ve kontrol altına alma yollarını keşfet.',
                'body' => '<p>Erteleme; çoğu zaman mükemmeliyetçilik ve karar verme yorgunluğunun bir sonucudur...</p>',
                'reading_minutes' => 5,
            ],
            [
                'title' => 'Özgüven: Karakter mi, Edinilmiş Bir Durum mu?',
                'category_id' => $catId('zihin'),
                'excerpt' => 'Özgüven eksikliği bir karakter özelliği değil; edinilmiş bir durumdur. Bu yazıda özgüvenin neden azaldığını ve nasıl güçlendirebileceğinizi okuyun.',
                'body' => '<p>Özgüven, doğuştan değil, kazanılan bir yetkindir...</p>',
                'reading_minutes' => 6,
            ],
            [
                'title' => 'Aile İçi İletişimde Anlamak ve Anlaşılmak',
                'category_id' => $catId('aile'),
                'excerpt' => 'Aile içi iletişimde çoğu zaman duyduğumuz şey ile söylenen şey aynı değildir. Karşılıklı anlamayı ve anlaşılmayı mümkün kılan yöntemleri inceleyin.',
                'body' => '<p>Aile içi iletişimde dinlemek, konuşmaktan çok daha önemlidir...</p>',
                'reading_minutes' => 7,
            ],
            [
                'title' => 'Kariyerde Doğru Karar Almanın Yolu',
                'category_id' => $catId('kariyer'),
                'excerpt' => 'Kariyer kararları, yalnızca beceri değil; öz-farkındalık gerektirir. Doğru kararı nasıl alacağınızı bu yazıda inceleyin.',
                'body' => '<p>Kariyerinde doğru kararı almak için önce kendini tanımalısın...</p>',
                'reading_minutes' => 6,
            ],
            [
                'title' => 'Yaşam Ritmini Bulmanın 9 Adımı',
                'category_id' => $catId('yasam'),
                'excerpt' => 'Yaşamın 9 boyutunu dengeleyerek kendi ritmini bulmanın yöntemini keşfet.',
                'body' => '<p>Yaşam ritmi; uyku, beslenme, ilişkiler, üretim ve daha pek çok boyutun uyumudur...</p>',
                'reading_minutes' => 9,
            ],
            [
                'title' => 'İlişkide Sınır Çizmek Neden Sevgisizlik Değildir?',
                'category_id' => $catId('iliskiler'),
                'excerpt' => 'Sağlıklı ilişkilerin temeli sınırlardır. Sınır çizmek neden hem kendine hem karşındakine saygıdır?',
                'body' => '<p>Sınırlar, ilişkide sevginin korunduğu güvenli alanlardır...</p>',
                'reading_minutes' => 5,
            ],
        ];

        foreach ($posts as $i => $p) {
            Post::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($p['title'])],
                array_merge($p, [
                    'status'        => 'published',
                    'published_at'  => now()->subDays(9 - $i),
                    'author'        => 'Tuncay Vural',
                ])
            );
        }
    }
}
