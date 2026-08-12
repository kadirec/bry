<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

/**
 * Lokal geliştirme için 10 adet deneme blog yazısı.
 *
 * Slug'ların tamamı "deneme-" ile başlar; tek komutla temizlenebilir:
 *   Post::where('slug', 'like', 'deneme-%')->delete();
 *
 * Gövdeler bilerek zengin işaretleme içerir (h2/h3, liste, alıntı, bağlantı,
 * hizalama) — hem admin editörünü hem de .post-body stillerini sınamak için.
 */
class DemoPostsSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'zihin'     => 'Zihin',
            'iliskiler' => 'İlişkiler',
            'yasam'     => 'Yaşam',
            'aile'      => 'Aile',
            'kariyer'   => 'Kariyer',
        ];

        foreach ($categories as $slug => $name) {
            Category::firstOrCreate(['slug' => $slug], ['name' => $name, 'sort' => 0]);
        }

        $catId = fn (string $slug) => Category::where('slug', $slug)->value('id');

        foreach ($this->posts() as $i => $data) {
            $data['category_id'] = $catId($data['category']);
            unset($data['category']);

            $data['author'] ??= 'Tuncay Vural';
            $data['status'] ??= 'published';
            $data['published_at'] ??= now()->subDays(($i + 1) * 3);

            Post::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }

    private function posts(): array
    {
        return [
            [
                'slug'     => 'deneme-nefes-ritmi-gunluk-pratik',
                'title'    => 'Deneme: Nefes Ritmini Güne Yaymanın Üç Basit Yolu',
                'category' => 'yasam',
                'excerpt'  => 'Nefes çalışmasını ayrı bir "seans" olmaktan çıkarıp güne yaymak, ritmi kalıcı hâle getirir. İşte üç küçük pratik.',
                'reading_minutes' => 6,
                'is_featured'  => true,
                'show_on_home' => true,
                'home_sort'    => 1,
                'body' => <<<'HTML'
                    <p>Nefes çalışmasını çoğu kişi günün belirli bir saatine sıkıştırır. Oysa <strong>ritim, tekrarla kurulur</strong>; süreyle değil.</p>
                    <h2>Neden gün içine yaymalı?</h2>
                    <p>Bedene verilen sinyalin sürekliliği, tek seferlik yoğun bir çalışmadan daha belirleyicidir. Kısa ve sık tekrarlar sinir sistemini yeniden ayarlar.</p>
                    <h3>Üç pratik</h3>
                    <ol>
                      <li><strong>Eşik nefesi:</strong> Her kapıdan geçerken üç sayı al, üç sayı ver.</li>
                      <li><strong>Ekran molası:</strong> Her 45 dakikada bir, gözünü uzağa çevirip beş tur nefes.</li>
                      <li><strong>Kapanış:</strong> Gün biterken sırtüstü uzan, verişi alıştan uzun tut.</li>
                    </ol>
                    <blockquote>Ritim, yaptığın en büyük şey değil; en sık yaptığın şeydir.</blockquote>
                    <p>Ayrıntı için <a href="/bry-nedir">BRY nedir</a> sayfasına göz atabilirsin.</p>
                    HTML,
            ],
            [
                'slug'     => 'deneme-zihinsel-yorgunluk-belirtileri',
                'title'    => 'Deneme: Zihinsel Yorgunluğun Fark Edilmeyen Beş Belirtisi',
                'category' => 'zihin',
                'excerpt'  => 'Yorgunluk her zaman uykusuzluk gibi görünmez. Bazen sabırsızlık, bazen karar verememe hâlinde saklanır.',
                'reading_minutes' => 7,
                'is_featured'  => true,
                'show_on_home' => true,
                'home_sort'    => 2,
                'body' => <<<'HTML'
                    <p>Zihinsel yorgunluk, çoğu zaman "tembellik" ya da "isteksizlik" diye yanlış adlandırılır.</p>
                    <h2>Beş belirti</h2>
                    <ul>
                      <li>Küçük kararların bile büyük gelmesi</li>
                      <li>Okuduğun cümleyi tekrar tekrar başa sarma</li>
                      <li>Sesli ortamlara tahammülün azalması</li>
                      <li>Gün içinde sürekli bir şey atıştırma isteği</li>
                      <li>Yatağa girince zihnin hızlanması</li>
                    </ul>
                    <h3>Ne yapmalı?</h3>
                    <p>Önce <em>daha çok dinlenmek</em> değil, <strong>daha az karar vermek</strong> gerekir. Günün ilk saatlerini sabit bir rutine bağlamak, karar yükünü hafifletir.</p>
                    HTML,
            ],
            [
                'slug'     => 'deneme-iliskilerde-sinir-koymak',
                'title'    => 'Deneme: İlişkilerde Sınır Koymak Neden Reddetmek Değildir?',
                'category' => 'iliskiler',
                'excerpt'  => 'Sınır, ilişkiyi bitiren değil; ilişkinin nerede durduğunu netleştiren şeydir.',
                'reading_minutes' => 9,
                'show_on_home' => true,
                'home_sort'    => 3,
                'body' => <<<'HTML'
                    <p>Sınır koymayı reddedilmekle eşitleyen bir kültürde büyüdük. Oysa sınır, <strong>ilişkiyi korumak</strong> içindir.</p>
                    <h2>Sınır ile duvar arasındaki fark</h2>
                    <p>Duvar temas kesmek içindir; sınır ise teması sürdürülebilir kılar. Birincisi kapatır, ikincisi düzenler.</p>
                    <blockquote>Sınırı olmayan yakınlık, zamanla yükümlülüğe dönüşür.</blockquote>
                    <h3>Nasıl kurulur?</h3>
                    <ol>
                      <li>İhtiyacını önce kendine söyle.</li>
                      <li>Karşındakini suçlamadan, tek cümleyle ilet.</li>
                      <li>Tepkiyi yönetmeye çalışma; sınırı sürdür.</li>
                    </ol>
                    HTML,
            ],
            [
                'slug'     => 'deneme-sabah-rutini-kurmak',
                'title'    => 'Deneme: Sürdürülebilir Bir Sabah Rutini Nasıl Kurulur?',
                'category' => 'yasam',
                'excerpt'  => 'Rutin, disiplin meselesi değil tasarım meselesidir. Sürtünmeyi azalt, tekrar kendiliğinden gelsin.',
                'reading_minutes' => 5,
                'body' => <<<'HTML'
                    <p>Çoğu sabah rutini üçüncü günde biter. Sebep motivasyon eksikliği değil, <strong>fazla iddialı bir başlangıçtır</strong>.</p>
                    <h2>Küçük başla</h2>
                    <p>On dakikalık, tek parçalı bir rutin, kırk dakikalık beş parçalı bir rutinden çok daha uzun yaşar.</p>
                    <ul>
                      <li>Akşamdan tek bir hazırlık yap</li>
                      <li>Rutini sabit bir tetikleyiciye bağla</li>
                      <li>Kaçırdığın günü telafi etmeye çalışma</li>
                    </ul>
                    HTML,
            ],
            [
                'slug'     => 'deneme-aile-icinde-iletisim',
                'title'    => 'Deneme: Aile İçinde Duyulmak — Dinlemenin İki Katmanı',
                'category' => 'aile',
                'excerpt'  => 'Aile içi tartışmaların çoğu anlaşmazlıktan değil, duyulmamış hissetmekten çıkar.',
                'reading_minutes' => 8,
                'body' => <<<'HTML'
                    <p>Bir tartışmada iki katman vardır: <em>söylenen</em> ve <em>söylenmeye çalışılan</em>.</p>
                    <h2>Birinci katman: içerik</h2>
                    <p>Kim ne yaptı, saat kaçta oldu, kimin sırası. Tartışmalar burada başlar ama burada bitmez.</p>
                    <h2>İkinci katman: ihtiyaç</h2>
                    <p>Altta neredeyse her zaman aynı cümle durur: <strong>"Beni önemsediğini görmek istiyorum."</strong></p>
                    <blockquote>İçeriği tartışırken ihtiyacı duymazsan, aynı kavgayı farklı konularla tekrarlarsın.</blockquote>
                    HTML,
            ],
            [
                'slug'     => 'deneme-is-yerinde-tukenmislik',
                'title'    => 'Deneme: İş Yerinde Tükenmişlik ve Toparlanmanın Ritmi',
                'category' => 'kariyer',
                'excerpt'  => 'Tükenmişlik ani bir çöküş değil, uzun süre fark edilmeyen bir eğimdir.',
                'reading_minutes' => 10,
                'body' => <<<'HTML'
                    <p>Tükenmişlik çoğunlukla <strong>işi sevmemekle</strong> ilgili değildir; toparlanma süresi olmadan çalışmakla ilgilidir.</p>
                    <h2>Eğimi görmek</h2>
                    <ol>
                      <li>Hafta sonu dinlenmek artık yetmiyor</li>
                      <li>Başarı hissi giderek kısalıyor</li>
                      <li>Küçük aksaklıklar orantısız tepki çekiyor</li>
                    </ol>
                    <h3>Toparlanma nasıl kurulur?</h3>
                    <p>Toparlanma, işten uzaklaşmak değil; <em>farklı bir ritme geçmektir</em>. Beden hareket ederken zihin sessizleşir.</p>
                    HTML,
            ],
            [
                'slug'     => 'deneme-ofke-ile-calismak',
                'title'    => 'Deneme: Öfkeyi Bastırmadan Yönetmek Mümkün mü?',
                'category' => 'zihin',
                'excerpt'  => 'Öfke bir arıza değil, bir bilgi kaynağıdır. Sorun duygunun kendisinde değil, ifade biçimindedir.',
                'reading_minutes' => 7,
                'body' => <<<'HTML'
                    <p>Öfkeyi bastırmak onu yok etmez; <strong>sadece ertelenmiş hâline</strong> dönüştürür.</p>
                    <h2>Öfke ne söyler?</h2>
                    <p>Çoğu zaman bir sınırın aşıldığını ya da bir ihtiyacın görülmediğini haber verir.</p>
                    <blockquote>Duyguyu susturursan, sana bilgi vermeyi de bırakır.</blockquote>
                    <h3>Üç adımlı pratik</h3>
                    <ul>
                      <li>Adlandır: "Şu an öfkeliyim."</li>
                      <li>Yerini bul: Bedende nerede hissediliyor?</li>
                      <li>Ertele, bastırma: Yirmi dakika sonra konuş.</li>
                    </ul>
                    HTML,
            ],
            [
                'slug'     => 'deneme-uyku-duzeni-ritim',
                'title'    => 'Deneme: Uyku Düzeni Bir Saat Meselesi Değil, Ritim Meselesi',
                'category' => 'yasam',
                'excerpt'  => 'Kaçta yattığından çok, her gün aynı saatte yatıp yatmadığın belirleyici.',
                'reading_minutes' => 6,
                'body' => <<<'HTML'
                    <p>Uyku üzerine konuşurken herkes süreyi tartışır. Oysa asıl belirleyici <strong>düzenliliktir</strong>.</p>
                    <h2>Sabit uyanma saati</h2>
                    <p>Yatma saatini değil, uyanma saatini sabitle. Vücut geri kalanını kendi ayarlar.</p>
                    <p class="ql-align-center"><em>Ritim önce uyanışta kurulur.</em></p>
                    HTML,
            ],
            [
                'slug'     => 'deneme-kurumsal-ritim-atolyesi-notlari',
                'title'    => 'Deneme: Kurumsal Atölyeden Notlar — Ekipte Ortak Ritim',
                'category' => 'kariyer',
                'excerpt'  => 'Bir ekipte verim, bireysel hızların toplamı değil; ortak ritmin niteliğidir.',
                'reading_minutes' => 11,
                'status'   => 'draft',
                'body' => <<<'HTML'
                    <p>Geçtiğimiz ay yapılan atölyeden derlenmiş notlar. <em>(Bu yazı taslak durumundadır.)</em></p>
                    <h2>Gözlem</h2>
                    <p>Ekipler çoğunlukla hız sorunundan şikâyet eder; gözlemlenen ise <strong>ritim uyumsuzluğudur</strong>.</p>
                    <ul>
                      <li>Toplantılar arası nefes payı yok</li>
                      <li>Herkesin yoğunlaşma saati farklı</li>
                      <li>Kesinti normalleşmiş durumda</li>
                    </ul>
                    HTML,
            ],
            [
                'slug'     => 'deneme-kendini-affetmek',
                'title'    => 'Deneme: Kendini Affetmek Neden En Zor Adım?',
                'category' => 'iliskiler',
                'excerpt'  => 'Başkasını affetmeyi öğreniriz de, aynı cümleyi kendimize kurmak nedense zor gelir.',
                'reading_minutes' => 8,
                'status'   => 'draft',
                'body' => <<<'HTML'
                    <p>Affetmek üzerine anlatılanların neredeyse tamamı <strong>başkası</strong> içindir.</p>
                    <h2>İç sesin tonu</h2>
                    <p>Kendine kurduğun cümleyi, sevdiğin birine kurar mıydın? Cevap çoğunlukla hayır.</p>
                    <blockquote>Kendine gösterdiğin sertlik, disiplin değil alışkanlıktır.</blockquote>
                    HTML,
            ],
        ];
    }
}
