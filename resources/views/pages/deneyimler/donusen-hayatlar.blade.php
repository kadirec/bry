@extends('layouts.app')

@section('title', 'BRY ile Dönüşen Hayatlar — Katılımcı Deneyimleri ve Yorumları')
@section('description', 'Bilinçli Ritmik Yaşam Metodu ile yaşamına bilinçle yön veren katılımcıların dönüşüm hikayeleri, video deneyimleri ve yorumları.')
@section('keywords', 'bilinçli ritmik yaşam, bry metodu, tuncay vural, kendini tanımak, yaşam metodu, bilinçli yaşam, farkındalık, kendini keşfetmek, kişisel gelişim, doğru karar almak, koçluk')
@section('canonical', 'https://www.bilincliritmikyasam.com/bry-ile-donusen-hayatlar')
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
  <!-- PAGE HERO -->
  <section class="page-hero" aria-labelledby="donusen-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <span>Deneyimler</span>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">BRY ile Dönüşen Hayatlar</span>
      </nav>
      <span class="eyebrow">Deneyimler</span>
      <h1 id="donusen-title">Yolculuklarını <em>kendi sesleriyle</em> anlatıyorlar.</h1>
      <p class="lead">Bilinçli Ritmik Yaşam Metodu ile hayatı yeniden şekillenen katılımcıların kısa video hikayeleri. Her birinin yolculuğu farklı, dönüşümü kendine özel.</p>
    </div>
  </section>

  <!-- HİKAYELER -->
  <section style="padding: 30px 0 90px;">
    <div class="container">
      <div class="reels-wrap">
        <div class="reels-row" role="list">
          @foreach($items as $t)
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
    </div>
  </section>

  @include('partials.contact-cta')
@endsection
