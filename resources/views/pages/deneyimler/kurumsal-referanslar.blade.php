@extends('layouts.app')

@section('title', 'Kurumsal Referanslar — BRY Metodu\'nun Kurumsal Yolculukları')
@section('description', 'Bilinçli Ritmik Yaşam Metodu\'nu kurumlarına entegre eden iş ortaklarımız ve birlikte yürüttüğümüz uygulamalı eğitim süreçleri.')
@section('keywords', 'bilinçli ritmik yaşam, bry metodu, tuncay vural, kendini tanımak, yaşam metodu, bilinçli yaşam, farkındalık, kendini keşfetmek, kişisel gelişim, doğru karar almak, koçluk')
@section('canonical', 'https://www.bilincliritmikyasam.com/kurumsal-referanslar')
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

@php
  $references = \App\Models\Reference::active()->orderBy('sort')->orderBy('id')->get();
@endphp

@section('content')
<!-- PAGE HERO -->
  <section class="page-hero" aria-labelledby="ref-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <a href="#">Deneyimler</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">Kurumsal Referanslar</span>
      </nav>
      <span class="eyebrow">Deneyimler</span>
      <h1 id="ref-title">Kurumsal Yolculuklarımızda Bize Eşlik Eden <em>Kurumlar</em></h1>
      <p class="lead">Bilinçli Ritmik Yaşam Metodu'nu kurumlarına entegre ederek ekipleriyle birlikte daha uyumlu ve verimli ilerleyen iş ortaklarımızdan bazılarını aşağıda görebilirsiniz.</p>
      <p class="lead">Her çalışma, kurumun kendi ihtiyaçlarına özel planlanmış uygulamalı eğitim süreçlerinden oluşur.</p>
    </div>
  </section>

  <!-- LOGO GRID -->
  <section aria-labelledby="logo-title" style="padding-top: 30px; padding-bottom: 30px;">
    <div class="container">
      <h2 id="logo-title" style="position:absolute;left:-9999px;">Kurumsal referanslar</h2>
      <div class="logo-grid">
        @forelse($references as $ref)
          @if($ref->website)
            <a class="logo-cell" href="{{ $ref->website }}" target="_blank" rel="noopener" title="{{ $ref->name }}">
              <img src="{{ $ref->imageUrl() }}" alt="{{ $ref->name }}" loading="lazy">
            </a>
          @else
            <div class="logo-cell" title="{{ $ref->name }}">
              <img src="{{ $ref->imageUrl() }}" alt="{{ $ref->name }}" loading="lazy">
            </div>
          @endif
        @empty
          <div class="logo-cell"><span>Henüz referans eklenmedi</span></div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- STATS BAND -->
  <section class="stats-band" aria-labelledby="stats-title">
    <div class="container">
      <div class="section-head" style="margin-bottom: 50px;">
        <span class="eyebrow">Rakamlarla</span>
        <h2 id="stats-title">22 Yıllık <em>Birikim</em></h2>
      </div>
      <div class="stats-row">
        <div class="stat">
          <span class="num">22<span style="color: var(--ink-mute); font-size: 0.5em;">+</span></span>
          <span class="lbl">Yıllık Deneyim</span>
        </div>
        <div class="stat">
          <span class="num">20<span style="color: var(--ink-mute); font-size: 0.5em;">+</span></span>
          <span class="lbl">Kurumsal Ortak</span>
        </div>
        <div class="stat">
          <span class="num">1000<span style="color: var(--ink-mute); font-size: 0.5em;">+</span></span>
          <span class="lbl">Eğitim Saati</span>
        </div>
        <div class="stat">
          <span class="num">5000<span style="color: var(--ink-mute); font-size: 0.5em;">+</span></span>
          <span class="lbl">Katılımcı</span>
        </div>
      </div>
    </div>
  </section>

  <!-- TEMSILI ALINTI -->
  <section style="padding: 90px 0;">
    <div class="container">
      <div class="section-head" style="margin-bottom: 50px;">
        <span class="eyebrow">Kurumsal Geri Bildirim</span>
        <h2>İş Ortaklarımızdan <em>Yansımalar</em></h2>
      </div>
      <div class="quote-grid">
        <article class="quote-card">
          <span class="qmark" aria-hidden="true">"</span>
          <p>Ekibimizle aldığımız BRY Kurumsal Eğitim, sadece iş süreçlerimizi değil; birbirimizi anlama biçimimizi de değiştirdi. Verim ve uyum aynı anda arttı.</p>
          <div class="author"><strong>İK Yöneticisi</strong> · Kurumsal Ortak</div>
        </article>
        <article class="quote-card">
          <span class="qmark" aria-hidden="true">"</span>
          <p>Bireysel farkındalık ile başlayan süreç, ekip dinamiklerine yansıdığında etkisi katlanarak büyüdü. Bizim için sürdürülebilir bir kültür dönüşümü oldu.</p>
          <div class="author"><strong>Genel Müdür</strong> · Kurumsal Ortak</div>
        </article>
        <article class="quote-card">
          <span class="qmark" aria-hidden="true">"</span>
          <p>Tuncay Vural'ın programı, jenerik motivasyon değil; gerçek bir yöntem. Çalışanlarımızın hem iş hem özel yaşam dengesinde fark net görünüyor.</p>
          <div class="author"><strong>Operasyon Direktörü</strong> · Kurumsal Ortak</div>
        </article>
      </div>
    </div>
  </section>

  @include('partials.contact-cta')
@endsection
