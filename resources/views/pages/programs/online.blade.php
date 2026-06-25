@extends('layouts.app')

@section('title', 'BRY Online Akademi — Bilinçli Ritmik Yaşam Eğitimi')
@section('description', 'BRY Online Akademi\'de kendi hızında ilerle. Yetişkinler için BRY Metodu Eğitimi, Gerçek Ben Eğitimi ve düzenli canlı yayın eğitimleri.')
@section('keywords', 'bilinçli ritmik yaşam, bry metodu, tuncay vural, kendini tanımak, yaşam metodu, bilinçli yaşam, farkındalık, kendini keşfetmek, kişisel gelişim, doğru karar almak, koçluk')
@section('canonical', 'https://www.bilincliritmikyasam.com/bry-online-akademi')
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
      ],
      "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "customer support",
        "availableLanguage": ["Turkish"]
      }
    },
    {
      "@type": "Person",
      "@id": "https://www.bilincliritmikyasam.com/#tuncay-vural",
      "name": "Tuncay Vural",
      "jobTitle": "BRY Metodu Kurucusu, Yaşam Koçu",
      "worksFor": { "@id": "https://www.bilincliritmikyasam.com/#organization" },
      "image": "https://www.bilincliritmikyasam.com/assets/tuncay-portrait.jpg"
    },
    {
      "@type": "WebSite",
      "url": "https://www.bilincliritmikyasam.com/",
      "name": "Bilinçli Ritmik Yaşam",
      "publisher": { "@id": "https://www.bilincliritmikyasam.com/#organization" },
      "inLanguage": "tr-TR"
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        { "@type": "Question", "name": "BRY Metodu nedir?",
          "acceptedAnswer": { "@type": "Answer", "text": "Bilinçli Ritmik Yaşam (BRY) Metodu, insanı zihinsel, duygusal ve ruhsal boyutlarıyla bir bütün olarak ele alan, içeriği itibarıyla ilk ve tek yaşam metodudur." } },
        { "@type": "Question", "name": "BRY Metodunu kimler tercih eder?",
          "acceptedAnswer": { "@type": "Answer", "text": "Kendini bütünsel olarak tanımak, güçlü yönlerini keşfetmek ve yaşamını daha bilinçli yönlendirmek isteyen herkes için uygundur." } },
        { "@type": "Question", "name": "Eğitim programları neleri kapsıyor?",
          "acceptedAnswer": { "@type": "Answer", "text": "Bireysel ve özel programlar, BRY Online Akademi ve kurumsal programlar olmak üzere üç ana başlık altında sunulmaktadır." } },
        { "@type": "Question", "name": "Tuncay Vural kimdir?",
          "acceptedAnswer": { "@type": "Answer", "text": "BRY Metodu’nun kurucusu olup 22 yılı aşkın süredir 30.000’in üzerinde insana iyi bir yaşam sürmeleri için rehberlik etmektedir." } }
      ]
    }
  ]
}
</script>
@endverbatim
@endsection

