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
          <img src="{{ asset('assets/images/tuncay_vural.png') }}" alt="Tuncay Vural — BRY Metodu Kurucusu" />
        </div>
      </div>

      <div class="hero-content">
        <span class="eyebrow">Kendini Tanı · Ritmini Bul · Bilinçli Yaşa</span>
        <h1>Bilinçli<br/>Ritmik <em>Yaşam</em></h1>
        <p class="hero-lead">
          BRY Metodu, insanı zihinsel, duygusal, ruhsal ve diğer boyutlarıyla bir bütün olarak tanımayı sağlayan, içeriği itibarıyla <strong>ilk ve tek yaşam metodudur</strong>. Kendi yapını derinlemesine keşfet, güçlü yönlerini ortaya çıkar, yaşamını daha bilinçli ve doğru kararlarla yönlendir.
        </p>
        <div class="hero-actions">
          <a href="{{ route('bry-metodu-ile-tanis') }}" class="btn btn-primary btn-arrow">BRY Metodunu Keşfet</a>
          <a href="#video" class="btn btn-ghost">Tanıtım Videosu</a>
        </div>
 
      </div>
    </div>
  </section>

 

  <!-- BENEFITS -->
  <section class="alt benefits-section" data-screen-label="03 Faydalar" aria-labelledby="benefits-h">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Neler Kazanırsın</span>
        <h2 id="benefits-h">BRY Metodunun Faydaları</h2>
      </div>
      <div class="benefits-grid">
        <article class="benefit">
          <div class="benefit-icon"><img src="{{ asset('assets/images/fayda_iconlar/kendini_tanima.png') }}" alt="" /></div>
          <h3>Kendini Tanıma</h3>
          <p>Kendini ilk kez 9 boyutta, bütünsel olarak tanır; sana özel karakter değerlerini ve yeteneklerini fark etmeye başlarsın.</p>
        </article>
        <article class="benefit">
          <div class="benefit-icon"><img src="{{ asset('assets/images/fayda_iconlar/dogru_karar_alabilme.png') }}" alt="" /></div>
          <h3>Doğru Kararlar Alabilme</h3>
          <p>Zihnini en doğru şekilde kullanmayı öğrenir, bu sayede yaşamının her alanında daha sağlıklı ve net kararlar alırsın.</p>
        </article>
        <article class="benefit">
          <div class="benefit-icon"><img src="{{ asset('assets/images/fayda_iconlar/dengeli_yasam.png') }}" alt="" /></div>
          <h3>Dengeli Yaşam</h3>
          <p>Sahip olduğun özellikleri tanıyarak iç çatışmalarından kurtulur, yaşamının her alanında denge kurmayı öğrenirsin.</p>
        </article>
        <article class="benefit">
          <div class="benefit-icon"><img src="{{ asset('assets/images/fayda_iconlar/yasam_yolunu_tespit_edebilme.png') }}" alt="" /></div>
          <h3>Yaşam Yolunu Tespit Edebilme</h3>
          <p>İsteklerin ve hedeflerin doğrultusunda bilinçli seçimler yapabilir, yaşam yolunu daha net görebilir ve bu yolda özgüvenle ilerleyebilirsin.</p>
        </article>
        <article class="benefit">
          <div class="benefit-icon"><img src="{{ asset('assets/images/fayda_iconlar/iletisim_yonetimi.png') }}" alt="" /></div>
          <h3>İletişim Yönetimi</h3>
          <p>Kendinle ve çevrendekilerle daha açık, hoşgörülü ve etkili iletişim kurabilir, düşüncelerini doğru şekilde ifade edebilirsin.</p>
        </article>
        <article class="benefit">
          <div class="benefit-icon"><img src="{{ asset('assets/images/fayda_iconlar/aktif_yasam.png') }}" alt="" /></div>
          <h3>Aktif Yaşam</h3>
          <p>Kendine ait özellikleri fark eder, bunları bilinçli ve amaç odaklı kullanarak yaşamında aktif adımlar atmaya başlarsın.</p>
        </article>
      </div>
    </div>
  </section>

    <section class="hero-bg" data-screen-label="05 Eğitimler" aria-labelledby="programs-h">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Yaşamları Dönüştürme Yolculuğunda 22 Yıl...</span>
        <h4 id="programs-h">Tuncay Vural, BRY Metodu ile insanların kendi yapısını tanımasını ve yaşamına bilinçle yön vermesini sağlıyor!</h4>
      </div>

      <div class="home-video">
        <video controls preload="metadata" playsinline poster="{{ asset('assets/images/insanveyasam_video_kapak.png') }}">
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
          <footer>— Bilinçli Ritmik Yaşam (BRY) Kurucusu, Eğitmeni ve Rehberi</footer>
        </blockquote>
      </div>
    </div>
  </section>

   <section class="journey" id="video" data-screen-label="09 Tanıtım Videosu" aria-labelledby="journey-h">
    <div class="container journey-inner">
      <div class="journey-visual journey-video">
        <video controls preload="metadata" playsinline poster="{{ asset('assets/images/bry_method_kapak.png') }}">
          <source src="{{ asset('assets/BRYMetoduyla_tanisin.mp4') }}" type="video/mp4">
          Tarayıcınız video etiketini desteklemiyor.
        </video>
      </div>
      <div class="journey-text">
        <span class="eyebrow">Peki, gerçekten iyi bir yaşam mümkün mü?</span>
        <h2 id="journey-h">Bu sorunun cevabını keşfetmenin ilk adımı, BRY Metodu’nu anlamaktan geçiyor.</h2>
        <p>22 yıldır 30.000’in üzerinde insana iyi bir yaşam sürmeleri için rehberlik eden Bilinçli Ritmik Yaşam (BRY) Metodu ile siz de tanışabilirsiniz.</p>
        <p>BRY Metodu’nun insan yaşamında nasıl bir fark yarattığını ve bu farkın sizde neleri değiştirebileceğini Tuncay Vural’ın anlattığı videoda keşfedin.</p>
        <a href="{{ route('bry-metodu-ile-tanis') }}" class="btn btn-primary btn-arrow">BRY Metodunu Keşfet</a>
      </div>
    </div>
  </section>
 
 
 
  <section class="alt" data-screen-label="07 Dönüşen Hayatlar" aria-labelledby="reels-h">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">BRY ile Dönüşen Hayatlar</span>
        <h2 id="reels-h">Yolculuklarını <em>kendi sesleriyle</em> anlatıyorlar.</h2>
        <p>Her anlatım, yaşanmış bir sürecin gerçek bir ifadesidir ve BRY metodunun yaşam üzerindeki etkisini doğrudan yansıtır.</p>
      </div>

      <div class="reels-wrap">
        <div class="swiper reels-swiper" data-reels-swiper>
          <div class="swiper-wrapper">
            @foreach($homeTestimonials as $t)
              @php
                $trigger = $t->videoTrigger();
                $poster  = $t->posterUrl();
              @endphp
              <div class="swiper-slide">
                <button
                  class="reel{{ in_array($t->color, ['plum', null], true) ? '' : ' ' . $t->color }}{{ $poster ? ' has-poster' : '' }}"
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
              </div>
            @endforeach
          </div>
        </div>
        <div class="swiper-pagination reels-swiper-pagination"></div>
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
  @if($homeLatestPosts->isNotEmpty())
  <section class="alt" data-screen-label="10 Blog" aria-labelledby="blog-h">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Blog</span>
        <h2 id="blog-h">Düşünmeyi yavaşlatan yazılar.</h2>
        <p>Farkındalık, karar verme ve bütünsel yaşam üzerine son yazılar.</p>
      </div>

      @php $coverTints = ['', 'olive', 'plum']; @endphp

      <div class="blog-swiper-wrap">
        <button type="button" class="blog-nav blog-nav-prev" aria-label="Önceki yazı">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15 18l-6-6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
        <button type="button" class="blog-nav blog-nav-next" aria-label="Sonraki yazı">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
        <div class="swiper blog-swiper" data-blog-swiper>
          <div class="swiper-wrapper">
            @foreach($homeLatestPosts as $i => $post)
              @php
                $cover = $post->featuredImageUrl();
                $tint  = $coverTints[$i % count($coverTints)];
              @endphp
              <div class="swiper-slide">
                <a class="post" href="{{ route('blog.show', $post) }}">
                  <div class="post-cover {{ $tint }}">
                    @if($cover)
                      <img src="{{ $cover }}" alt="" loading="lazy">
                    @else
                      <span class="ph-text">[ blog görseli ]</span>
                    @endif
                  </div>
                  <div class="post-meta">
                    @if($post->category)<span>{{ $post->category->name }}</span>@endif
                    @if($post->category && $post->reading_minutes)<span class="dot">·</span>@endif
                    @if($post->reading_minutes)<span>{{ $post->reading_minutes }} dk okuma</span>@endif
                  </div>
                  <h3>{{ \Illuminate\Support\Str::limit($post->title, 60) }}</h3>
                  @if($post->excerpt)<p>{{ \Illuminate\Support\Str::limit(strip_tags($post->excerpt), 160) }}</p>@endif
                  <div class="post-foot"><span>Yazıyı oku →</span></div>
                </a>
              </div>
            @endforeach
          </div>
        </div>
        <div class="swiper-pagination blog-swiper-pagination"></div>
      </div>

      <div style="text-align:center; margin-top: 44px;">
        <a href="{{ route('blog') }}" class="btn btn-ghost btn-arrow">Tüm Yazılar</a>
      </div>
    </div>
  </section>
  @endif

 



  @include('partials.contact-cta')
