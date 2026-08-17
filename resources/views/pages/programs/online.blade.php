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
@php
  $academyItems = \App\Models\AcademyCourse::active()->ordered()->get();
  $courses = $academyItems->where('type', \App\Models\AcademyCourse::TYPE_COURSE);
  $lives   = $academyItems->where('type', \App\Models\AcademyCourse::TYPE_LIVE);
@endphp
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
        @foreach($courses as $c)
          <article class="course-card{{ $c->badge === 'soon' ? ' is-soon' : '' }}">
            <div class="visual">
              @if($c->imageUrl())
                <img src="{{ $c->imageUrl() }}" alt="{{ $c->title_note ? strip_tags($c->titleHtml()) . ' — ' . $c->title_note : strip_tags($c->titleHtml()) }}" class="cover">
              @endif
              @if($c->show_seal)
                <span class="seal-first" aria-label="Dünyada İlk">
                  <span class="seal-ring" aria-hidden="true">BİLİNÇLİ RİTMİK YAŞAM · BRY METODU · </span>
                  <span class="seal-core">
                    <em>Dünyada</em>
                    <strong>İlk!</strong>
                  </span>
                </span>
              @endif
              @if($c->badge === 'live')
                <span class="badge badge-live"><span class="dot" aria-hidden="true"></span>Yayında</span>
              @elseif($c->badge === 'soon')
                <span class="badge">Yakında</span>
              @endif
            </div>
            <div class="body">
              <h3>{!! $c->titleHtml() !!}@if($c->title_note) <span style="font-size: 14px; color: var(--ink-mute); font-style: normal; font-family: var(--sans); letter-spacing: 0.04em; vertical-align: middle;">— {{ $c->title_note }}</span>@endif</h3>
              @foreach($c->paragraphs() as $p)
                <p>{{ $p }}</p>
              @endforeach
              @if($c->link_url)
                <a href="{{ $c->link_url }}" class="btn-arrow">{{ $c->link_label ?: 'Eğitimi İncele' }}</a>
              @elseif($c->link_label)
                <a href="#" class="btn-arrow" style="opacity: .6; pointer-events: none;">{{ $c->link_label }}</a>
              @endif
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  <!-- CANLI YAYIN EĞİTİMLER -->
  @if($lives->isNotEmpty())
  <section class="live-section" aria-labelledby="live-title">
    <div class="container">
      <div class="section-head" style="margin-bottom: 0;">
        <span class="eyebrow" style="display:inline-flex; align-items:center; gap:8px;"><span style="width:7px;height:7px;border-radius:50%;background:#C1121F;box-shadow:0 0 0 4px rgba(193,18,31,0.18);display:inline-block;"></span> Canlı Yayın</span>
        <h2 id="live-title">Canlı Yayın <em>Eğitimler</em></h2>
        <p style="color: var(--ink-soft); font-size: 17px; max-width: 720px; margin-top: 14px;">Belirli aralıkla düzenlenen canlı yayın eğitimlerinde, farklı yaşamsal konular BRY metodunun bilgileriyle ele alınır.</p>
      </div>

      <div class="live-grid">
        @foreach($lives as $l)
          <article class="live-card">
            @if($l->imageUrl())
              <div class="visual">
                <img src="{{ $l->imageUrl() }}" alt="{{ strip_tags($l->titleHtml()) }} afişi" class="cover" loading="lazy">
              </div>
            @endif
            <div class="body">
              <span class="live-tag"><span class="dot" aria-hidden="true"></span>Canlı Yayın</span>
              @if($l->quote)
                <p class="quote">{!! $l->quoteHtml() !!}</p>
              @endif
              @foreach($l->paragraphs() as $p)
                <p>{{ $p }}</p>
              @endforeach
              @if($l->link_url)
                <a href="{{ $l->link_url }}" class="btn-arrow">{{ $l->link_label ?: 'Detaylar' }} →</a>
              @elseif($l->link_label)
                <a href="#" class="btn-arrow" style="opacity: .6; pointer-events: none;">{{ $l->link_label }} →</a>
              @endif
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  @include('partials.contact-cta')
@endsection
