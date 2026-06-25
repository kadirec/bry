@extends('layouts.app')

@section('title', 'İletişim — Bilinçli Ritmik Yaşam · Tuncay Vural')
@section('description', 'BRY Metodu, bireysel ve kurumsal programlar hakkında bilgi almak için WhatsApp, telefon veya e-posta ile bize ulaşın. Antalya, Muratpaşa.')
@section('keywords', 'bilinçli ritmik yaşam, bry metodu, tuncay vural, kendini tanımak, yaşam metodu, bilinçli yaşam, farkındalık, kendini keşfetmek, kişisel gelişim, doğru karar almak, koçluk')
@section('canonical', 'https://www.bilincliritmikyasam.com/iletisim')
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
  <section class="page-hero" aria-labelledby="iletisim-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">İletişim</span>
      </nav>
      <span class="eyebrow">İletişim</span>
      <h1 id="iletisim-title">Bizimle <em>İletişime</em> Geçin</h1>
      <p class="lead">Sorularınız, görüşleriniz veya iş birliği talepleriniz için aşağıdaki formu doldurarak bizimle iletişime geçebilirsiniz.</p>
      <p class="lead">Sürecinize en uygun şekilde yön verebilmek için en kısa sürede dönüş sağlanacaktır.</p>
    </div>
  </section>

  <!-- CONTACT GRID -->
  <section aria-labelledby="form-title" style="padding-top: 40px; padding-bottom: 90px;">
    <div class="container">
      <div class="contact-grid">

        <!-- FORM -->
        <div class="contact-form-panel">
          <h2 id="form-title">Bize <em>Yazın</em></h2>
          <p class="form-sub">Aşağıdaki formu doldurun, kısa süre içinde size dönüş yapalım.</p>

          @if(session('contact_status'))
            <div style="background:#E7F4EA; color:#1F5A2C; padding:14px 18px; border-radius:10px; margin-bottom:16px;">
              <strong>✓ Mesajınız İletildi.</strong> {{ session('contact_status') }}
            </div>
          @endif

          <form class="contact-form" method="POST" action="{{ route('contact-messages.store') }}">
            @csrf
            <input type="hidden" name="source_url" value="{{ request()->fullUrl() }}">
            <input type="hidden" name="source_label" value="İletişim Sayfası">

            <div class="row-2">
              <div class="form-field">
                <label for="cf-name">İsim</label>
                <input id="cf-name" name="name" type="text" placeholder="Adınız ve soyadınız" value="{{ old('name') }}" required />
              </div>
              <div class="form-field">
                <label for="cf-email">E-posta</label>
                <input id="cf-email" name="email" type="email" placeholder="ornek@eposta.com" value="{{ old('email') }}" required />
              </div>
            </div>

            <div class="form-field">
              <label for="cf-phone">Cep Telefonu</label>
              <input id="cf-phone" name="phone" type="tel" placeholder="05XX XXX XX XX" value="{{ old('phone') }}" inputmode="tel" pattern="[0-9 +()\-]{7,}" required />
            </div>

            <div class="form-field">
              <label for="cf-subject">Konu</label>
              <select id="cf-subject" name="subject">
                @foreach(['Genel bilgi','Bireysel program hakkında','Aile programı hakkında','Yetişkinliğe hazırlık (14–18 yaş)','Kamp programı','Online akademi','Kurumsal program / teklif','Medya / iş birliği','Diğer'] as $opt)
                  <option value="{{ $opt }}" {{ old('subject') === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-field">
              <label for="cf-message">İleti</label>
              <textarea id="cf-message" name="message" placeholder="Mesajınızı buraya yazın…" required>{{ old('message') }}</textarea>
            </div>

            <label class="kvkk-check">
              <input type="checkbox" name="kvkk" value="1" required />
              <span><a href="#" data-open-modal="kvkk-modal" style="color: var(--plum-deep); text-decoration: underline;">KVKK aydınlatma metnini</a> okudum, kişisel verilerimin işlenmesine onay veriyorum.</span>
            </label>
            <label class="kvkk-check">
              <input type="checkbox" name="consent_email" value="1" {{ old('consent_email') ? 'checked' : '' }} />
              <span>E-posta ile bilgilendirme almak istiyorum.</span>
            </label>
            <label class="kvkk-check">
              <input type="checkbox" name="consent_sms" value="1" {{ old('consent_sms') ? 'checked' : '' }} />
              <span>SMS ile bilgilendirme almak için izin veriyorum.</span>
            </label>

            @if($errors->any())
              <div style="background:#FBE8E8; color:#7E1F1F; padding:10px 14px; border-radius:8px; font-size:13.5px;">
                @foreach($errors->all() as $err) <div>• {{ $err }}</div> @endforeach
              </div>
            @endif

            <div class="submit-row">
              <button type="submit" class="btn btn-primary btn-arrow">Formu Gönder</button>
            </div>
          </form>

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

        <!-- INFO SIDE -->
        <aside class="contact-info-stack" aria-label="İletişim bilgileri">

          @php
            $waDigits   = preg_replace('/[^\d]/', '', $site['whatsapp'] ?? '');
            $telDigits  = preg_replace('/[^+\d]/', '', $site['phone'] ?? '');
            $addressRaw = $site['address'] ?? '';
            $mapsQuery  = urlencode(strip_tags(str_replace(['<br/>','<br>','<br />'], ' ', $addressRaw)));
          @endphp

          @if(!empty($site['whatsapp']))
          <a class="info-row" href="https://wa.me/{{ $waDigits }}" target="_blank" rel="noopener">
            <span class="ico" aria-hidden="true">✦</span>
            <span class="info-body">
              <span class="info-label">WhatsApp</span>
              <span class="info-value">{{ $site['whatsapp'] }}</span>
            </span>
            <span class="info-arrow" aria-hidden="true">→</span>
          </a>
          @endif

          @if(!empty($site['phone']))
          <a class="info-row" href="tel:{{ $telDigits }}">
            <span class="ico" aria-hidden="true">☎</span>
            <span class="info-body">
              <span class="info-label">Telefon</span>
              <span class="info-value">{{ $site['phone'] }}</span>
            </span>
            <span class="info-arrow" aria-hidden="true">→</span>
          </a>
          @endif

          @if(!empty($site['email']))
          <a class="info-row" href="mailto:{{ $site['email'] }}">
            <span class="ico" aria-hidden="true">@</span>
            <span class="info-body">
              <span class="info-label">E-posta</span>
              <span class="info-value">{{ $site['email'] }}</span>
            </span>
            <span class="info-arrow" aria-hidden="true">→</span>
          </a>
          @endif

          @if(!empty($addressRaw))
          <a class="info-row" href="https://maps.google.com/?q={{ $mapsQuery }}" target="_blank" rel="noopener">
            <span class="ico" aria-hidden="true">⚲</span>
            <span class="info-body">
              <span class="info-label">Adres</span>
              <span class="info-value is-address">{!! nl2br(e($addressRaw)) !!}</span>
            </span>
            <span class="info-arrow" aria-hidden="true">→</span>
          </a>
          @endif

  

        </aside>

      </div>
    </div>
  </section>

  <!-- WHATSAPP CTA BAND -->
  <section class="whatsapp-band" aria-labelledby="wa-cta-title">
    <div class="container">
      <div>
        <h2 id="wa-cta-title">Daha Hızlı <em>Yanıt</em> Almak İster Misiniz?</h2>
        <p>WhatsApp üzerinden yazarak dakikalar içinde sorularınıza yanıt alabilir, en uygun programa yönlendirilebilirsiniz.</p>
      </div>
      <a href="https://wa.me/{{ preg_replace('/[^\d]/', '', $site['whatsapp'] ?? $site['phone'] ?? '') }}" target="_blank" rel="noopener" class="wa-cta">
        <span class="wa-icon" aria-hidden="true">✦</span>
        WhatsApp'tan Yazın
      </a>
    </div>
  </section>
@endsection
