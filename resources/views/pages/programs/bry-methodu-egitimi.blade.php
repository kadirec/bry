@extends('layouts.app')

@section('title', 'BRY Metodu Eğitimi — Kendini Tanı ve Yaşamını Yönet | Tuncay Vural')
@section('description', '4 haftalık BRY Metodu Online Eğitimi ile kendini bütünsel olarak tanı, güçlü yönlerini keşfet ve yaşamına bilinçle yön ver. Tuncay Vural\'ın anlatımıyla.')
@section('keywords', 'bry metodu eğitimi, bilinçli ritmik yaşam, tuncay vural, online eğitim, kendini tanımak, yaşam metodu, farkındalık eğitimi, kişisel gelişim, bilinçli yaşam, 9 boyutlu insan')
@section('canonical', 'https://www.bilincliritmikyasam.com/bry-methodu-egitimi')
@section('og-image', 'assets/logo.png')
@section('main-class', 'inner')

@section('jsonld')
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "https://www.bilincliritmikyasam.com/#organization",
      "name": "Bilinçli Ritmik Yaşam",
      "alternateName": "BRY",
      "url": "https://www.bilincliritmikyasam.com/",
      "logo": "https://www.bilincliritmikyasam.com/assets/logo.png",
      "founder": { "@type": "Person", "name": "Tuncay Vural" },
      "foundingDate": "2003",
      "sameAs": [
        "https://www.youtube.com/@bilincliritmikyasam",
        "https://www.instagram.com/tuncayvural_bry/",
        "https://www.facebook.com/BilincliRitmikYasam",
        "https://www.tiktok.com/@bilincliritmikyasam",
        "https://open.spotify.com/show/1GDAZ6JAynBhv7L3wZwJps"
      ]
    },
    {
      "@type": "Course",
      "name": "BRY Metodu Eğitimi",
      "description": "BRY Metodu, kendi yapını derinlemesine keşfetmeni, güçlü yönlerini ortaya çıkarmanı ve yaşamına bilinçle yön vermeni sağlayan içeriği itibarıyla İLK ve TEK yaşam metodudur.",
      "provider": { "@id": "https://www.bilincliritmikyasam.com/#organization" },
      "instructor": { "@type": "Person", "name": "Tuncay Vural" },
      "courseMode": "Online",
      "inLanguage": "tr-TR",
      "offers": {
        "@type": "Offer",
        "price": "8500",
        "priceCurrency": "TRY",
        "availability": "https://schema.org/InStock"
      }
    }
  ]
}
</script>
@endverbatim
@endsection

