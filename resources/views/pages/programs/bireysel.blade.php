@extends('layouts.app')

@section('title', 'BRY Bireysel ve Özel Programlar — Bireysel, Aile ve Kamp Programları')
@section('description', 'BRY Bireysel Program, Yetişkinliğe Hazırlık (14-18 yaş), Aile Programı ve Kamp Programı — Bilinçli Ritmik Yaşam metoduyla kendini bütünsel tanı.')
@section('keywords', 'bilinçli ritmik yaşam, bry metodu, tuncay vural, kendini tanımak, yaşam metodu, bilinçli yaşam, farkındalık, kendini keşfetmek, kişisel gelişim, doğru karar almak, koçluk')
@section('canonical', 'https://www.bilincliritmikyasam.com/bry-bireysel-ve-ozel-programlar')
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
  <section class="page-hero" aria-labelledby="bireysel-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <a href="#">Eğitimler</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">BRY Bireysel ve Özel Programlar</span>
      </nav>
      <span class="eyebrow">Eğitimler</span>
      <h1 id="bireysel-title">Kendini Tanımaya Nereden <em>Başlamak</em> İstersin?</h1>
      <p class="lead">BRY metodunu farklı alanlarda deneyimleyerek kendini keşfetmeye başlayabilirsin.</p>
    </div>
  </section>

  <!-- 4 PROGRAM KARTI -->
  <section aria-labelledby="programs-title" style="padding-top: 40px; padding-bottom: 100px;">
    <div class="container">
      <h2 id="programs-title" style="position:absolute;left:-9999px;">Programlar</h2>

      <div class="programs-list">

        <!-- 1: BRY Bireysel Program -->
        <article class="program-card is-featured">
          <span class="num">01</span>
          <div class="program-visual">
            <img src="{{ asset('assets/images/bireysel.png') }}" alt="BRY Bireysel Program" loading="lazy">
          </div>
          <div class="program-main">
            <div class="program-head">
              <h3>BRY <em>Bireysel</em> Program</h3>
            </div>
            <div class="program-body">
              <p>Yaşamın içinde karşılaştığınız sorunları kendi doğanıza uygun şekilde çözmek mümkün.</p>
              <p>Bireysel program, kişinin karakter özelliklerini tanımasını, yaşamın doğal ritmine uyumlu şekilde doğru kararlar alabilmesini destekler.</p>
              <ul class="specs">
                <li>Haftada 1 gün, birebir görüntülü seans (90 dakika)</li>
                <li>Toplam 12 hafta boyunca düzenli çalışma</li>
                <li>Kişiye özel içerik ve yönlendirme ile ilerlenir.</li>
              </ul>
              <a href="#iletisim" class="btn-detail">
                Detay Al
                <span class="arrow" aria-hidden="true">→</span>
              </a>
            </div>
          </div>
          <aside class="program-aside">
            <div>
              <div class="meta-pair">
                <span class="k">Süre</span>
                <span class="v">12 hafta</span>
              </div>
              <div class="meta-pair">
                <span class="k">Seans</span>
                <span class="v">90 dakika</span>
              </div>
              <div class="meta-pair">
                <span class="k">Format</span>
                <span class="v">Birebir görüntülü</span>
              </div>
            </div>
          </aside>
        </article>

        <!-- 2: BRY Yetişkinliğe Hazırlık -->
        <article class="program-card">
          <span class="num">02</span>
          <div class="program-visual">
            <img src="{{ asset('assets/images/yetiskinlige_hazirlik.png') }}" alt="BRY Yetişkinliğe Hazırlık" loading="lazy">
          </div>
          <div class="program-main">
            <div class="program-head">
              <h3>BRY Yetişkinliğe <em>Hazırlık</em> <span class="age-tag">14–18 yaş</span></h3>
            </div>
            <div class="program-body">
              <p>Genç bireylerin karakter ve kişilik gelişimlerini destekleyen bu program, meslek seçimi ve yaşam yönelimi konusunda güçlü bir farkındalık kazandırır.</p>
              <p>Düşünce yapılarının sağlıklı gelişmesi, özgüvenli ve sorumlu bireyler olmaları hedeflenir.</p>
              <ul class="specs">
                <li>Her hafta, birebir görüntülü seans (60 dakika)</li>
                <li>3 ay boyunca genç bireyin gelişimine özel destek sunulur</li>
                <li>Karakter oluşumu, özgüven ve yönelim konularında yapılandırılmış içeriklerle ilerlenir.</li>
              </ul>
              <a href="#iletisim" class="btn-detail">
                Detay Al
                <span class="arrow" aria-hidden="true">→</span>
              </a>
            </div>
          </div>
          <aside class="program-aside">
            <div>
              <div class="meta-pair">
                <span class="k">Süre</span>
                <span class="v">3 ay</span>
              </div>
              <div class="meta-pair">
                <span class="k">Seans</span>
                <span class="v">60 dakika</span>
              </div>
              <div class="meta-pair">
                <span class="k">Yaş aralığı</span>
                <span class="v">14–18</span>
              </div>
            </div>
          </aside>
        </article>

        <!-- 3: BRY Aile Programı -->
        <article class="program-card">
          <span class="num">03</span>
          <div class="program-visual">
            <img src="{{ asset('assets/images/aile.png') }}" alt="BRY Aile Programı" loading="lazy">
          </div>
          <div class="program-main">
            <div class="program-head">
              <h3>BRY <em>Aile</em> Programı</h3>
            </div>
            <div class="program-body">
              <p>Aile dinamiklerini bütünsel bir bakışla değerlendiren bu özel programda, hem bireysel hem de eşli görüşmelerle ilişkiler daha sağlıklı ve uyumlu bir hale getirilir.</p>
              <ul class="specs">
                <li>Her hafta, birebir görüntülü seanslar (90 dakika)</li>
                <li>Toplam 16 birebir seans + 4 seans eşle birlikte görüşme</li>
                <li>3 ay boyunca aile içi dengeyi destekleyen yapılandırılmış bir süreç olarak uygulanır.</li>
              </ul>
              <a href="#iletisim" class="btn-detail">
                Detay Al
                <span class="arrow" aria-hidden="true">→</span>
              </a>
            </div>
          </div>
          <aside class="program-aside">
            <div>
              <div class="meta-pair">
                <span class="k">Süre</span>
                <span class="v">3 ay</span>
              </div>
              <div class="meta-pair">
                <span class="k">Seans</span>
                <span class="v">16 + 4</span>
              </div>
              <div class="meta-pair">
                <span class="k">Format</span>
                <span class="v">Bireysel + eşli</span>
              </div>
            </div>
          </aside>
        </article>

        <!-- 4: BRY Kamp Programı -->
        <article class="program-card">
          <span class="num">04</span>
          <div class="program-visual">
            <img src="{{ asset('assets/images/bry_kamp_programi.png') }}" alt="BRY Kamp Programı" loading="lazy">
          </div>
          <div class="program-main">
            <div class="program-head">
              <h3>BRY <em>Kamp</em> Programı</h3>
            </div>
            <div class="program-body">
              <ul class="specs">
                <li>3 gün süren yüz yüze, uygulamalı grup programı</li>
                <li>BRY metodunun temel ilkeleri deneyimleyerek aktarılır</li>
                <li>Katılımcılar, kendi yaşamlarında farkındalıkla hareket edebilmek için gerekli araçları uygulamalı olarak öğrenir.</li>
              </ul>
              <p style="margin-top: 18px;">Bu program, anlatılanların hayatın içinde nasıl uygulanacağını deneyimlemek için tasarlandı.</p>
              <a href="#iletisim" class="btn-detail">
                Detay Al
                <span class="arrow" aria-hidden="true">→</span>
              </a>
            </div>
          </div>
          <aside class="program-aside">
            <div>
              <div class="meta-pair">
                <span class="k">Süre</span>
                <span class="v">3 gün</span>
              </div>
              <div class="meta-pair">
                <span class="k">Format</span>
                <span class="v">Yüz yüze · Grup</span>
              </div>
              <div class="meta-pair">
                <span class="k">Tarz</span>
                <span class="v">Uygulamalı</span>
              </div>
            </div>
          </aside>
        </article>

      </div>
    </div>
  </section>

  <!-- İLETİŞİM TRİPLE -->
  <section id="iletisim" aria-labelledby="iletisim-title" style="padding: 90px 0 100px; background: var(--bg-soft);">
    <div class="container">
      <div class="section-head section-head-center" style="margin-bottom: 14px;">
        <span class="eyebrow">İletişim</span>
        <h2 id="iletisim-title">Hangi programın sizin için uygun olduğunu belirlemek için bizimle <em>iletişime</em> geçebilirsiniz.</h2>
      </div>

      <div class="contact-triple">
        <a class="contact-cell" href="tel:+905073638063">
          <span class="icon-circle" aria-hidden="true">☎</span>
          <span class="label">Telefonla Ulaşın</span>
          <span class="value">+90 507 363 8063</span>
          <span class="btn-text">Hemen Ara →</span>
        </a>
        <a class="contact-cell" href="https://wa.me/905334906962" target="_blank" rel="noopener">
          <span class="icon-circle" aria-hidden="true">✦</span>
          <span class="label">WhatsApp'tan Yazın</span>
          <span class="value">+90 533 490 6962</span>
          <span class="btn-text">WhatsApp Aç →</span>
        </a>
        <a class="contact-cell" href="mailto:info@bilincliritmikyasam.com">
          <span class="icon-circle" aria-hidden="true">@</span>
          <span class="label">E-posta Gönderin</span>
          <span class="value">info@bilincliritmikyasam.com</span>
          <span class="btn-text">Mail Gönder →</span>
        </a>
      </div>
    </div>
  </section>
  @include('partials.contact-cta')
@endsection