@endsection

@push('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
<script defer>
  document.addEventListener('DOMContentLoaded', () => {
    if (typeof Swiper === 'undefined') return;

    const reelsEl = document.querySelector('[data-reels-swiper]');
    if (reelsEl) {
      const reelsWrap = reelsEl.closest('.reels-wrap') || reelsEl.parentElement;
      new Swiper(reelsEl, {
        slidesPerView: 1.2,
        spaceBetween: 14,
        centeredSlides: false,
        grabCursor: true,
        loop: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
        },
        pagination: {
          el: reelsWrap.querySelector('.reels-swiper-pagination'),
          clickable: true,
        },
        breakpoints: {
          520:  { slidesPerView: 2.5, spaceBetween: 16 },
          780:  { slidesPerView: 3.5, spaceBetween: 18 },
          1024: { slidesPerView: 3.5, spaceBetween: 20 },
          1280: { slidesPerView: 3.5, spaceBetween: 22 },
        },
      });
    }

    const blogEl = document.querySelector('[data-blog-swiper]');
    if (blogEl) {
      const blogWrap   = blogEl.closest('.blog-swiper-wrap') || blogEl.parentElement;
      const slideCount = blogEl.querySelectorAll('.swiper-slide').length;
      new Swiper(blogEl, {
        slidesPerView: 1.05,
        spaceBetween: 16,
        grabCursor: true,
        loop: slideCount > 3,
        autoplay: {
          delay: 5500,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
        },
        pagination: {
          el: blogWrap.querySelector('.blog-swiper-pagination'),
          clickable: true,
        },
        navigation: {
          nextEl: blogWrap.querySelector('.blog-nav-next'),
          prevEl: blogWrap.querySelector('.blog-nav-prev'),
        },
        breakpoints: {
          640:  { slidesPerView: 2, spaceBetween: 20 },
          960:  { slidesPerView: 3, spaceBetween: 22 },
        },
      });
    }
  });
</script>
@endpush
