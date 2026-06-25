@extends('layouts.app')

@section('title', 'Kurumsal Etkinlikler — BRY Kurumsal Eğitim ve Seminer Fotoğrafları')
@section('description', 'BRY Metodu\'nun kurum içi eğitim ve seminerlerinden kareler. Ekip içi uyumun ve verimliliğin güçlendiği gerçek uygulama süreçleri.')
@section('keywords', 'bilinçli ritmik yaşam, bry metodu, tuncay vural, kendini tanımak, yaşam metodu, bilinçli yaşam, farkındalık, kendini keşfetmek, kişisel gelişim, doğru karar almak, koçluk')
@section('canonical', 'https://www.bilincliritmikyasam.com/kurumsal-etkinlikler')
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
  $kurumsalGallery = \App\Models\KurumsalPhoto::active()->orderBy('sort')->orderBy('id')->get();
@endphp

@section('content')
<!-- PAGE HERO -->
  <section class="page-hero" aria-labelledby="kurumsal-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <a href="#">Deneyimler</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">Kurumsal Etkinlikler</span>
      </nav>
      <span class="eyebrow">Deneyimler</span>
      <h1 id="kurumsal-title">BRY Kurumsal Eğitim <em>Fotoğrafları</em></h1>
      <p class="lead">Bilinçli Ritmik Yaşam Metodu'nun kurum içi eğitim ve seminerlerinden kareleri aşağıda görebilirsiniz.</p>
      <p class="lead">Her bir çalışma; çalışanların kendi potansiyellerini fark ettikleri, ekip içi uyumun ve verimliliğin güçlendiği gerçek uygulama süreçlerini yansıtır.</p>
    </div>
  </section>

  <!-- GALLERY -->
  <section aria-labelledby="kurumsal-galeri" style="padding-top: 30px; padding-bottom: 90px;">
    <div class="container">
      <h2 id="kurumsal-galeri" class="visually-hidden" style="position:absolute;left:-9999px;">Kurumsal eğitim fotoğrafları</h2>

      @if($kurumsalGallery->isEmpty())
        <p style="text-align: center; color: var(--ink-mute); padding: 60px 0;">Henüz fotoğraf eklenmedi.</p>
      @else
        <div class="photo-grid" id="photo-grid">
          @foreach($kurumsalGallery as $i => $p)
            <a href="{{ $p->imageUrl() }}"
               class="photo-cell"
               data-lightbox="kurumsal"
               data-index="{{ $i }}"
               aria-label="{{ $p->caption ?: 'Fotoğraf #' . ($i + 1) }}">
              <img src="{{ $p->imageUrl() }}" alt="{{ $p->caption ?: 'Kurumsal etkinlik fotoğrafı ' . ($i + 1) }}" loading="lazy">
              @if($p->caption)
                <span class="photo-cap">{{ $p->caption }}</span>
              @endif
            </a>
          @endforeach
        </div>

        <p class="gallery-note" style="margin-top: 22px;">Fotoğrafa tıklayarak <kbd>büyüt</kbd> · Klavye ile gez: <kbd>←</kbd> <kbd>→</kbd> · <kbd>Esc</kbd></p>

        {{-- Lightbox modal --}}
        <div class="photo-lightbox" id="photo-lightbox" hidden role="dialog" aria-modal="true" aria-label="Fotoğraf görüntüleyici">
          <button type="button" class="pl-close" data-pl-close aria-label="Kapat">×</button>
          <button type="button" class="pl-nav pl-prev" data-pl-prev aria-label="Önceki">‹</button>
          <button type="button" class="pl-nav pl-next" data-pl-next aria-label="Sonraki">›</button>
          <figure class="pl-figure">
            <img class="pl-img" src="" alt="">
            <figcaption class="pl-caption"></figcaption>
            <div class="pl-counter"></div>
          </figure>
        </div>
      @endif
    </div>
  </section>

  @include('partials.contact-cta')
@endsection