@section('content')
<!-- HERO -->
  <section class="page-hero" aria-labelledby="online-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <a href="#">Eğitimler</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">BRY Online Akademi</span>
      </nav>
      <span class="eyebrow">Eğitimler</span>
      <h1 id="online-title">BRY <em>Online</em> Akademi</h1>
      <p class="lead">BRY Online Akademi'de herkesin erişebileceği, kendi hızında ilerleyebileceği kapsamlı bir eğitim süreci sunulmaktadır.
      Akademide yer alan videolu eğitimler ile BRY metodunu adım adım öğrenebilir ve yaşamına uygulayabilirsin.</p>
    </div>
  </section>

  <!-- COURSE GRID -->
  <section aria-labelledby="courses-title" style="padding-top: 40px; padding-bottom: 30px;">
    <div class="container">
      <div class="section-head" style="margin-bottom: 50px;"> 
        <h2 id="courses-title">Akademide Yer Alan <em>Eğitimler</em></h2>
      </div>

      <div class="course-grid">

        <!-- 1: BRY Metodu Eğitimi (Yetişkinler) -->
        <article class="course-card">
          <div class="visual">
            <span class="seal-first" aria-label="Dünyada İlk">
              <span class="seal-ring" aria-hidden="true">BİLİNÇLİ RİTMİK YAŞAM · BRY METODU · </span>
              <span class="seal-core">
                <em>Dünyada</em>
                <strong>İlk!</strong>
              </span>
            </span>
            <span class="badge badge-live"><span class="dot" aria-hidden="true"></span>Yayında</span>
          </div>
          <div class="body">
            <h3>BRY Metodu <em>Eğitimi</em> <span style="font-size: 14px; color: var(--ink-mute); font-style: normal; font-family: var(--sans); letter-spacing: 0.04em; vertical-align: middle;">— Yetişkinler</span></h3>
            <p>BRY Eğitimi, kendini bütünsel olarak tanımanı ve bu bilgiyi yaşamına adım adım uygulamanı sağlayan 4 haftalık sistemli bir eğitim sürecidir.</p>
            <p>Kendi hızında ilerleyebilir, öğrendiklerini günlük yaşamına adım adım entegre edebilirsin.</p>
            <p>Canlı yayınlarla süreci pekiştirerek aklındaki sorulara netlik kazandırabilirsin.</p>
            <a href="{{ route('programs.methodu-egitimi') }}" class="btn-arrow">Eğitimi İncele</a>
          </div>
        </article>

        <!-- 2: Gerçek Ben Eğitimi -->
        <article class="course-card">
          <div class="visual">
            <span class="badge badge-live"><span class="dot" aria-hidden="true"></span>Yayında</span>
          </div>
          <div class="body">
            <h3>BRY Metodu ile <em>Gerçek Ben</em> Eğitimi</h3>
            <p>Çevrendeki kişilerin etkisinden sıyrılarak, öz değerlerini fark etmeni, anlamanı ve hayatına katabilmeni sağlayan bir eğitimdir.</p>
            <p>Bu eğitimde zihninin nasıl işlediğini fark eder, seni sen yapan karakter değerlerini tanır ve kişiliğini bu değerlere göre, "gerçek sen" olarak yeniden şekillendirmeyi öğrenirsin.</p>
            <p>Eğitim sonunda, sana özel karakter değerlerini ve zihinsel işleyişini tanımış olacak; böylece yaşam amaçların doğrultusunda zihnini daha etkili kullanmayı öğrenmiş olacaksın. Gerçek Ben Eğitimi, kısa sürede yüksek farkındalık kazandıran, etkili ve verimliliği yüksek bir eğitimdir.</p>
            <a href="{{ route('programs.gercek-ben') }}" class="btn-arrow">Eğitimi İncele</a>
          </div>
        </article>

        <!-- 3: BRY Metodu Eğitimi (Gençler) -->
        <article class="course-card is-soon">
          <div class="visual">
            <span class="badge">Yakında</span>
          </div>
          <div class="body">
            <h3>BRY Metodu <em>Eğitimi</em> <span style="font-size: 14px; color: var(--ink-mute); font-style: normal; font-family: var(--sans); letter-spacing: 0.04em; vertical-align: middle;">— Gençler</span></h3>
            <p>Genç bireylerin kendini tanıma, karakter gelişimi ve yaşam yönünü daha bilinçli belirleyebilmesi için hazırlanan bu eğitim, yakında erişime açılacaktır.</p>
            <a href="#" class="btn-arrow" style="opacity: .6; pointer-events: none;">Yakında Erişime Açılacak</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- CANLI YAYIN EĞİTİMLER -->
  <section class="live-section" aria-labelledby="live-title">
    <div class="container">
      <div class="section-head" style="margin-bottom: 0;">
        <span class="eyebrow" style="display:inline-flex; align-items:center; gap:8px;"><span style="width:7px;height:7px;border-radius:50%;background:#C1121F;box-shadow:0 0 0 4px rgba(193,18,31,0.18);display:inline-block;"></span> Canlı Yayın</span>
        <h2 id="live-title">Canlı Yayın <em>Eğitimler</em></h2>
        <p style="color: var(--ink-soft); font-size: 17px; max-width: 720px; margin-top: 14px;">Belirli aralıkla düzenlenen canlı yayın eğitimlerinde, farklı yaşamsal konular BRY metodunun bilgileriyle ele alınır.</p>
      </div>

      <div class="live-grid">

        <article class="live-card">
          <div class="visual">
            <span class="live-tag"><span class="dot" aria-hidden="true"></span>Canlı Yayın</span>
          </div>
          <div class="body">
            <p class="quote">Ertelemek, karakter özelliğin <em>değil</em>; yönetebileceğin bir alışkanlıktır.</p>
            <p>BRY Metodu ile bu alışkanlığın nedenlerini fark edecek, nasıl kontrol altına alabileceğini öğreneceksin.</p>
            <a href="#" class="btn-arrow">Detaylar →</a>
          </div>
        </article>

        <article class="live-card">
          <div class="visual">
            <span class="live-tag"><span class="dot" aria-hidden="true"></span>Canlı Yayın</span>
          </div>
          <div class="body">
            <p class="quote">Özgüven eksikliği bir karakter özelliği <em>değil</em>; edinilmiş bir durumdur.</p>
            <p>Bu eğitimde, özgüveninin neden azaldığını fark edecek ve nasıl güçlendireceğini öğreneceksin.</p>
            <a href="#" class="btn-arrow">Detaylar →</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  @include('partials.contact-cta')
@endsection
