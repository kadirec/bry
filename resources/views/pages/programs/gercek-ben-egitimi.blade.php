@extends('layouts.app')

@section('title', 'BRY Gerçek Ben Eğitimi — Kendini Tanı, Zihnini Yönet ve Özgüvenle Yaşa | Tuncay Vural')
@section('description', 'Gerçek Ben Eğitimi ile kişiliğini, karakter değerlerini tanıyarak geliştirebilir; zihnini amaçların doğrultusunda etkili kullanabilir, özgüvenle yaşayabilirsin.')
@section('keywords', 'gerçek ben eğitimi, bry metodu, tuncay vural, kendini tanımak, karakter değerleri, kişilik gelişimi, özgüven, zihinsel farkındalık, online eğitim')
@section('canonical', 'https://www.bilincliritmikyasam.com/gercek-ben-egitimi')
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
      "name": "BRY Metodu ile Gerçek Ben Eğitimi",
      "description": "Kişiliğini, karakter değerlerini tanıyarak geliştirebilir; iç çatışmalardan ve istem dışı düşüncelerden özgürleşerek, zihnini amaçların ve isteklerin doğrultusunda etkili bir şekilde kullanabilir, özgüvenle yaşayabilirsin.",
      "provider": { "@id": "https://www.bilincliritmikyasam.com/#organization" },
      "instructor": { "@type": "Person", "name": "Tuncay Vural" },
      "courseMode": "Online",
      "inLanguage": "tr-TR",
      "offers": {
        "@type": "Offer",
        "price": "1800",
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
        <span aria-current="page">Gerçek Ben Eğitimi</span>
      </nav>
      <h1 id="egitim-title">"GERÇEK SEN" İLE TANIŞMAYA <em>VAR MISIN?</em></h1>
      <p class="lead">Kişiliğini, kendi karakter değerlerini tanıyarak geliştirebilir; iç çatışmalardan ve istem dışı düşüncelerden özgürleşerek, zihnini amaçların ve isteklerin doğrultusunda etkili bir şekilde kullanabilir, özgüvenle yaşayabilirsin.</p>
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
          aria-label="Gerçek Ben Eğitimi tanıtım videosu">
          <source src="{{ asset('assets/gercek_ben_egitim_detay.mp4') }}" type="video/mp4">
          Tarayıcınız video etiketini desteklemiyor.
        </video>
      </div>

      <div style="text-align: center; margin-top: 22px;">
        <a href="#katil" class="btn btn-plum">Gerçek Sen'le Tanış</a>
      </div>
    </div>
  </section>

  {{-- INTRO --}}
  <section class="prose-section" aria-labelledby="intro-title" style="padding: 50px 0;">
    <div class="container">
      <div class="prose" style="max-width: none; margin: 0;">
        <h2 id="intro-title" style="font-size: clamp(26px, 2.6vw, 34px); margin-bottom: 9px;">Kendini <em>Tanımak</em></h2>
        <p style="margin-bottom: 2px; line-height: 1.5;">Kendini tanımak; nasıl düşündüğünü, hangi değerlere göre yaşadığını ve kişiliğini neye göre şekillendirdiğini fark etmektir.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;"><strong>Gerçek Ben eğitimi</strong>, zihnini daha etkili kullanmanı, karakter değerlerini keşfetmeni ve kişiliğini bu değerlere göre geliştirebilmeni sağlar.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">Ayrıca, değiştirmek istediğin yönleri dönüştürmen için sana gerekli farkındalığı kazandırır.</p>
        <p style="margin-bottom: 0; line-height: 1.5;">Eğer sen de bu keşfe hazırsan, bugün ilk adımı atabilirsin.</p>
        <div style="margin-top: 18px;">
          <a href="#katil" class="btn btn-plum">Gerçek Sen'le Tanış</a>
        </div>
      </div>
    </div>
  </section>

  {{-- EĞİTİMDE SENİ NELER BEKLİYOR --}}
  <section class="alt" aria-labelledby="bekleyenler-title" style="padding: 50px 0;">
    <div class="container">
      <div class="section-head">
        <h2 id="bekleyenler-title">Gerçek Ben Eğitiminde Seni Neler <em>Bekliyor?</em></h2>
      </div>

      <div class="benefits-grid">

        <article class="benefit">
          <span class="benefit-num" aria-hidden="true">i</span>
          <div class="benefit-icon" aria-hidden="true">✦</div>
          <h3>Gerçek Ben Nedir?</h3>
          <p>Kendinle ilgili fark etmediğin yönlerini tanıyacak, gerçek değerlerini ise "Evet, ben buyum" diyerek içtenlikle tespit edebileceksin.</p>
        </article>

        <article class="benefit">
          <span class="benefit-num" aria-hidden="true">ii</span>
          <div class="benefit-icon" aria-hidden="true">↗</div>
          <h3>Gerçek Ben Olmak İçin Ne Yapmalı?</h3>
          <p>Kendinle bağlantı kurmak ve içsel yolculuğunu başlatmak için hangi adımları atman gerektiğini göreceksin.</p>
        </article>

        <article class="benefit">
          <span class="benefit-num" aria-hidden="true">iii</span>
          <div class="benefit-icon" aria-hidden="true">◉</div>
          <h3>Zihnin Nasıl Çalışıyor?</h3>
          <p>Zihnin çalışma sistemini ve zihnini etkili olarak yaşam boyu nasıl kullanabileceğini öğreneceksin.</p>
        </article>

        <article class="benefit">
          <span class="benefit-num" aria-hidden="true">iv</span>
          <div class="benefit-icon" aria-hidden="true">◆</div>
          <h3>Karakter Değerleri ve Kişilik</h3>
          <p>Kişiliğinin şekillenmesinde hangi değerlerin etkili olduğunu anlayacaksın.</p>
        </article>

        <article class="benefit">
          <span class="benefit-num" aria-hidden="true">v</span>
          <div class="benefit-icon" aria-hidden="true">▲</div>
          <h3>Karakter Değerlerine Uyumlu Kişilik Gelişimi</h3>
          <p>Sana ait olan değerlere göre kişiliğini nasıl geliştirebileceğini öğreneceksin.</p>
        </article>

        <article class="benefit">
          <span class="benefit-num" aria-hidden="true">vi</span>
          <div class="benefit-icon" aria-hidden="true">✓</div>
          <h3>Gerçek Ben Olarak Yaşam</h3>
          <p>Kendinle uyumlu bir yaşam kurmanın ne anlama geldiğini ve bunu hayatına nasıl katabileceğini öğreneceksin.</p>
        </article>

      </div>
    </div>
  </section>

  {{-- BU EĞİTİMİ TAMAMLADIĞINDA --}}
  <section aria-labelledby="tamamladiginda-title" style="padding: 50px 0;">
    <div class="container">
      <div class="section-head">
        <h2 id="tamamladiginda-title">Bu Eğitimi <em>Tamamladığında;</em></h2>
      </div>

      <div class="contrib-grid">

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">✔</span>
            <h3>Kendini Tanımaya Başlayacaksın</h3>
          </div>
          <ul>
            <li>Kendini gerçek anlamda tanımaya başlayacaksın.</li>
          </ul>
        </article>

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">✔</span>
            <h3>Zihnini Etkili Kullanacaksın</h3>
          </div>
          <ul>
            <li>Zihnini nasıl daha etkili kullanabileceğini keşfedeceksin.</li>
          </ul>
        </article>

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">✔</span>
            <h3>Karakter Değerlerini Fark Edeceksin</h3>
          </div>
          <ul>
            <li>Karakter değerlerini fark edecek ve bunların yaşamına nasıl yön verdiğini anlayacaksın.</li>
          </ul>
        </article>

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">✔</span>
            <h3>Kişiliğini Geliştireceksin</h3>
          </div>
          <ul>
            <li>Kişiliğini, sana ait karakter değerlerine göre nasıl geliştirebileceğini öğreneceksin.</li>
          </ul>
        </article>

        <article class="contrib" style="grid-column: 1 / -1;">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">✔</span>
            <h3>Kendi Yolunu Çizeceksin</h3>
          </div>
          <ul>
            <li>Ve en önemlisi: Artık kim olduğunu bilerek, kendi yolunu daha net çizebileceksin.</li>
          </ul>
        </article>

      </div>
    </div>
  </section>

  {{-- ÖZ DEĞERLERİ TANIMAYINCA --}}
  <section class="prose-section alt" aria-labelledby="ozdeger-title" style="padding: 50px 0;">
    <div class="container">
      <div class="prose hikaye-prose" style="text-align: center; max-width: 980px;">
        <h2 id="ozdeger-title" style="font-size: clamp(26px, 2.6vw, 34px); margin-bottom: 9px;">Peki, insan öz değerlerini gerçek anlamda <em>tanımayınca neler yaşar?</em></h2>
        <p style="margin-bottom: 2px; line-height: 1.5;">Kendini tanımayan bir insan, çoğu zaman içten içe bir arayış halindedir.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">Onaylanma beklentisi, özgüven eksikliği, değersizlik ya da yetersizlik hissi, günlük yaşamında sıkça kendini gösterir.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">Adını koyamadığı huzursuzluklar yaşar; duygularını ifade edemez, "hayır" diyemez ve istemediği yönlere savrulur.</p>
        <p style="margin-bottom: 2px; line-height: 1.5;">Defalarca yeni başlangıçlar yapar ama bir türlü aradığı içsel huzura ulaşamaz.</p>
        <p style="margin-bottom: 0; line-height: 1.5;"><strong>Oysa kendi öz değerlerini gerçekten tanımak, bu kısır döngüden çıkmanın en temel yoludur.</strong></p>

        <div style="margin-top: 30px; padding: 28px 32px; background: var(--plum-soft); border: 1px solid var(--plum); border-radius: var(--radius-lg); max-width: 760px; margin-left: auto; margin-right: auto;">
          <p style="margin-bottom: 8px; line-height: 1.5; color: var(--plum-deep); font-weight: 600;">Artık bu farkındalıkla kendi yolunu seçebilirsin.</p>
          <p style="margin-bottom: 0; line-height: 1.5; color: var(--ink);">Gerçek Ben Eğitimine şimdi katılarak, kendinle gerçek bir tanışmanın ilk adımını atabilirsin.</p>
        </div>

        <div style="margin-top: 30px;">
          <a href="#katil" class="btn btn-plum">Gerçek Sen'le Tanış</a>
        </div>
      </div>
    </div>
  </section>

  {{-- EĞİTİM İÇERİĞİ VE KATILIM --}}
  <section id="egitim-icerigi" aria-labelledby="icerik-title" style="padding: 50px 0; scroll-margin-top: 80px;">
    <div class="container">
      <div class="section-head section-head-center" style="margin-bottom: 36px;">
        <span class="eyebrow">GERÇEK BEN</span>
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
                <span style="color: var(--ink-soft); font-size: 15px; line-height: 1.6;">Her dersin sonunda indirebileceğin özel eğitim materyalleri seni bekliyor.</span>
              </div>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start; border-bottom: 1px solid var(--line); padding-bottom: 18px;">
              <span style="color: var(--plum-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✓</span>
              <div>
                <span style="color: var(--ink-soft); font-size: 15px; line-height: 1.6;">Eğitim; dört temel video ile, zihinsel farkındalık, karakter değerleri ve kişilik gelişim sürecini bütünsel bir yaklaşımla ele alır. Her video, kısa ama derin içerikler sunarak seni özünle buluşturur.</span>
              </div>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start; border-bottom: 1px solid var(--line); padding-bottom: 18px;">
              <span style="color: var(--plum-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✓</span>
              <div>
                <span style="color: var(--ink-soft); font-size: 15px; line-height: 1.6;">Tüm video içeriklerine ve materyallere 3 ay boyunca sınırsız erişim hakkın olacak.</span>
              </div>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start; border-bottom: 1px solid var(--line); padding-bottom: 18px;">
              <span style="color: var(--plum-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✓</span>
              <div>
                <span style="color: var(--ink-soft); font-size: 15px; line-height: 1.6;">Süreç boyunca sana özel destek e-postaları ve bilgileri pekiştirecek mini testlerle ilerlemen desteklenecek.</span>
              </div>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start; border-bottom: 1px solid var(--line); padding-bottom: 18px;">
              <span style="color: var(--plum-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✓</span>
              <div>
                <span style="color: var(--ink-soft); font-size: 15px; line-height: 1.6;">Eğitim sonunda dijital sertifika alacaksın.</span>
              </div>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start;">
              <span style="color: var(--plum-deep); font-weight: 700; font-size: 18px; line-height: 1.3;">✓</span>
              <div>
                <span style="color: var(--ink-soft); font-size: 15px; line-height: 1.6;">Ayrıca, eğitim modülünün hemen ardından birebir yapılacak <strong style="color: var(--ink);">Gerçek Ben Pekiştirme Seansı</strong>, ilerlemeni gözlemlemeni ve eğitimin etkisini pekiştirmeni amaçlar.</span>
              </div>
            </li>
          </ul>
        </div>

        {{-- PRICING / KATILIM KARTI --}}
        <aside id="katil" class="pricing-aside">
          <h3 style="color: var(--cream); font-size: 20px; margin-bottom: 24px; line-height: 1.35;">Gerçek Ben <em style="font-family: var(--serif); font-style: italic; color: var(--gold);">Eğitimine Katılım Bedeli</em></h3>

          <div style="margin-bottom: 26px;">
            <span style="font-family: var(--serif); font-style: italic; font-size: 56px; line-height: 1; color: var(--gold); letter-spacing: -0.02em;">1.800 ₺</span>
          </div>

          <p style="font-size: 14.5px; color: rgba(252,250,245,0.92); margin: 0 0 24px;">Eğitime katılmak için hazırsan, şimdi başlayabilirsin.</p>

          <a href="#" target="_blank" rel="noopener" class="btn-arrow" style="background: var(--gold); color: var(--ink); width: 100%; justify-content: center; padding: 16px 26px; font-size: 15px;">Gerçek Sen'le Tanış</a>
        </aside>

      </div>
    </div>
  </section>

  {{-- DENEYİMLER VE YORUMLAR + DEĞERLENDİR FORMU --}}
  <section class="alt" id="degerlendir" aria-labelledby="deneyim-title" style="padding: 50px 0; scroll-margin-top: 80px;">
    <div class="container">
      <div class="section-head section-head-center">
        <h2 id="deneyim-title">Gerçek Ben'le Tanışanların <em>Deneyimleri ve Yorumları</em></h2>
        <p>Bu dönüşümü yaşayan diğer katılımcıların deneyimlerini aşağıda inceleyebilirsiniz.</p>
      </div>

      @if($productReviews->isNotEmpty())
        @php
          $availableSlugs = $productReviews->pluck('product_slug')->unique();
          $productLabels  = \App\Models\ProductReview::PRODUCTS;
          $defaultSlug    = $availableSlugs->contains('gercek-ben-egitimi') ? 'gercek-ben-egitimi' : 'all';
        @endphp

        <div class="review-filter" role="tablist" aria-label="Yorum kategori filtresi" data-review-filter>
          <button type="button"
                  class="review-chip {{ $defaultSlug === 'all' ? 'is-active' : '' }}"
                  role="tab"
                  aria-selected="{{ $defaultSlug === 'all' ? 'true' : 'false' }}"
                  data-filter="all">Tümü</button>

          @if($availableSlugs->contains('gercek-ben-egitimi'))
            <button type="button"
                    class="review-chip is-active"
                    role="tab"
                    aria-selected="true"
                    data-filter="gercek-ben-egitimi">{{ $productLabels['gercek-ben-egitimi'] }}</button>
          @endif

          @foreach($productLabels as $slug => $label)
            @if($slug !== 'gercek-ben-egitimi' && $availableSlugs->contains($slug))
              <button type="button"
                      class="review-chip"
                      role="tab"
                      aria-selected="false"
                      data-filter="{{ $slug }}">{{ $label }}</button>
            @endif
          @endforeach
        </div>

        <div class="reviews-wrap" data-reviews-carousel>
          <button type="button" class="reviews-arrow reviews-arrow--prev" aria-label="Önceki yorumlar" data-dir="-1">
            <svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 6 9 12 15 18"></polyline></svg>
          </button>

          <div class="reviews-row" role="list">
            @foreach($productReviews as $review)
              @php
                $initial = mb_strtoupper(mb_substr(trim($review->name), 0, 1));
              @endphp
              <article class="review-card" role="listitem" data-product="{{ $review->product_slug }}" @if($defaultSlug !== 'all' && $review->product_slug !== $defaultSlug) hidden @endif>
                <div class="review-card-quote">
                  <svg class="review-qmark" viewBox="0 0 32 32" aria-hidden="true">
                    <path fill="currentColor" d="M9 6c-3 0-5 2.4-5 5.6 0 3 2 5.4 4.6 5.4-.6 2.4-2.5 4-4.6 4.4v2.6c5 0 9-3.6 9-9.4V11.6C13 8.4 11 6 9 6zm14 0c-3 0-5 2.4-5 5.6 0 3 2 5.4 4.6 5.4-.6 2.4-2.5 4-4.6 4.4v2.6c5 0 9-3.6 9-9.4V11.6C27 8.4 25 6 23 6z"/>
                  </svg>
                  <p>{{ $review->message }}</p>
                </div>
                <div class="review-card-foot">
                  <span class="review-avatar" aria-hidden="true">{{ $initial }}</span>
                  <div class="review-author">
                    <strong>{{ $review->name }}</strong>
                    <span>{{ $review->productLabel() }}</span>
                  </div>
                </div>
              </article>
            @endforeach
          </div>

          <button type="button" class="reviews-arrow reviews-arrow--next" aria-label="Sonraki yorumlar" data-dir="1">
            <svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 6 15 12 9 18"></polyline></svg>
          </button>
        </div>
      @else
        <div style="text-align: center; padding: 40px 0; color: var(--ink-mute);">
          <p>İlk değerlendirmeyi yapacak sen ol — formu doldur, yayına alınınca burada görünecek.</p>
        </div>
      @endif

      {{-- DEĞERLENDİR — Modal Tetik --}}
      <div style="text-align: center; margin-top: 40px;">
        <button type="button" class="btn btn-plum" data-review-modal-open>
          ✎ Sen de Değerlendir
        </button>
        @if(session('review_status'))
          <p style="margin-top: 14px; color: #1F5A2C; font-size: 14.5px; font-weight: 500;">✓ {{ session('review_status') }}</p>
        @endif
      </div>
    </div>

    {{-- DEĞERLENDİR — Modal --}}
    <div class="review-modal" data-review-modal {{ ($errors->any() || session('review_status')) ? 'data-open' : '' }} aria-hidden="true">
      <div class="review-modal-backdrop" data-review-modal-close></div>
      <div class="review-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="review-modal-title">
        <button type="button" class="review-modal-close" data-review-modal-close aria-label="Kapat">
          <svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>

        <div class="section-head section-head-center" style="margin-bottom: 24px;">
          <h3 id="review-modal-title" style="font-size: clamp(22px, 2.4vw, 28px);">Sen de <em>Değerlendir</em></h3>
          <p>Bizimle ilgili deneyimini paylaş. Mesajın admin onayından sonra yayınlanır.</p>
        </div>

        @if(session('review_status'))
          <div class="review-flash" role="status">
            ✓ {{ session('review_status') }}
          </div>
        @endif

        <form method="POST" action="{{ route('product-reviews.store') }}" class="review-form" novalidate>
          @csrf

          <div class="rf-field">
            <label for="rf-product">Kategori</label>
            <select id="rf-product" name="product_slug" required>
              <option value="" {{ old('product_slug') ? '' : 'selected' }} disabled>Seçiniz</option>
              @foreach(\App\Models\ProductReview::PRODUCTS as $slug => $label)
                <option value="{{ $slug }}" {{ old('product_slug') === $slug ? 'selected' : '' }}>{{ $label }}</option>
              @endforeach
            </select>
            @error('product_slug') <small class="rf-error">{{ $message }}</small> @enderror
          </div>

          <div class="rf-field">
            <label for="rf-name">Ad Soyad</label>
            <input id="rf-name" type="text" name="name" value="{{ old('name') }}" maxlength="120" required>
            @error('name') <small class="rf-error">{{ $message }}</small> @enderror
          </div>

          <div class="rf-field">
            <label for="rf-message">Mesajınız</label>
            <textarea id="rf-message" name="message" rows="5" maxlength="2000" required>{{ old('message') }}</textarea>
            @error('message') <small class="rf-error">{{ $message }}</small> @enderror
          </div>

          <div class="rf-row">
            <div class="rf-field">
              <label for="rf-captcha">Güvenlik Sorusu — <strong>{{ $captchaQuestion }}</strong></label>
              <input id="rf-captcha" type="text" name="captcha" autocomplete="off" inputmode="numeric" maxlength="3" required>
              @error('captcha') <small class="rf-error">{{ $message }}</small> @enderror
            </div>
            <div class="rf-field rf-kvkk-cell">
              <label class="rf-kvkk-label" for="rf-kvkk">
                <input id="rf-kvkk" type="checkbox" name="kvkk" value="1" {{ old('kvkk') ? 'checked' : '' }} required>
                <span><a href="#kisisel-verilerin-korunmasi" target="_blank">KVKK aydınlatma metnini</a> okudum, kabul ediyorum.</span>
              </label>
              @error('kvkk') <small class="rf-error">{{ $message }}</small> @enderror
            </div>
          </div>

          <div class="rf-actions">
            <button type="submit" class="btn btn-plum">Gönder</button>
          </div>
        </form>
      </div>
    </div>

    <style>
      /* ============ DEĞERLENDİRME FİLTRE TAB'LARI ============ */
      .review-filter {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: center;
        margin-top: 30px;
      }
      .review-chip {
        appearance: none;
        border: 1px solid var(--line);
        background: var(--bg);
        color: var(--ink-soft);
        font-family: var(--sans);
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.02em;
        padding: 8px 16px;
        border-radius: 999px;
        cursor: pointer;
        transition: background .15s ease, color .15s ease, border-color .15s ease;
      }
      .review-chip:hover { background: var(--cream); color: var(--ink); }
      .review-chip.is-active {
        background: var(--ink);
        border-color: var(--ink);
        color: #fff;
      }

      /* ============ DEĞERLENDİRMELER CAROUSEL ============ */
      .reviews-wrap {
        position: relative;
        margin-top: 18px;
        padding: 0 56px;
      }
      .reviews-row {
        display: flex;
        gap: 22px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        padding: 6px 4px 18px;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: thin;
        scrollbar-color: var(--line) transparent;
      }
      .reviews-row::-webkit-scrollbar { height: 8px; }
      .reviews-row::-webkit-scrollbar-track { background: transparent; }
      .reviews-row::-webkit-scrollbar-thumb { background: var(--line); border-radius: 999px; }

      .review-card[hidden] { display: none !important; }
      .review-card {
        flex: 0 0 440px;
        scroll-snap-align: start;
        background: var(--cream);
        border: 1px solid var(--line);
        border-radius: var(--radius-lg);
        padding: 32px 30px 26px;
        display: flex;
        flex-direction: column;
        gap: 22px;
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        position: relative;
      }
      .review-card:hover {
        transform: translateY(-4px);
        border-color: var(--plum);
        box-shadow: 0 28px 60px -32px rgba(31,42,36,0.28);
      }
      .review-card-quote {
        position: relative;
        padding-left: 8px;
      }
      .review-qmark {
        width: 36px;
        height: 36px;
        color: var(--plum);
        opacity: .22;
        margin-bottom: 6px;
        display: block;
      }
      .review-card-quote p {
        font-family: var(--sans);
        font-style: normal;
        font-size: 16px;
        line-height: 1.7;
        color: var(--ink);
        margin: 0;
        display: -webkit-box;
        -webkit-line-clamp: 7;
        -webkit-box-orient: vertical;
        overflow: hidden;
      }
      .review-card-foot {
        display: flex;
        align-items: center;
        gap: 14px;
        padding-top: 18px;
        border-top: 1px solid var(--line);
        margin-top: auto;
      }
      .review-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--plum) 0%, var(--plum-deep) 100%);
        color: #fff;
        font-family: var(--sans);
        font-weight: 600;
        font-size: 17px;
        display: grid;
        place-items: center;
        flex-shrink: 0;
        letter-spacing: 0.02em;
      }
      .review-author {
        display: flex;
        flex-direction: column;
        gap: 2px;
        min-width: 0;
      }
      .review-author strong {
        font-family: var(--sans);
        font-size: 15px;
        font-weight: 600;
        color: var(--ink);
        letter-spacing: -0.01em;
        line-height: 1.2;
      }
      .review-author span {
        font-size: 12px;
        color: var(--ink-mute);
        letter-spacing: 0.04em;
      }

      /* Arrow buttons */
      .reviews-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 5;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 1px solid var(--line);
        background: var(--cream);
        color: var(--ink);
        cursor: pointer;
        display: grid;
        place-items: center;
        transition: background .2s ease, transform .2s ease, border-color .2s ease, opacity .2s ease;
        box-shadow: 0 10px 24px -16px rgba(31,42,36,0.35);
      }
      .reviews-arrow:hover { background: var(--plum); color: #fff; border-color: var(--plum); }
      .reviews-arrow:disabled { opacity: .35; cursor: default; }
      .reviews-arrow:disabled:hover { background: var(--cream); color: var(--ink); border-color: var(--line); }
      .reviews-arrow svg { width: 20px; height: 20px; display: block; }
      .reviews-arrow--prev { left: 0; }
      .reviews-arrow--next { right: 0; }

      @media (max-width: 720px) {
        .reviews-wrap { padding: 0; }
        .reviews-arrow { display: none; }
        .review-card { flex-basis: 84vw; padding: 28px 24px 24px; }
        .review-card-quote p { font-size: 16px; }
      }

      /* ============ DEĞERLENDİR MODAL ============ */
      .review-modal {
        position: fixed;
        inset: 0;
        z-index: 100;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
      }
      .review-modal[data-open] {
        display: flex;
        animation: rmFade .25s ease;
      }
      .review-modal-backdrop {
        position: absolute;
        inset: 0;
        background: rgba(15, 18, 22, 0.6);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        cursor: pointer;
      }
      .review-modal-dialog {
        position: relative;
        background: var(--cream);
        border: 1px solid var(--line);
        border-radius: var(--radius-lg);
        padding: 44px 42px 36px;
        width: 100%;
        max-width: 640px;
        max-height: calc(100vh - 40px);
        overflow-y: auto;
        box-shadow: 0 30px 80px -20px rgba(15,18,22,0.45);
        animation: rmSlideUp .3s cubic-bezier(.16,.84,.44,1);
      }
      .review-modal-close {
        position: absolute;
        top: 16px;
        right: 16px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 1px solid var(--line);
        background: transparent;
        color: var(--ink-soft);
        cursor: pointer;
        display: grid;
        place-items: center;
        transition: background .2s ease, color .2s ease, border-color .2s ease;
        z-index: 2;
      }
      .review-modal-close:hover { background: var(--ink); color: #fff; border-color: var(--ink); }
      .review-modal-close svg { width: 18px; height: 18px; display: block; }
      @media (max-width: 640px) {
        .review-modal { padding: 0; }
        .review-modal-dialog {
          padding: 50px 22px 28px;
          max-height: 100vh;
          border-radius: 0;
          max-width: 100%;
        }
      }
      @keyframes rmFade  { from { opacity: 0; } to { opacity: 1; } }
      @keyframes rmSlideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
      body.review-modal-open { overflow: hidden; }

      .review-flash {
        background: #E7F4EA;
        color: #1F5A2C;
        padding: 12px 16px;
        border-radius: 10px;
        margin-bottom: 22px;
        font-size: 14.5px;
        font-weight: 500;
      }
      .review-form .rf-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 16px;
      }
      @media (max-width: 640px) {
        .review-form .rf-row { grid-template-columns: 1fr; }
      }
      .review-form .rf-field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px; }
      .review-form .rf-field:last-child { margin-bottom: 0; }
      .review-form label {
        font-family: var(--sans);
        font-size: 13px;
        font-weight: 600;
        color: var(--ink);
        letter-spacing: 0.02em;
      }
      .review-form label strong {
        font-family: var(--serif);
        font-style: italic;
        font-weight: 500;
        color: var(--plum-deep);
      }
      .review-form input[type="text"],
      .review-form input[type="tel"],
      .review-form select,
      .review-form textarea {
        font-family: var(--sans);
        font-size: 15px;
        padding: 12px 14px;
        border: 1px solid var(--line);
        border-radius: 10px;
        background: var(--bg);
        color: var(--ink);
        transition: border-color .15s ease, background .15s ease;
        width: 100%;
      }
      .review-form input:focus,
      .review-form textarea:focus {
        outline: none;
        border-color: var(--plum);
        background: #fff;
      }
      .review-form textarea { resize: vertical; min-height: 110px; }
      .review-form .rf-kvkk-cell { justify-content: flex-end; }
      .review-form .rf-kvkk-label {
        display: flex;
        gap: 10px;
        align-items: flex-start;
        font-weight: 400;
        font-size: 13px;
        color: var(--ink-soft);
        line-height: 1.5;
        cursor: pointer;
      }
      .review-form .rf-kvkk-label a { color: var(--plum-deep); text-decoration: underline; }
      .review-form .rf-kvkk-label input { margin-top: 2px; flex-shrink: 0; }
      .review-form .rf-error {
        color: #C1121F;
        font-size: 12.5px;
        font-weight: 500;
        margin-top: 2px;
      }
      .review-form .rf-actions {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
      }
      @media (max-width: 640px) {
        .review-form .rf-actions { justify-content: stretch; }
        .review-form .rf-actions .btn { width: 100%; }
      }
    </style>
  </section>


  {{-- STICKY BOTTOM CTA --}}
  <div class="sticky-cta" aria-label="Gerçek Ben Eğitimi katılım">
    <div class="container sticky-cta-inner">
      <div class="sticky-cta-info">
        <span class="sticky-cta-title">Gerçek Ben <em>Eğitimine Katılım Bedeli</em></span>
        <span class="sticky-cta-price">1.800 ₺</span>
        <span class="sticky-cta-spot" aria-live="polite">
          <span class="spot s1">Eğitime katılmak için hazırsan, şimdi başlayabilirsin.</span>
          <span class="spot s2">3 ay boyunca sınırsız erişim.</span>
          <span class="spot s3">Eğitim sonunda dijital sertifika.</span>
          <span class="spot s4">Birebir Gerçek Ben Pekiştirme Seansı.</span>
        </span>
      </div>
      <a href="#" target="_blank" rel="noopener" class="sticky-cta-btn">
        <span class="cta-label-full">Gerçek Sen'le Tanış</span>
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

