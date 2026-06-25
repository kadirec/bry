@extends('layouts.app')

@section('title', 'BRY Kurumsal Programlar — Kurumlara Özel Eğitim ve Seminerler')
@section('description', 'Bilinçli Ritmik Yaşam Metodu\'nun iş dünyasına özel uygulamalı eğitim ve seminerleri: 1 günlük, 2 günlük ve seminer programları.')
@section('keywords', 'bilinçli ritmik yaşam, bry metodu, tuncay vural, kendini tanımak, yaşam metodu, bilinçli yaşam, farkındalık, kendini keşfetmek, kişisel gelişim, doğru karar almak, koçluk')
@section('canonical', 'https://www.bilincliritmikyasam.com/bry-kurumsal-programlar')
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
  <section class="page-hero" aria-labelledby="kur-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <a href="#">Eğitimler</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">BRY Kurumsal Programlar</span>
      </nav>
      <span class="eyebrow">Eğitimler</span>
      <h1 id="kur-title">BRY <em>Kurumsal</em> Programlar</h1>
      <p class="lead">Bilinçli Ritmik Yaşam'ın iş dünyasına özel geliştirilmiş uygulamalı eğitim ve seminer programları.</p>
    </div>
  </section>

  <!-- AÇIKLAMA BLOĞU -->
  <section aria-labelledby="aciklama-title" style="padding-top: 40px;">
    <div class="container">
      <div class="intro-band">
        <p class="intro-lead">İş hayatında performansı etkileyen en temel sorunlar; <strong>odak kaybı, iletişim problemleri, motivasyon düşüşü ve zaman yönetimindeki dengesizliktir.</strong></p>
        <p class="intro-sub">Bilinçli Ritmik Yaşam, bu alanlara yönelik geliştirilmiş uygulamalı eğitim ve seminer programlarıyla kurumlara <strong>sürdürülebilir bir gelişim modeli</strong> sunar.</p>
      </div>
      <div class="aciklama-with-image" style="display: grid; grid-template-columns: 1.15fr 1fr; gap: 56px; align-items: start;">
        <div>
          <p style="color: var(--ink-soft); font-size: 17.5px; line-height: 1.78; margin-bottom: 20px;">Bilinçli Ritmik Yaşam kurumsal programı, çalışanların bireysel potansiyelini fark etmelerini ve bu potansiyeli iş yaşamına daha bilinçli şekilde aktarmalarını destekler.</p>
          <p style="color: var(--ink-soft); font-size: 17.5px; line-height: 1.78; margin-bottom: 20px;">Program, şirketin ihtiyaç duyduğu alanlara özel olarak yapılandırılır. Eğitim sürecinde sadece bilgi aktarılmaz; uygulamalı geri bildirimlerle birlikte çalışanlar sahadaki davranışlarını gözden geçirme ve dönüştürme fırsatı bulurlar.</p>
          <p style="color: var(--ink-soft); font-size: 17.5px; line-height: 1.78; margin-bottom: 20px;">BRY yaklaşımına göre her birey, yaşamında beş temel alanda (bireysel, mesleki, sosyal, aile ve iletişim) birikimlerini kullanır. Bu beş alanda gelişim sağlayan kişi, iş yaşamında da doğal olarak daha donanımlı ve etkili hale gelir.</p>
          <p style="color: var(--ink-soft); font-size: 17.5px; line-height: 1.78; margin-bottom: 20px;">Şirketler, yoğun iş temposunda mevcut potansiyellerini ve ihtiyaçlarını çoğu zaman net olarak göremeyebilir.</p>
          <p style="color: var(--ink-soft); font-size: 17.5px; line-height: 1.78;">BRY eğitimi sayesinde hem bireyler hem ekipler; <strong style="color: var(--ink);">kendini tanıma, farkındalık, motivasyon ve takım çalışması</strong> gibi alanlarda güçlenerek hedeflerine daha bilinçli adımlarla ilerler.</p>
        </div>
        <figure style="margin: 0; position: sticky; top: 100px; text-align: center;">
          <img src="{{ asset('assets/images/kurumsal.jpg') }}" alt="BRY kurumsal eğitim — iş yaşamında uygulamalı gelişim" style="width: 100%; height: auto; border-radius: var(--radius-lg); display: block; box-shadow: 0 20px 50px -24px rgba(31,42,36,0.35);" loading="lazy" />
          <a href="#egitim-programlari" class="btn-detail" style="margin: 22px auto 0; align-self: center;">
            Eğitim Programları
            <span class="arrow" aria-hidden="true">→</span>
          </a>
        </figure>
      </div>
    </div>
  </section>

 

  <!-- EĞİTİM PROGRAMLARI (Pricing) -->
  <section id="egitim-programlari" style="padding: 60px 0 100px; background: var(--bg-soft); scroll-margin-top: 80px;">
    <div class="container">
      <div class="section-head" style="margin-bottom: 0;">  
        <h2>Eğitim <em>Programları</em></h2>
      </div>

      <div class="pricing-grid">

        <!-- 1 GÜN -->
        <article class="price-card">
          <h3>1 Günlük <em>Eğitim</em></h3>
          <div class="spec-list">
            <div class="spec-row">
              <span class="k">Süre</span>
              <span class="v">8 saat</span>
            </div>
            <div class="spec-row">
              <span class="k">Kontenjan</span>
              <span class="v">30 kişi</span>
            </div>
          </div>
          <a href="#cta-kur" class="btn-detail">
            Teklif Al
            <span class="arrow" aria-hidden="true">→</span>
          </a>
        </article>

        <!-- 2 GÜN -->
        <article class="price-card">
          <h3>2 Günlük <em>Eğitim</em></h3>
          <div class="spec-list">
            <div class="spec-row">
              <span class="k">Süre</span>
              <span class="v">16 saat</span>
            </div>
            <div class="spec-row">
              <span class="k">Kontenjan</span>
              <span class="v">30 kişi</span>
            </div>
          </div>
          <a href="#cta-kur" class="btn-detail">
            Teklif Al
            <span class="arrow" aria-hidden="true">→</span>
          </a>
        </article>

        <!-- SEMİNER -->
        <article class="price-card">
          <h3>Seminer <em>Programı</em></h3>
          <div class="spec-list">
            <div class="spec-row">
              <span class="k">Süre</span>
              <span class="v">2 saat</span>
            </div>
            <div class="spec-row">
              <span class="k">Katılımcı</span>
              <span class="v">Sınırsız</span>
            </div>
          </div>
          <a href="#cta-kur" class="btn-detail">
            Teklif Al
            <span class="arrow" aria-hidden="true">→</span>
          </a>
        </article>

      </div>
    </div>
  </section>

  <!-- REFERANS BANT -->
  <section style="padding: 90px 0;">
    <div class="container">
      <div class="section-head section-head-center" style="margin-bottom: 30px;">
        <h2 style="font-size: clamp(22px, 2.6vw, 34px); letter-spacing: -0.02em;">Bilinçli Ritmik Yaşam Metodunu kurumlarına taşıyan <em>iş ortaklarımız</em></h2>
      </div>

      @php
        $kurumsalRefs = \App\Models\Reference::active()->onKurumsal()->orderBy('sort')->orderBy('id')->get();
      @endphp

      @if($kurumsalRefs->isNotEmpty())
        <div class="ref-marquee" aria-label="İş ortaklarımız" style="margin-top: 40px;">
          <div class="ref-marquee-track">
            @foreach($kurumsalRefs as $ref)
              <div class="ref-marquee-cell" title="{{ $ref->name }}">
                <img src="{{ $ref->imageUrl() }}" alt="{{ $ref->name }}" loading="lazy">
              </div>
            @endforeach
            {{-- Aynı setin kopyası — sonsuz akış için --}}
            @foreach($kurumsalRefs as $ref)
              <div class="ref-marquee-cell" title="{{ $ref->name }}" aria-hidden="true">
                <img src="{{ $ref->imageUrl() }}" alt="" loading="lazy">
              </div>
            @endforeach
          </div>
        </div>
      @endif

      <div style="text-align: center; margin-top: 40px;">
        <a href="{{ route('deneyimler.referanslar') }}" class="btn-detail" style="margin: 0 auto;">
          Referanslarımızı İnceleyin
          <span class="arrow" aria-hidden="true">→</span>
        </a>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-band" id="cta-kur" aria-labelledby="cta-kur-title">
    <div class="container cta-inner">
      <div>
        <span class="eyebrow" style="color: var(--gold);">Kurumunuza Özel</span>
        <h2 id="cta-kur-title">Ekibiniz İçin <em>Program</em> Tasarlayalım</h2>
        <p>BRY Metodu'nu kurumunuza entegre etmek için ekibinizin ihtiyaçlarına özel bir program planlayalım.</p>
      </div>
      @if(session('lead_status'))
        <div class="lead-success">
          <div class="lead-success-ic" aria-hidden="true">✓</div>
          <h3>Teklif Talebiniz Alındı</h3>
          <p>{{ session('lead_status') }}</p>
          <p class="muted">Kısa süre içinde size kurumsal e-postanız üzerinden dönüş yapacağız.</p>
          <a href="{{ route('programs.kurumsal') }}" class="btn-arrow" style="margin-top: 18px;">Sayfaya Dön →</a>
        </div>
      @else
      <form class="news-form" method="POST" action="{{ route('corporate.leads.store') }}">
        @csrf
        <label>Kurumsal iletişim</label>
        <div class="news-row">
          <input type="text" name="name" placeholder="Ad Soyad" value="{{ old('name') }}" required />
          <input type="email" name="email" placeholder="Kurumsal e-posta" value="{{ old('email') }}" required />
        </div>
        <div class="news-row">
          <input type="text" name="company" placeholder="Kurum / Şirket adı" value="{{ old('company') }}" required />
          <input type="tel" name="phone" placeholder="Cep Telefonu" value="{{ old('phone') }}" inputmode="tel" pattern="[0-9 +()\-]{7,}" required />
        </div>
        <select name="program" aria-label="İlgilenilen program">
          <option value="1 Günlük Eğitim">İlgilendiğim program — 1 Günlük Eğitim</option>
          <option value="2 Günlük Eğitim">İlgilendiğim program — 2 Günlük Eğitim</option>
          <option value="Seminer Programı">İlgilendiğim program — Seminer Programı</option>
        </select>

        <label class="kvkk-check">
          <input type="checkbox" name="kvkk" value="1" required />
          <span><a href="#" data-open-modal="kvkk-modal" style="color: var(--gold); text-decoration: underline;">KVKK aydınlatma metnini</a> okudum, kişisel verilerimin işlenmesine onay veriyorum.</span>
        </label>

        @if($errors->any())
          <div style="background: rgba(193,18,31,0.15); color: #fff; padding: 10px 14px; border-radius: 10px; font-size: 13px;">
            @foreach($errors->all() as $err) <div>• {{ $err }}</div> @endforeach
          </div>
        @endif

        <button type="submit" class="btn-arrow">Teklif İste</button>
      </form>
      @endif

      {{-- KVKK Modal --}}
      <div class="kvkk-modal" id="kvkk-modal" hidden role="dialog" aria-modal="true" aria-labelledby="kvkk-modal-title">
        <div class="kvkk-modal-backdrop" data-close-modal></div>
        <div class="kvkk-modal-panel" role="document">
          <button type="button" class="kvkk-modal-close" data-close-modal aria-label="Kapat">×</button>
          <h3 id="kvkk-modal-title">KVKK Aydınlatma Metni</h3>
          <div class="kvkk-modal-body">
            @include('partials.kvkk-text')
          </div>
          <div style="text-align: right; margin-top: 18px;">
            <button type="button" class="btn-arrow" data-close-modal>Kapat</button>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