@section('content')

  {{-- HERO --}}
  <section class="page-hero" aria-labelledby="egitim-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <a href="{{ route('programs.online') }}">BRY Online Akademi</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">BRY Metodu Eğitimi</span>
      </nav>
      <h1 id="egitim-title">KENDİNİ TANI, RİTMİNİ BUL, <em>BİLİNÇLİ</em> YAŞA!</h1>
      <p class="lead">BRY Metodu, kendi yapını derinlemesine keşfetmeni, güçlü yönlerini ortaya çıkarmanı ve yaşamına bilinçle yön vermeni sağlayan içeriği itibarıyla İLK ve TEK yaşam metodudur.</p>
    </div>
  </section>

  {{-- VIDEO --}}
  <section class="video-band" aria-labelledby="video-title" style="padding: 50px 0;">
    <div class="container">
      <div class="video-frame" style="max-width: 1180px; background: #000;">
        <video
          controls
          preload="metadata"
          playsinline
          style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; border-radius: inherit; z-index: 4;"
          aria-label="BRY Metodu Eğitimi tanıtım videosu">
          <source src="{{ asset('assets/bry_egitim_methodu.mp4') }}" type="video/mp4">
          Tarayıcınız video etiketini desteklemiyor.
        </video>
      </div>

      <div class="video-band-head" style="margin: 28px auto 0;">
        <h2 id="video-title" style="font-size: clamp(24px, 3vw, 34px); margin-bottom: 10px;">Bilinçli Ritmik Yaşam (BRY) Metodu ile gerçek ve kalıcı bir <em>dönüşüm</em> mümkün.</h2>
        <p>4 haftalık bu eğitimle, kendini bütünsel olarak tanıyacak ve yaşamına bilinçli yön verebileceksin.</p>
      </div>

      <div style="text-align: center; margin-top: 22px;">
        <a href="#katil" class="btn btn-plum">BRY Eğitimine Katıl</a>
      </div>
    </div>
  </section>

  {{-- KENDİNİ TANI, YAŞAMINA YÖN VER --}}
  <section class="prose-section" aria-labelledby="yon-ver-title" style="padding: 50px 0;">
    <div class="container">
      <div class="prose" style="max-width: none; margin: 0;">
        <h2 id="yon-ver-title" style="font-size: clamp(26px, 2.6vw, 34px); margin-bottom: 9px;">Kendini Tanı, Yaşamına <em>Yön Ver</em></h2>
        <p style="margin-bottom: 2px; line-height: 1.5;">Bugüne kadar binlerce BRY üyesi, bu metodu öğrenerek yaşamlarında köklü değişimler gerçekleştirdi.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">Sen de kendini bütünsel olarak tanıyabilir, yaşamın karşına çıkardığı zorlukların üstesinden gelme becerisi kazanabilir ve amaçların doğrultusunda özgüvenli bir yaşam sürebilirsin.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">Tuncay Vural tarafından geliştirilen BRY Metodu, seni zihinsel, duygusal, karakter, kişilik ve diğer boyutlarınla tanıştırarak gerçek bir dönüşüm yolculuğuna çıkarır.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">BRY online eğitim programına katıldığında, kendini ilk kez derinlemesine tanımaya başlayacak ve bu tanımanın hayatına nasıl yön verdiğini deneyimleyeceksin.</p>
        <p style="margin: 14px 0 0; line-height: 1.5;"><strong>Eğer sen de:</strong></p>
        <ul style="list-style: none; padding: 0; margin: 6px 0 0; display: flex; flex-direction: column; gap: 4px;">
          <li style="display:flex; gap:12px; align-items:flex-start;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Yaşamına bilinçle yön vermek</span></li>
          <li style="display:flex; gap:12px; align-items:flex-start;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Düşüncelerini eyleme dönüştürmek</span></li>
          <li style="display:flex; gap:12px; align-items:flex-start;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Sürekli tekrarlayan olumsuz döngüleri aşmak istiyorsan,</span></li>
        </ul>
        <p style="margin: 14px 0 0; line-height: 1.5;">Şimdi BRY Metodu ile tanışmanın tam zamanı.</p>
      </div>
    </div>
  </section>

  {{-- EĞİTİM NASIL İLERLİYOR --}}
  <section class="prose-section alt" aria-labelledby="nasil-title" style="padding: 50px 0;">
    <div class="container">
      <div class="prose" style="max-width: none; margin: 0;">
        <h2 id="nasil-title" style="font-size: clamp(26px, 2.6vw, 34px); margin-bottom: 9px;">BRY Eğitimi Nasıl <em>İlerliyor?</em></h2>
        <p style="margin-bottom: 2px; line-height: 1.5;">BRY Eğitimi, zihnin doğal işleyişine uygun şekilde tasarlanmış ve 4 haftalık bir yapı üzerine kurulmuştur.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">Bu yapı sayesinde öğrendiğin bilgiler yüzeyde kalmaz; adım adım içselleşir ve günlük yaşamına doğal bir şekilde yerleşir.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">Eğitime dilediğin zaman başlayabilir, süreci kendi hızında ilerletebilirsin.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">Her hafta sunulan modüllerle, kendini zorlamadan ama istikrarlı bir şekilde ilerleyerek gelişimini sürdürebilirsin.</p>
        <p style="margin-bottom: 0; line-height: 1.5;">Eğitim süreci yalnızca bilgi sunmakla kalmaz; canlı yayın buluşmalarıyla öğrendiklerini pekiştirmeni ve aklına takılan konulara açıklık getirmeni sağlar.</p>
        <div style="margin-top: 18px;">
          <a href="#katil" class="btn btn-plum">BRY Eğitime Katıl</a>
        </div>
      </div>
    </div>
  </section>

  {{-- EĞİTİMDE SENİ NELER BEKLİYOR --}}
  <section aria-labelledby="bekleyenler-title" style="padding: 50px 0;">
    <div class="container">
      <div class="section-head">
        <h2 id="bekleyenler-title">BRY Eğitiminde Seni Neler <em>Bekliyor?</em></h2>
        <p>BRY Eğitiminde farkındalığını artıran içerikler ve seni adım adım destekleyen araçlar bir arada sunulur.</p>
      </div>

      <div class="benefits-grid">

        <article class="benefit">
          <span class="benefit-num" aria-hidden="true">i</span>
          <div class="benefit-icon" aria-hidden="true">▶</div>
          <h3>BRY Eğitim Serisi Videoları</h3>
          <p>Her modülde Tuncay Vural'ın anlatımıyla hazırlanan video içerikleriyle, BRY metodunu adım adım öğrenir ve kendi yapını fark ederek yaşamındaki birçok konuyu daha net ve bilinçli değerlendirmeye başlarsın.</p>
        </article>

        <article class="benefit">
          <span class="benefit-num" aria-hidden="true">ii</span>
          <div class="benefit-icon" aria-hidden="true">●</div>
          <h3>BRY Canlı Yayın Buluşmaları</h3>
          <p>6 ay boyunca her ay gerçekleştirilen canlı yayın buluşmalarında, öğrendiklerini pekiştirir ve aklına takılan sorulara doğrudan yanıt bulabilirsin. Bu süreç, bilgiyi uygulamaya dönüştürmeni destekler.</p>
        </article>

        <article class="benefit">
          <span class="benefit-num" aria-hidden="true">iii</span>
          <div class="benefit-icon" aria-hidden="true">↓</div>
          <h3>İndirilebilir Eğitim Materyalleri</h3>
          <p>Her derse eşlik eden indirilebilir PDF dosyalarıyla, konunun ana noktalarını daha net kavrayabilir ve öğrendiklerini kolayca tekrar ederek kalıcı hale getirebilirsin.</p>
        </article>

        <article class="benefit">
          <span class="benefit-num" aria-hidden="true">iv</span>
          <div class="benefit-icon" aria-hidden="true">✉</div>
          <h3>Süreci Destekleyen E-Postalar</h3>
          <p>Eğitim sürecinde ve sonrasında gönderilen haftalık e-postalarla, hem her modülde ilerlemeni destekleyen bilgileri alırsın hem de sürecini daha bilinçli şekilde sürdürebilirsin.</p>
        </article>

        <article class="benefit">
          <span class="benefit-num" aria-hidden="true">v</span>
          <div class="benefit-icon" aria-hidden="true">✓</div>
          <h3>Pekiştirme Testleri</h3>
          <p>Her modül sonunda yer alan testlerle, öğrendiklerini pekiştirir, gelişimini fark eder ve bilgiyi daha kalıcı hale getirebilirsin.</p>
        </article>

      </div>
    </div>
  </section>

  {{-- BRY METODUNUN FAYDALARI --}}
  <section class="alt" aria-labelledby="faydalar-title" style="padding: 50px 0;">
    <div class="container">
      <div class="section-head">
        <h2 id="faydalar-title">BRY Metodunun <em>Faydaları</em></h2>
      </div>

      <div class="contrib-grid">

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">✔</span>
            <h3>Kendini Tanıma</h3>
          </div>
          <ul>
            <li>İlk kez 9 boyutta bütünsel olarak insanı ve kendine özel karakterini, değerlerini, yeteneklerini tanımanı sağlar.</li>
          </ul>
        </article>

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">✔</span>
            <h3>Doğru Kararlar Alabilme</h3>
          </div>
          <ul>
            <li>Zihnini en doğru şekilde kullanabilmeni ve bunun neticesinde yaşamın her alanında doğru kararlar alabilme yetini güçlendirmeni sağlar.</li>
          </ul>
        </article>

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">✔</span>
            <h3>Yaşamsal Sorunları Çözebilme</h3>
          </div>
          <ul>
            <li>Karşılaştığın sorunlardan dolayı ortaya çıkan kaygı, yetersizlik, değersizlik gibi birçok yaşamsal sorunları ilk anda fark ederek çözebilmeni sağlar.</li>
          </ul>
        </article>

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">✔</span>
            <h3>Yaşam Yolunu Tespit Edebilme</h3>
          </div>
          <ul>
            <li>İsteklerine ve hedeflerine sağlıklı ve huzurlu bir şekilde ulaşmanın yollarını, bilinçli olarak tespit etmeni ve başarıyla yol alabilmeni sağlar.</li>
          </ul>
        </article>

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">✔</span>
            <h3>İletişim Yönetimi</h3>
          </div>
          <ul>
            <li>Kendinle ve çevrendeki kişilerle hoşgörülü iletişim kurabilmeni, düşüncelerini doğru ifade edebilmeni ve anlaşılabilmeni sağlar.</li>
          </ul>
        </article>

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">✔</span>
            <h3>Aktif Yaşam</h3>
          </div>
          <ul>
            <li>Yaşamın tüm alanlarında sahip olduğun özellikleri, bilinçli ve amaç odaklı yönetebilmeni ve aktif eylemlerde bulunabilmeni sağlar.</li>
          </ul>
        </article>

      </div>
    </div>
  </section>

  {{-- METODUN HİKAYESİ --}}
  <section class="prose-section" aria-labelledby="hikaye-title" style="padding: 50px 0;">
    <div class="container">
      <div class="prose hikaye-prose" style="text-align: center; max-width: 980px;">
        <h2 id="hikaye-title" style="font-size: clamp(26px, 2.6vw, 34px); margin-bottom: 9px;">BRY METODU, GERÇEK BİR YAŞAM <em>İHTİYACINDAN</em> DOĞDU.</h2>
        <p style="margin-bottom: 2px; line-height: 1.5;">Gerçek bir dönüşüm, rastgele fikirlerle değil; yaşanmış bir ihtiyaçla başlar. BRY Metodu da tam olarak böyle doğdu.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">Tuncay Vural'ın içsel arayışı, uzun yıllara yayılan araştırmaları ve binlerce kişiyle edindiği deneyimlerle geliştirdiği bu metot; bugün, yaşamında kalıcı bir denge ve anlam arayan insanlara yol gösteriyor.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">BRY Metodu, insanın kendini bütünsel olarak tanımasını sağlayan, içeriği itibarıyla ilk ve tek yaşam metodudur.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">Eğer siz de hayatınızda gerçek, kalıcı ve sürdürülebilir bir dönüşüm istiyorsanız, bu hikaye sizin için bir başlangıç olabilir.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">Hayatında yeni bir sayfa açmak, kendin için daha bilinçli ve dengeli bir yaşam kurmak istiyorsan…</p>
        <p style="margin-bottom: 0; line-height: 1.5;">BRY Metodu ile şimdi başlama zamanı.</p>
      </div>

      <div class="video-frame" style="max-width: 1180px; background: #000; margin: 40px auto 0;">
        <video
          controls
          preload="metadata"
          playsinline
          style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; border-radius: inherit; z-index: 4;"
          aria-label="BRY Metodu — Tuncay Vural anlatımı">
          <source src="{{ asset('assets/bry_methodu2.mp4') }}" type="video/mp4">
          Tarayıcınız video etiketini desteklemiyor.
        </video>
      </div>

      <div style="text-align: center; margin-top: 30px;">
        <a href="#katil" class="btn btn-plum">BRY Eğitimine Katıl</a>
      </div>
    </div>
  </section>

  {{-- DÖNÜŞEN HAYATLAR --}}
  <section class="alt" aria-labelledby="donusen-title" style="padding: 50px 0;">
    <div class="container">
      <div class="section-head section-head-center">
        <span class="eyebrow">BRY ile Dönüşen Hayatlar</span>
        <h2 id="donusen-title">BRY Metodu ile <em>Dönüşen</em> Hayatlar</h2>
        <p>Bilinçli Ritmik Yaşam (BRY) Metodu ile kendini daha yakından tanıyan, yaşamına farklı bir bakış açısı kazanan ve gerçek bir dönüşüm süreci deneyimleyen kişilerin paylaşımlarını burada bulabilirsiniz.</p>
        <p>Her anlatım, yaşanmış bir sürecin içten ve gerçek bir ifadesidir.</p>
        <p>Bu dönüşümü yaşayan diğer katılımcıların deneyimlerini aşağıda inceleyebilirsiniz.</p>
      </div>

      @if($homeTestimonials->isNotEmpty())
      <div class="reels-wrap" style="margin-top: 40px;">
        <div class="reels-row" role="list">
          @foreach($homeTestimonials as $t)
            @php
              $trigger = $t->videoTrigger();
              $poster  = $t->posterUrl();
            @endphp
            <button
              class="reel{{ in_array($t->color, ['plum', null], true) ? '' : ' ' . $t->color }}{{ $poster ? ' has-poster' : '' }}"
              role="listitem"
              aria-label="{{ $t->name }} videosunu izle"
              type="button"
              @if($poster) style="background-image: url('{{ $poster }}'); background-size: cover; background-position: center;" @endif
              @if($trigger && $trigger['type'] === 'youtube') data-video-id="{{ $trigger['value'] }}"
              @elseif($trigger && $trigger['type'] === 'file')   data-video-src="{{ $trigger['value'] }}" data-video-mime="{{ $trigger['mime'] }}" @if($poster) data-video-poster="{{ $poster }}" @endif
              @else disabled
              @endif
            >
              <div class="reel-ph" aria-hidden="true"></div>
              <div class="reel-shade" aria-hidden="true"></div>
              @if($t->tag)<span class="reel-tag">{{ $t->tag }}</span>@endif
              @if($t->duration)<span class="reel-duration">{{ $t->duration }}</span>@endif
              <span class="reel-play" aria-hidden="true"></span>
              <div class="reel-meta">
                <div class="name">{{ $t->name }}</div>
              </div>
            </button>
          @endforeach
        </div>
      </div>
      @endif

      <div style="text-align: center; margin-top: 36px;">
        <a href="{{ route('deneyimler.donusen') }}" class="btn btn-plum">Katılımcı Deneyimler ve Yorumları</a>
      </div>
    </div>
  </section>

  {{-- EĞİTİM İÇERİĞİ VE KATILIM --}}
  <section id="egitim-icerigi" aria-labelledby="icerik-title" style="padding: 50px 0; scroll-margin-top: 80px;">
    <div class="container">
      <div class="section-head section-head-center" style="margin-bottom: 36px;">
        <span class="eyebrow">BİLİNÇLİ RİTMİK YAŞAM (BRY)</span>
        <h2 id="icerik-title">Online Eğitim İçeriği ve <em>Katılım</em> Detayları</h2>
        <p>BRY Metodu, kendi yapını derinlemesine keşfetmeni, güçlü yönlerini ortaya çıkarmanı ve yaşamına bilinçle yön vermeni sağlayan; içeriği itibarıyla ilk ve tek yaşam metodudur.</p>
        <p>Bu online eğitim, seni sadece bilgiyle değil, gerçek bir dönüşümle buluşturur.</p>
        <p>Kendi değerlerini, güçlü yönlerini ve yaşamsal amaçlarını fark etmeni sağlayarak; sürdürülebilir bir gelişim yolculuğunda, yaşam boyu sana rehberlik eder.</p>
      </div>

      <div class="egitim-icerigi-grid">

        {{-- İÇERİK LİSTESİ --}}
        <div class="icerik-card">
          <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 22px;">
            <span style="font-family: var(--sans); font-size: 12px; letter-spacing: 0.18em; text-transform: uppercase; color: var(--gold-deep); font-weight: 600;">📘 EĞİTİM İÇERİĞİ</span>
          </div>

          <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 18px;">
            <li style="display: flex; gap: 14px; align-items: flex-start; border-bottom: 1px solid var(--line); padding-bottom: 18px;">
              <span style="color: var(--plum-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✓</span>
              <div>
                <strong style="display: block; color: var(--ink); margin-bottom: 4px;">BRY Metodu – 4 Haftalık 6 Modüllü Online Eğitim</strong>
                <span style="color: var(--ink-soft); font-size: 15px; line-height: 1.6;">Her modülde Tuncay Vural'ın anlatımıyla hazırlanmış video içerikleriyle, adım adım dönüşüm süreci.</span>
              </div>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start; border-bottom: 1px solid var(--line); padding-bottom: 18px;">
              <span style="color: var(--plum-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✓</span>
              <div>
                <strong style="display: block; color: var(--ink); margin-bottom: 4px;">BRY Canlı Yayın Buluşmaları</strong>
                <span style="color: var(--ink-soft); font-size: 15px; line-height: 1.6;">6 ay boyunca her ay düzenlenen interaktif yayınlarda, öğrendiklerini Tuncay Vural'la pekiştirme imkânı.</span>
              </div>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start; border-bottom: 1px solid var(--line); padding-bottom: 18px;">
              <span style="color: var(--plum-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✓</span>
              <div>
                <strong style="display: block; color: var(--ink); margin-bottom: 4px;">6 Ay Boyunca Sınırsız Erişim</strong>
                <span style="color: var(--ink-soft); font-size: 15px; line-height: 1.6;">Tüm video derslere ve BRY Akademi platformuna dilediğin zaman, istediğin kadar erişim.</span>
              </div>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start; border-bottom: 1px solid var(--line); padding-bottom: 18px;">
              <span style="color: var(--plum-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✓</span>
              <div>
                <strong style="display: block; color: var(--ink); margin-bottom: 4px;">Modül Sonlarında Pekiştirme Testleri</strong>
                <span style="color: var(--ink-soft); font-size: 15px; line-height: 1.6;">Her modülün sonunda bilgilerini değerlendirme ve öğrendiklerini kalıcı hâle getirme fırsatı.</span>
              </div>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start; border-bottom: 1px solid var(--line); padding-bottom: 18px;">
              <span style="color: var(--plum-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✓</span>
              <div>
                <strong style="display: block; color: var(--ink); margin-bottom: 4px;">E-Posta Bildirimleriyle Sürekli Destek</strong>
                <span style="color: var(--ink-soft); font-size: 15px; line-height: 1.6;">Eğitim süresince ve sonrasında Tuncay Vural'dan içerik desteği ve farkındalık artırıcı hatırlatmalar.</span>
              </div>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start;">
              <span style="color: var(--plum-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✓</span>
              <div>
                <strong style="display: block; color: var(--ink); margin-bottom: 4px;">Katılım Sertifikası</strong>
                <span style="color: var(--ink-soft); font-size: 15px; line-height: 1.6;">Eğitimi tamamlayan katılımcılara özel dijital sertifika.</span>
              </div>
            </li>
          </ul>

          <div style="margin-top: 32px; padding-top: 28px; border-top: 1px solid var(--line);">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 18px;">
              <span style="font-family: var(--sans); font-size: 12px; letter-spacing: 0.18em; text-transform: uppercase; color: var(--gold-deep); font-weight: 600;">🎁 EK DESTEKLER</span>
            </div>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 14px;">
              <li style="display: flex; gap: 14px; align-items: flex-start;">
                <span style="color: var(--gold-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✦</span>
                <div>
                  <strong style="display: block; color: var(--ink); margin-bottom: 2px;">Yaşam Karnesi Modülü</strong>
                  <span style="color: var(--ink-soft); font-size: 14.5px; line-height: 1.6;">Eğitime başlamadan önce, kendi yapını keşfetmeni sağlayan farkındalık aracı.</span>
                </div>
              </li>
              <li style="display: flex; gap: 14px; align-items: flex-start;">
                <span style="color: var(--gold-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✦</span>
                <div>
                  <strong style="display: block; color: var(--ink); margin-bottom: 2px;">7. Modül: BRY Destek Videoları</strong>
                  <span style="color: var(--ink-soft); font-size: 14.5px; line-height: 1.6;">BRY üyelerine özel hazırlanan ileri seviye faydalı içerikler.</span>
                </div>
              </li>
              <li style="display: flex; gap: 14px; align-items: flex-start;">
                <span style="color: var(--gold-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✦</span>
                <div>
                  <strong style="display: block; color: var(--ink); margin-bottom: 2px;">İndirilebilir Eğitim Materyalleri (PDF)</strong>
                  <span style="color: var(--ink-soft); font-size: 14.5px; line-height: 1.6;">Tüm modüllere eşlik eden PDF içeriklerini cihazına indirerek ömür boyu saklayabilir, ihtiyaç duyduğunda tekrar kullanabilirsin.</span>
                </div>
              </li>
            </ul>
          </div>
        </div>

        {{-- PRICING / KATILIM KARTI --}}
        <aside id="katil" class="pricing-aside">
          <h3 style="color: var(--cream); font-size: 20px; margin-bottom: 24px; line-height: 1.35;">BRY Metodu <em style="font-family: var(--serif); font-style: italic; color: var(--gold);">Eğitimine Katılım Bedeli</em></h3>

          <div style="margin-bottom: 26px;">
            <span style="font-family: var(--serif); font-style: italic; font-size: 56px; line-height: 1; color: var(--gold); letter-spacing: -0.02em;">8.500 ₺</span>
          </div>

          <p style="font-size: 13.5px; color: rgba(252,250,245,0.75); margin: 0 0 10px;">2 gün içinde koşulsuz iade hakkı</p>
          <p style="font-size: 13.5px; color: rgba(252,250,245,0.75); margin: 0 0 26px;">Tek seferlik ödeme • Anında erişim</p>

          <p style="font-size: 14.5px; color: rgba(252,250,245,0.92); margin: 0 0 6px;">Şimdi kendin için gerekeni yap.</p>
          <p style="font-size: 14.5px; color: rgba(252,250,245,0.92); margin: 0 0 24px;">BRY Metodu eğitimine bugün başlayabilirsin.</p>

          <a href="https://www.paytr.com/link/dZ5WagK" target="_blank" rel="noopener" class="btn-arrow" style="background: var(--gold); color: var(--ink); width: 100%; justify-content: center; padding: 16px 26px; font-size: 15px;">BRY Eğitimine Katıl</a>
        </aside>

      </div>
    </div>
  </section>

  {{-- FAQ --}}
  <section class="alt" aria-labelledby="faq-title" style="padding: 50px 0;">
    <div class="container">
      <div style="text-align: center; max-width: 760px; margin: 0 auto 40px;">
        <h2 id="faq-title">Merak <em>Ettiklerin</em></h2>
        <p style="color: var(--ink-soft); font-size: 16.5px; margin-top: 14px; line-height: 1.65;">BRY Metodu ile ilgili en çok merak edilen soruları senin için bir araya getirdik.</p>
      </div>

      <div class="faq-list" style="max-width: 1100px; margin: 0 auto;">

          <details class="faq">
            <summary>BRY Metodu Kimler İçin Uygundur?</summary>
            <div style="padding-top: 14px; color: var(--ink-soft); font-size: 15.5px; line-height: 1.6;">
              <p style="padding: 0; margin: 0 0 10px;">BRY Metodu, kendini tanımak, yaşamını anlamlandırmak ve hayatına bilinçle yön vermek isteyen herkes için uygundur.</p>
              <p style="padding: 0; margin: 0;">14 yaşından itibaren, konumu ya da yaşam deneyimi ne olursa olsun; kendi varlığını bütünsel olarak anlamak ve bu anlayışla yaşamını yeniden şekillendirmek isteyen herkes, BRY Metodunu öğrenebilir.</p>
            </div>
          </details>

          <details class="faq">
            <summary>BRY Metodu Eğitimine Kimler Katılabilir?</summary>
            <div style="padding-top: 14px; color: var(--ink-soft); font-size: 15.5px; line-height: 1.6;">
              <ul style="list-style: none; padding: 0; margin: 0 0 12px; display: flex; flex-direction: column; gap: 6px;">
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">•</span><span>Kendini tanımak ve yaşamını anlamlandırmak isteyen,</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">•</span><span>Ne yaparsa yapsın iç huzuru bir türlü yakalayamayan,</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">•</span><span>Hedeflerine ulaşmakta zorlanan ya da hangi hedefe yöneleceğini bilemeyen,</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">•</span><span>Sorunlarının farkında olan ama nasıl çözeceğini bilemeyen,</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">•</span><span>Adını koyamadığı bir iç sıkıntıyla yaşamını sürdüren,</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">•</span><span>Sahip olduğu yetenekleri tanıyıp geliştirmek isteyen,</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">•</span><span>Anlaşılmadığını düşünen ya da ilişkilerinde tekrar eden sorunlar yaşayan,</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">•</span><span>Zamanı daha etkili ve bilinçli kullanmak isteyen,</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">•</span><span>Kendine yatırım yaparak yaşamına yeni bir yön vermek isteyen,</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">•</span><span>Ve aynı zamanda eğitmen, yönetici ya da rehberlik eden bir pozisyonda olup; önce kendini ve insanı bütünsel tanıyarak daha sağlıklı yönlendirmeler yapmak isteyen</span></li>
              </ul>
              <p style="padding: 0; margin: 0 0 14px;">herkes, BRY Online Eğitimine katılabilir.</p>
              <div style="padding: 14px 16px; background: var(--plum-soft); border-radius: 10px; border-left: 3px solid var(--plum);">
                <p style="padding: 0; margin: 0 0 8px; color: var(--ink); font-weight: 600;">Not:</p>
                <p style="padding: 0; margin: 0 0 8px;">Bu sayfada sunulan BRY Eğitimi, 19 yaş üzeri yetişkinler içindir.</p>
                <p style="padding: 0; margin: 0;">Eğer 14–19 yaş aralığındaysan veya bu yaş grubundaki bir gencin ebeveyniyseniz, lütfen BRY Gençler Eğitimi hakkında bilgi almak için bizimle iletişime geçin.</p>
              </div>
            </div>
          </details>

          <details class="faq">
            <summary>Eğitim Online mı ve Ne Kadar Sürüyor?</summary>
            <div style="padding-top: 14px; color: var(--ink-soft); font-size: 15.5px; line-height: 1.6;">
              <p style="padding: 0; margin: 0 0 10px;">Evet, bu eğitim tamamen online olarak tasarlanmıştır ve 4 haftalık bir süreci kapsar.</p>
              <p style="padding: 0; margin: 0;">Satın alma işleminin ardından BRY Akademi platformuna giriş yaparak hemen eğitime erişebilir ve kendi zamanına uygun şekilde ilerleyebilirsin.</p>
            </div>
          </details>

          <details class="faq">
            <summary>Eğitime Ne Kadar Zaman Ayırmalısın?</summary>
            <div style="padding-top: 14px; color: var(--ink-soft); font-size: 15.5px; line-height: 1.6;">
              <p style="padding: 0; margin: 0 0 10px;">Haftada ortalama 45–50 dakika ayırarak BRY eğitim videolarını izleyebilir ve uygulamaları takip edebilirsin.</p>
              <p style="padding: 0; margin: 0 0 10px;">Eğitim, yoğun bir gündelik hayatın içinde bile sürdürülebilecek şekilde tasarlanmıştır.</p>
              <p style="padding: 0; margin: 0;">Ayrıca her ay Tuncay Vural rehberliğinde düzenlenen canlı yayınlara katılarak süreci daha derinlemesine deneyimleyebilirsin.</p>
            </div>
          </details>

          <details class="faq">
            <summary>Yaşamsal Sorunlar Ne Anlama Gelir?</summary>
            <div style="padding-top: 14px; color: var(--ink-soft); font-size: 15.5px; line-height: 1.6;">
              <p style="padding: 0; margin: 0 0 10px;">Yaşamsal sorunlar, bireyin yaşamındaki hedeflerine ve isteklerine ulaşma sürecinde karşılaştığı tüm içsel ve dışsal engelleri kapsar.</p>
              <p style="padding: 0; margin: 0 0 10px;">Özgüven eksikliği, kaygı, yetersizlik, değersizlik duyguları, karar verememe, ilişkilerde yaşanan zorlanmalar gibi durumlar birer yaşamsal sorundur.</p>
              <p style="padding: 0; margin: 0;">BRY Metodu, bu sorunların kaynağını fark etmeni ve onları derinlemesine çözmeni sağlar.</p>
            </div>
          </details>

          <details class="faq">
            <summary>BRY Metodu ile Hangi Sorunlara Çözüm Bulabilirsin?</summary>
            <div style="padding-top: 14px; color: var(--ink-soft); font-size: 15.5px; line-height: 1.6;">
              <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px;">
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Aile, arkadaşlık ve ilişkilerde yaşadığın iletişim problemlerini fark ederek, daha açık ve anlaşılır bir iletişim kurmayı öğrenebilirsin.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Duygularını kontrol edemediğini düşündüğün anlarda, onları bastırmak yerine tanımayı ve yönetmeyi öğrenebilirsin.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Kaynağını açıklayamadığın içsel huzursuzlukları anlamlandırarak, daha dengeli ve sakin bir iç dünya kurabilirsin.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Yetersizlik hissinin arkasındaki düşünce kalıplarını fark ederek, bu duyguyu daha sağlıklı yönetmeyi öğrenebilirsin.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Değersizlik duygusunu dönüştürerek, kendi değerini içsel olarak fark etmeye başlayabilirsin.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Özgüvensizlik yerine, kendini tanımanın getirdiği daha net bir öz saygı geliştirebilirsin.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Kararsız kaldığın ya da kararlarını sürekli ertelediğin durumlarda, zihinsel netlik kazanarak karar alma becerini güçlendirebilirsin.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Zamanı verimli kullanamama alışkanlığını fark ederek, önceliklerine uygun bir yaşam ritmi kurabilirsin.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Amaçsızlık ya da yönsüzlük hissi yaşıyorsan, içsel değerlerine uygun hedefler belirlemeyi öğrenebilirsin.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Başarısızlık korkusunu, gerçekçi hedeflerle ve içten gelen bir motivasyonla dönüştürerek daha özgür hareket edebilirsin.</span></li>
              </ul>
            </div>
          </details>

          <details class="faq">
            <summary>Katılımcılar BRY Metodu ile Hangi Sorunlara Çözüm Buldu?</summary>
            <div style="padding-top: 14px; color: var(--ink-soft); font-size: 15.5px; line-height: 1.6;">
              <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px;">
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Yetersizlik hissini sağlıklı bir şekilde yönetmeyi öğrendiler.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Değersizlik duygusunun yaşamlarına yön vermesini durdurdular.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Hafif depresif duygu durumlarını tanıyıp içsel denge kurmayı öğrendiler.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Kaygılarını daha sağlıklı bir şekilde yönetmeyi öğrendiler.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Tükenmişlik hissi yerine, kendilerine karşı yeniden şefkat geliştirdiler.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Özgüvenlerini tanımlayarak yeniden yapılandırdılar.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>Geçmişte takılı kalmadan bugüne ve geleceğe daha bilinçli bakmayı öğrendiler.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>İletişimde tekrar eden olumsuz döngüleri fark ederek daha sağlıklı iletişim kurmayı öğrendiler.</span></li>
                <li style="display:flex; gap:10px;"><span style="color: var(--plum-deep); font-weight: 700;">✔</span><span>İlişkilerinde kendilerini daha net ifade edebilmeye ve karşı tarafı daha doğru anlamaya başladılar.</span></li>
              </ul>
            </div>
          </details>

          <details class="faq">
            <summary>Şu Anda Belirgin Bir Sorunun Yoksa Yine de BRY Metodunu Öğrenmeli misin?</summary>
            <div style="padding-top: 14px; color: var(--ink-soft); font-size: 15.5px; line-height: 1.6;">
              <p style="padding: 0; margin: 0 0 10px;">Belirgin bir sorun yaşamıyor olmak harika.</p>
              <p style="padding: 0; margin: 0 0 10px;">Ancak yaşamda amaçların yolunda ilerlerken, küçük ya da büyük yaşamsal sorunlarla karşılaşma olasılığı son derece doğaldır.</p>
              <p style="padding: 0; margin: 0 0 10px;">BRY Metodu, böyle bir durumla karşılaşıldığında ne yapılması gerektiğini bilerek, bireyin kendi başına uygulayabileceği bir yöntem sunar.</p>
              <p style="padding: 0; margin: 0 0 10px;">Bunu önleyici tıp gibi düşünebilirsin:</p>
              <p style="padding: 0; margin: 0 0 10px;">Sorunları büyümeden fark etmek ve ilk anda çözüm odaklı düşünebilmek çok önemlidir.</p>
              <p style="padding: 0; margin: 0 0 10px;">BRY'de buna "koruyucu bütünsel farkındalık" denir.</p>
              <p style="padding: 0; margin: 0 0 10px;">Peki bu ne demek?</p>
              <p style="padding: 0; margin: 0;">Bireyin kendini bütünsel olarak tanıması, bu farkındalık sayesinde karşılaşabileceği sorunlar karşısında daha güçlü, çözüm odaklı ve dengeli bir iç duruş sergileyebilmesidir.</p>
            </div>
          </details>

          <details class="faq">
            <summary>BRY Metodu Sadece Sorunların Çözümü İçin mi?</summary>
            <div style="padding-top: 14px; color: var(--ink-soft); font-size: 15.5px; line-height: 1.6;">
              <p style="padding: 0; margin: 0 0 10px;"><strong>Kesinlikle hayır.</strong></p>
              <p style="padding: 0; margin: 0 0 10px;">BRY Metodu, yalnızca yaşamsal sorunların çözümünü hedeflemez. Aynı zamanda, amaçlarını ve hedeflerini netleştirmene; bu doğrultuda daha dengeli, huzurlu ve anlamlı bir yaşam inşa etmene destek olur.</p>
              <p style="padding: 0; margin: 0 0 10px;">Yaşamına bilinçle yön verebilmen için sana yaşam boyu rehberlik eder.</p>
              <p style="padding: 0; margin: 0 0 10px;">Bu metodu öğrenmek, sadece "sorunlara müdahale etmek" değil; aynı zamanda kendini geliştirmek, içsel gücünü fark etmek ve yaşam kaliteni bilinçli bir şekilde artırmak anlamına gelir.</p>
              <p style="padding: 0; margin: 0;">BRY'yi öğrenmek, adeta yeni bir dil öğrenmek gibidir: Kendine dair yeni bir anlayış, yeni bir ifade ve yeni bir yön kazanırsın.</p>
            </div>
          </details>

      </div>
    </div>
  </section>

  {{-- ÖN GÖRÜŞME CTA --}}

  {{-- STICKY BOTTOM CTA --}}
  <div class="sticky-cta" aria-label="BRY Metodu Eğitimi katılım">
    <div class="container sticky-cta-inner">
      <div class="sticky-cta-info">
        <span class="sticky-cta-title">BRY Metodu <em>Eğitimine Katılım Bedeli</em></span>
        <span class="sticky-cta-price">8.500 ₺</span>
        <span class="sticky-cta-spot" aria-live="polite">
          <span class="spot s1">Tek seferlik ödeme <span class="dot" aria-hidden="true">•</span> Anında erişim</span>
          <span class="spot s2">Şimdi kendin için gerekeni yap.</span>
          <span class="spot s3">BRY Metodu eğitimine bugün başlayabilirsin.</span>
          <span class="spot s4">2 gün içinde koşulsuz iade hakkı</span>
        </span>
      </div>
      <a href="https://www.paytr.com/link/dZ5WagK" target="_blank" rel="noopener" class="sticky-cta-btn">
        <span class="cta-label-full">BRY Eğitimine Katıl</span>
        <span class="cta-label-short">Satın Al</span>
        <span aria-hidden="true">→</span>
      </a>
    </div>
  </div>

  <style>
    /* ============ EĞİTİM İÇERİĞİ + PRICING GRID ============ */
    .egitim-icerigi-grid {
      display: grid;
      grid-template-columns: 1.4fr 1fr;
      gap: 36px;
      align-items: start;
      max-width: 1100px;
      margin: 0 auto;
    }
    .pricing-aside {
      background: linear-gradient(170deg, var(--ink) 0%, #1F2A24 100%);
      color: var(--cream);
      border-radius: var(--radius-lg);
      padding: 44px 38px;
      text-align: center;
      position: sticky;
      top: 100px;
      scroll-margin-top: 80px;
    }
    @media (max-width: 980px) {
      .egitim-icerigi-grid {
        grid-template-columns: 1fr;
        gap: 28px;
        max-width: 560px;
      }
      .pricing-aside {
        position: static;
        top: auto;
        padding: 36px 28px;
      }
    }
    @media (max-width: 600px) {
      .pricing-aside { padding: 32px 22px; }
      .pricing-aside h3 { font-size: 18px !important; }
    }

    /* İçerik listesi kartı */
    .icerik-card {
      background: var(--cream);
      border: 1px solid var(--line);
      border-radius: var(--radius-lg);
      padding: 40px 38px;
    }
    @media (max-width: 600px) {
      .icerik-card { padding: 28px 22px; }
    }

    .sticky-cta {
      position: fixed;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 60;
      background: linear-gradient(170deg, var(--ink) 0%, #1F2A24 100%);
      color: var(--cream);
      box-shadow: 0 -10px 30px -10px rgba(0,0,0,0.35);
      border-top: 1px solid rgba(252,250,245,0.08);
      padding: 14px 0;
      padding-bottom: calc(14px + env(safe-area-inset-bottom, 0px));
    }
    .sticky-cta-inner {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 24px;
    }
    .sticky-cta-info {
      display: flex;
      align-items: baseline;
      gap: 18px;
      flex-wrap: wrap;
      min-width: 0;
    }
    .sticky-cta-title {
      font-family: var(--sans);
      font-size: 14.5px;
      font-weight: 600;
      color: var(--cream);
      letter-spacing: -0.01em;
    }
    .sticky-cta-title em {
      font-family: var(--serif);
      font-style: italic;
      color: var(--gold);
      font-weight: 400;
    }
    .sticky-cta-price {
      font-family: var(--serif);
      font-style: italic;
      font-size: 28px;
      line-height: 1;
      color: var(--gold);
      letter-spacing: -0.02em;
    }
    .sticky-cta-sub {
      font-size: 12.5px;
      color: rgba(252,250,245,0.6);
      letter-spacing: 0.02em;
    }
    /* Kayan / değişen spot cümleler */
    .sticky-cta-spot {
      position: relative;
      display: inline-block;
      min-width: 280px;
      height: 18px;
      line-height: 18px;
      font-size: 13px;
      letter-spacing: 0.01em;
      color: rgba(252,250,245,0.78);
    }
    .sticky-cta-spot .spot {
      position: absolute;
      top: 0;
      left: 0;
      white-space: nowrap;
      opacity: 0;
      transform: translateY(6px);
      animation: spotCycle 14s cubic-bezier(.4,0,.2,1) infinite;
    }
    .sticky-cta-spot .spot .dot { color: var(--gold); margin: 0 6px; }
    .sticky-cta-spot .s1 { animation-delay: 0s; }
    .sticky-cta-spot .s2 { animation-delay: 3.5s; }
    .sticky-cta-spot .s3 { animation-delay: 7s; }
    .sticky-cta-spot .s4 { animation-delay: 10.5s; }
    @keyframes spotCycle {
      0%   { opacity: 0; transform: translateY(6px); }
      4%   { opacity: 1; transform: translateY(0); }
      21%  { opacity: 1; transform: translateY(0); }
      25%  { opacity: 0; transform: translateY(-6px); }
      100% { opacity: 0; transform: translateY(-6px); }
    }
    @media (prefers-reduced-motion: reduce) {
      .sticky-cta-spot .spot { animation: none; }
      .sticky-cta-spot .s1   { opacity: 1; transform: none; }
    }
    .sticky-cta-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--gold);
      color: var(--ink);
      font-family: var(--sans);
      font-weight: 600;
      font-size: 14.5px;
      padding: 14px 26px;
      border-radius: 999px;
      white-space: nowrap;
      transition: background .2s ease, transform .2s ease;
      flex-shrink: 0;
    }
    .sticky-cta-btn:hover { background: var(--cream); transform: translateY(-1px); }
    .sticky-cta-btn .cta-label-short { display: none; }

    /* main alt boşluk — sticky bar içeriği kapatmasın */
    body { padding-bottom: 88px; }

    @media (max-width: 720px) {
      .sticky-cta { padding: 10px 0; padding-bottom: calc(10px + env(safe-area-inset-bottom, 0px)); }
      .sticky-cta-inner { gap: 12px; flex-wrap: nowrap; }
      .sticky-cta-info {
        gap: 1px;
        flex-wrap: nowrap;
        flex-direction: column;
        align-items: flex-start;
        min-width: 0;
        flex: 1;
      }
      .sticky-cta-title { display: block; font-size: 12px; line-height: 1.2; }
      .sticky-cta-title em { font-size: 12px; }
      .sticky-cta-sub   { display: none; }
      .sticky-cta-spot  { display: none; }
      .sticky-cta-price { font-size: 22px; line-height: 1; }
      .sticky-cta-btn   { padding: 10px 16px; font-size: 13px; gap: 6px; }
      .sticky-cta-btn .cta-label-full  { display: none; }
      .sticky-cta-btn .cta-label-short { display: inline; }
      body { padding-bottom: 72px; }
    }

    /* WhatsApp float butonunu sticky CTA üzerine kaldır */
    .wa-float { bottom: 104px !important; }
    @media (max-width: 720px) { .wa-float { bottom: 84px !important; } }
  </style>

  @include('partials.contact-cta')
@endsection