@push('scripts')
<script>
  // ============ REVIEWS CAROUSEL ============
  (function () {
    const wrap = document.querySelector('[data-reviews-carousel]');
    if (!wrap) return;

    const row  = wrap.querySelector('.reviews-row');
    const prev = wrap.querySelector('.reviews-arrow--prev');
    const next = wrap.querySelector('.reviews-arrow--next');

    function step() {
      const card = row.querySelector('.review-card:not([hidden])');
      if (!card) return 360;
      return card.getBoundingClientRect().width + 22;
    }
    function updateArrows() {
      const max = row.scrollWidth - row.clientWidth - 2;
      prev.disabled = row.scrollLeft <= 0;
      next.disabled = row.scrollLeft >= max;
    }
    prev.addEventListener('click', () => row.scrollBy({ left: -step(), behavior: 'smooth' }));
    next.addEventListener('click', () => row.scrollBy({ left:  step(), behavior: 'smooth' }));
    row.addEventListener('scroll', updateArrows, { passive: true });
    window.addEventListener('resize', updateArrows);
    updateArrows();

    // ===== Kategori filtresi =====
    const filter = document.querySelector('[data-review-filter]');
    if (!filter) return;
    const chips = filter.querySelectorAll('.review-chip');
    const cards = row.querySelectorAll('.review-card');

    chips.forEach(chip => {
      chip.addEventListener('click', () => {
        const target = chip.getAttribute('data-filter');
        chips.forEach(c => {
          const active = c === chip;
          c.classList.toggle('is-active', active);
          c.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        cards.forEach(card => {
          const slug = card.getAttribute('data-product');
          card.hidden = !(target === 'all' || slug === target);
        });
        row.scrollLeft = 0;
        updateArrows();
      });
    });
  })();

  // ============ REVIEW MODAL ============
  (function () {
    const modal = document.querySelector('[data-review-modal]');
    if (!modal) return;

    const openBtns  = document.querySelectorAll('[data-review-modal-open]');
    const closeEls  = modal.querySelectorAll('[data-review-modal-close]');
    const dialog    = modal.querySelector('.review-modal-dialog');
    let lastFocused = null;

    function open() {
      lastFocused = document.activeElement;
      modal.setAttribute('data-open', '');
      modal.setAttribute('aria-hidden', 'false');
      document.body.classList.add('review-modal-open');
      const firstField = dialog.querySelector('input[type="text"], input[type="tel"], textarea');
      if (firstField) setTimeout(() => firstField.focus(), 50);
    }
    function close() {
      modal.removeAttribute('data-open');
      modal.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('review-modal-open');
      if (lastFocused) lastFocused.focus();
    }

    openBtns.forEach(b => b.addEventListener('click', open));
    closeEls.forEach(c => c.addEventListener('click', close));
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && modal.hasAttribute('data-open')) close();
    });

    // Sayfa modal açık geldiyse (validation errors / success) body scroll'u kilitle
    if (modal.hasAttribute('data-open')) {
      document.body.classList.add('review-modal-open');
      modal.setAttribute('aria-hidden', 'false');
    }
  })();
</script>
@endpush
