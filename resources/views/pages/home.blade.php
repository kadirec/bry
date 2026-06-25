@extends('layouts.app')

@section('title', 'Bilinçli Ritmik Yaşam (BRY) Metodu | Tuncay Vural — Kendini Tanı, Bilinçle Yaşa (v2)')
@section('description', 'BRY Metodu, insanı zihinsel, duygusal ve ruhsal boyutlarıyla bütünsel ele alan ilk ve tek yaşam metodudur. 22 yıldır 30.000+ kişiye rehberlik eden Tuncay Vural ile kendini tanı, ritmini bul, bilinçli yaşa.')
@section('keywords', 'bilinçli ritmik yaşam, bry metodu, tuncay vural, kendini tanımak, yaşam metodu, bilinçli yaşam, farkındalık, kendini keşfetmek, kişisel gelişim, doğru karar almak, koçluk')
@section('canonical', 'https://www.bilincliritmikyasam.com/')
@section('og-image', 'assets/logo.png')

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
  <section class="hero" data-screen-label="01 Hero" aria-label="Tanıtım">
    <div class="container hero-grid">
      <div class="hero-portrait-wrap"> 
        <div class="hero-portrait">
          <img src="{{ asset('assets/tuncay-portrait.jpg') }}" alt="Tuncay Vural — BRY Metodu Kurucusu" />
        </div>
      </div>

      <div class="hero-content">
        <span class="eyebrow">Kendini Tanı · Ritmini Bul · Bilinçli Yaşa</span>
        <h1>Bilinçli<br/>Ritmik <em>Yaşam</em></h1>
        <p class="hero-lead">
          BRY Metodu, insanı zihinsel, duygusal ve ruhsal boyutlarıyla bir bütün olarak tanımayı sağlayan, içeriği itibarıyla <strong>ilk ve tek yaşam metodudur</strong>. Kendi yapını derinlemesine keşfet, güçlü yönlerini ortaya çıkar, yaşamını daha bilinçli ve doğru kararlarla yönlendir.
        </p>
        <div class="hero-actions">
          <a href="{{ route('bry-metodu-ile-tanis') }}" class="btn btn-primary btn-arrow">BRY Metodunu Keşfet</a>
          <a href="#video" class="btn btn-ghost">Tanıtım Videosu</a>
        </div>
 
      </div>
    </div>
  </section>

 

  <!-- BENEFITS -->
  <section data-screen-label="03 Faydalar" aria-labelledby="benefits-h">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Neler Kazanırsın</span>
        <h2 id="benefits-h">BRY Metodunun Faydaları</h2>
        <p>BRY ile yola çıkanların yaşamında somut olarak değişen 6 alan.</p>
      </div>
      <div class="benefits-grid">
        <article class="benefit"><span class="benefit-num">01</span>
          <div class="benefit-icon"><img src="{{ asset('assets/icon-kendini-tanima.png') }}" alt="" /></div>
          <h3>Kendini Tanıma</h3>
          <p>Kendini ilk kez 9 boyutta, bütünsel olarak tanır; sana özel karakter değerlerini ve yeteneklerini fark etmeye başlarsın.</p>
        </article>
        <article class="benefit"><span class="benefit-num">02</span>
          <div class="benefit-icon"><img src="{{ asset('assets/icon-dogru-kararlar.png') }}" alt="" /></div>
          <h3>Doğru Kararlar Alabilme</h3>
          <p>Zihnini en doğru şekilde kullanmayı öğrenir, yaşamının her alanında daha sağlıklı ve net kararlar alırsın.</p>
        </article>
        <article class="benefit"><span class="benefit-num">03</span>
          <div class="benefit-icon"><img src="{{ asset('assets/icon-dengeli-yasam.png') }}" alt="" /></div>
          <h3>Dengeli Yaşam</h3>
          <p>Sahip olduğun özellikleri tanıyarak iç çatışmalarından kurtulur, yaşamının her alanında denge kurmayı öğrenirsin.</p>
        </article>
        <article class="benefit"><span class="benefit-num">04</span>
          <div class="benefit-icon"><img src="{{ asset('assets/icon-yasam-yolu.png') }}" alt="" /></div>
          <h3>Yaşam Yolunu Tespit Edebilme</h3>
          <p>İsteklerin ve hedeflerin doğrultusunda bilinçli seçimler yapar, yaşam yolunu daha net görerek özgüvenle ilerlersin.</p>
        </article>
        <article class="benefit"><span class="benefit-num">05</span>
          <div class="benefit-icon"><img src="{{ asset('assets/icon-iletisim.png') }}" alt="" /></div>
          <h3>İletişim Yönetimi</h3>
          <p>Kendinle ve çevrenle daha açık, hoşgörülü ve etkili iletişim kurar; düşüncelerini doğru ifade edebilirsin.</p>
        </article>
        <article class="benefit"><span class="benefit-num">06</span>
          <div class="benefit-icon"><img src="{{ asset('assets/icon-aktif-yasam.png') }}" alt="" /></div>
          <h3>Aktif Yaşam</h3>
          <p>Kendine ait özellikleri fark eder, bunları bilinçli ve amaç odaklı kullanarak yaşamında aktif adımlar atmaya başlarsın.</p>
        </article>
      </div>
    </div>
  </section>

    <section class="alt" data-screen-label="05 Eğitimler" aria-labelledby="programs-h">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Yaşamları Dönüştürme Yolculuğunda 22 Yıl...</span>
        <h4 id="programs-h">Tuncay Vural, BRY Metodu ile insanların kendi yapısını tanımasını ve yaşamına bilinçle yön vermesini sağlıyor!</h4>
      </div>

      <div class="home-video">
        <video controls preload="metadata" playsinline>
          <source src="{{ asset('assets/home_video.mp4') }}" type="video/mp4">
          Tarayıcınız video etiketini desteklemiyor.
        </video>
      </div>
    </div>
  </section>
 
  <section class="founder-msg ink-bg" data-screen-label="04 Kurucudan Mesaj" aria-labelledby="founder-msg-h">
    <div class="container">
      <div class="founder-msg-inner"> 
        <h2 id="founder-msg-h">Tuncay Vural'dan <em>Mesajınız Var</em></h2>
        <blockquote class="founder-quote">
          <p>"Kendini gerçekten tanıdığında, sorunların yerini çözümler, korkuların yerini doğru kararlar alır.</p>
          <p>BRY Metodu ile, amaçların doğrultusunda fikirler üretebildiğin ve kararlarını bilinçle alabileceğin bu farkındalık yolculuğunda seninle buluşmayı heyecanla bekliyorum."</p>
          <footer>— Tuncay Vural, BRY Metodu Kurucusu</footer>
        </blockquote>
      </div>
    </div>
  </section>

   <section class="journey" id="video" data-screen-label="09 Tanıtım Videosu" aria-labelledby="journey-h">
    <div class="container journey-inner">
      <div class="journey-visual journey-video">
        <video controls preload="metadata" playsinline poster="{{ asset('assets/tuncay-portrait.jpg') }}">
          <source src="{{ asset('assets/BRYMetoduyla_tanisin.mp4') }}" type="video/mp4">
          Tarayıcınız video etiketini desteklemiyor.
        </video>
      </div>
      <div class="journey-text">
        <span class="eyebrow">Peki, gerçekten iyi bir yaşam mümkün mü?</span>
        <h2 id="journey-h">Cevap, BRY Metodu’nu anlamaktan geçiyor.</h2>
        <p>22 yıldır 30.000’in üzerinde insana iyi bir yaşam sürmeleri için rehberlik eden Bilinçli Ritmik Yaşam (BRY) Metodu ile siz de tanışabilirsiniz.</p>
        <p>BRY Metodu’nun insan yaşamında nasıl bir fark yarattığını ve bu farkın sizde neleri değiştirebileceğini Tuncay Vural’ın anlattığı videoda keşfedin.</p>
        <a href="{{ route('bry-metodu-ile-tanis') }}" class="btn btn-primary btn-arrow">BRY Methodunu Keşfet</a>
      </div>
    </div>
  </section>
 
 
 
  <section class="alt" data-screen-label="07 Dönüşen Hayatlar" aria-labelledby="reels-h">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">BRY ile Dönüşen Hayatlar</span>
        <h2 id="reels-h">Yolculuklarını <em>kendi sesleriyle</em> anlatıyorlar.</h2>
        <p>BRY Metodu ile hayatı yeniden şekillenen katılımcıların kısa video hikayeleri.</p>
      </div>

      <div class="reels-wrap">
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

      <div style="text-align:center; margin-top: 36px;">
        <a href="{{ route('deneyimler.donusen') }}" class="btn btn-ghost btn-arrow">Tüm Hikayeleri Gör</a>
      </div>
    </div>
  </section>

  <!-- SONG -->
  <section class="song" data-screen-label="08 BRY Şarkısı" aria-labelledby="song-h">
    <div class="container song-inner">
      <div>
        <span class="eyebrow">BRY Şarkısı</span>
        <h2 id="song-h"><em>Kendini Bil</em> ve Anla</h2>
        <p>BRY Metodu’nun felsefesi, şimdi müzikle hayat buluyor.</p>
        <p>Bu şarkı ve klip, içindeki gücü yeniden hatırlaman ve kendi yaşam ritmini bulman için hazırlandı.</p>
        <div class="song-actions">
          <a href="https://youtu.be/1wm1mVdmgt0" target="_blank" rel="noopener" class="btn btn-plum btn-arrow">Klibi İzle</a>
          <a href="https://open.spotify.com/show/1GDAZ6JAynBhv7L3wZwJps" class="btn btn-ghost">Spotify’da Dinle</a>
        </div>
      </div>
      <div class="vinyl-stage">
        <div class="vinyl" aria-hidden="true">
          <span class="vinyl-label"></span>
          <svg class="vinyl-text" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
            <defs>
              <path id="vinyl-curve" d="M 50 50 m 0 -41 a 41 41 0 1 1 0 82 a 41 41 0 1 1 0 -82" />
            </defs>
            <text>
              <textPath href="#vinyl-curve" startOffset="0" lengthAdjust="spacing" textLength="257.6">Gerçekten iyi bir yaşam mümkün mü? ✦ ✦ Gerçekten iyi bir yaşam mümkün mü? ✦ ✦</textPath>
            </text>
          </svg>
        </div>
        <span class="vinyl-gleam" aria-hidden="true"></span>
        <button
          type="button"
          class="vinyl-play"
          aria-label="Klibi izle"
          data-video-id="1wm1mVdmgt0"
        >
          <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M8 5.5v13l11-6.5z" fill="currentColor" />
          </svg>
        </button>
      </div>
    </div>
  </section>

 

  <!-- BLOG TEASER -->
  <section class="alt" data-screen-label="10 Blog" aria-labelledby="blog-h">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Blog</span>
        <h2 id="blog-h">Düşünmeyi yavaşlatan yazılar.</h2>
        <p>Farkındalık, karar verme ve bütünsel yaşam üzerine son yazılar.</p>
      </div>
      <div class="blog-grid">
        <a class="post" href="{{ route('blog') }}">
          <div class="post-cover"><span class="ph-text">[ blog görseli ]</span></div>
          <div class="post-meta"><span>Farkındalık</span><span class="dot">·</span><span>5 dk okuma</span></div>
          <h3>Kendini tanımak nereden başlar?</h3>
          <p>BRY’nin 9 boyutlu yaklaşımına göre, ilk adım sandığından çok daha sade.</p>
          <div class="post-foot"><span>Yazıyı oku →</span></div>
        </a>
        <a class="post" href="{{ route('blog') }}">
          <div class="post-cover olive"><span class="ph-text">[ blog görseli ]</span></div>
          <div class="post-meta"><span>Karar Verme</span><span class="dot">·</span><span>7 dk okuma</span></div>
          <h3>Doğru karar ile bilinçli karar arasındaki fark</h3>
          <p>Çoğu zaman doğru sandığımız kararlar, aslında alışkanlıklarımızın sesidir.</p>
          <div class="post-foot"><span>Yazıyı oku →</span></div>
        </a>
        <a class="post" href="{{ route('blog') }}">
          <div class="post-cover plum"><span class="ph-text">[ blog görseli ]</span></div>
          <div class="post-meta"><span>İletişim</span><span class="dot">·</span><span>4 dk okuma</span></div>
          <h3>Hoşgörüyü öğrenmek mi, hatırlamak mı?</h3>
          <p>Kendine kurduğun iletişim, çevrenle kurduğun iletişimin tohumudur.</p>
          <div class="post-foot"><span>Yazıyı oku →</span></div>
        </a>
      </div>
      <div style="text-align:center; margin-top: 44px;">
        <a href="{{ route('blog') }}" class="btn btn-ghost btn-arrow">Tüm Yazılar</a>
      </div>
    </div>
  </section>

 



  @include('partials.contact-cta')
@endsection
