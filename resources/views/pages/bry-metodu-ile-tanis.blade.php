@extends('layouts.app')

@section('title', 'BRY Metoduyla Tanış — Gerçekten İyi Bir Yaşam Mümkün mü? | Tuncay Vural')
@section('description', 'BRY Metoduyla tanış. Tuncay Vural\'ın anlatımıyla özel tanıtım videosunu izle ve "Bilincinle Tanış" PDF dosyasını ücretsiz indir.')
@section('keywords', 'bilinçli ritmik yaşam, bry metodu, tuncay vural, bilincinle tanış, pdf, farkındalık egzersizleri, yaşam metodu')
@section('canonical', 'https://www.bilincliritmikyasam.com/bry-metodu-ile-tanis')
@section('og-image', 'assets/logo.png')
@section('main-class', 'inner')

@section('content')
  <!-- PAGE HERO -->
  <section class="page-hero tanis-hero" aria-labelledby="tanis-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">BRY Metoduyla Tanış</span>
      </nav>
      <span class="eyebrow">BRY ile Tanış</span>
      <h1 id="tanis-title">Gerçekten İyi Bir Yaşam <em>Mümkün mü?</em><br/>BRY Metoduyla Tanışın</h1>
      <p class="lead">BRY, herkesin kendi ritminde öğrenip uygulayabileceği, evrensel ilk ve tek yaşam metodudur.</p>
    </div>
  </section>

  <!-- VIDEO + INTRO -->
  <section class="tanis-split" aria-labelledby="tanis-video-title">
    <div class="container">
      <div class="tanis-split-grid">
        <div class="tanis-split-text">
          <h2 id="tanis-video-title" class="sr-only">BRY Metodu — Tanıtım Videosu</h2>
          <p><strong>Her insanın ihtiyacı olan Bilinçli Ritmik Yaşam (BRY) Metodu nedir? Hangi yaşamsal eksiklikleri tamamlar?</strong></p>
          <p><strong>Kişinin kendini tanımasına ve hayatın tüm alanlarında daha dengeli bir yaşam sürmesine nasıl katkılar sağlar?</strong></p>
          <p><strong>Tüm bu soruların yanıtı, Tuncay Vural'ın anlatımıyla bu özel videoda seni bekliyor.</strong></p>
        </div>

        <div class="tanis-split-video">
          <div class="tanis-video-wrap">
            <video controls preload="metadata" playsinline poster="{{ asset('assets/tuncay-portrait.jpg') }}">
              <source src="{{ asset('assets/BRYMetoduyla_tanisin.mp4') }}" type="video/mp4">
              Tarayıcınız video etiketini desteklemiyor.
            </video>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PDF DOWNLOAD -->
  <section class="tanis-pdf" aria-labelledby="pdf-title">
    <div class="tanis-pdf-band">
      <div class="container">
        <h2 id="pdf-title"><em>"Bilincinle Tanış"</em> Dosyasını Ücretsiz Alın</h2>
      </div>
    </div>

    <div class="container">
      <div class="tanis-pdf-body">
        <p><strong>Şu andan itibaren zihninizi daha etkili kullanabilmenizi sağlayacak, BRY Metodunun içeriğinde yer alan "Bilincinle Tanış" adlı PDF dosyasını ücretsiz olarak edinebilirsiniz.</strong></p>

        <p><strong>Bu kısa ama etkili dosyada, bilincinizin nasıl çalıştığını, sizi hedeflerinize ulaştıran ya da alıkoyan mekanizmayı tanıyacak ve günlük yaşamınızda hemen uygulayabileceğiniz farkındalık egzersizleri bulacaksınız.</strong></p>

        <div class="tanis-pdf-inner" id="bilincinle-tanis-form">
          <p class="pdf-sub-title"><em>"Bilincinle Tanış" Dosyasını Ücretsiz Alın</em></p>
          <p class="pdf-sub"><em>Aşağıya adınızı ve e-posta adresinizi yazın.<br/>
            Dosyanız birkaç dakika içinde e-posta kutunuza ulaşacak.<br/>
            BRY metodunu daha yakından tanımaya bugünden başlayın.</em></p>

          @if(session('contact_status'))
            <div style="background:#E7F4EA; color:#1F5A2C; padding:16px 18px; border-radius:10px; text-align:left; margin-top:12px;">
              <strong>✓ {{ session('contact_status_title', 'Bilgilerinizi Aldık') }}.</strong> PDF gönderimi otomatik olarak sağlanacaktır.
            </div>
          @else
          <form class="pdf-form" method="POST" action="{{ route('contact-messages.store') }}">
            @csrf
            <input type="hidden" name="source_url" value="{{ request()->fullUrl() }}">
            <input type="hidden" name="source_label" value="BRY Metoduyla Tanış (PDF)">
            <input type="hidden" name="subject" value="Bilincinle Tanış PDF talebi">

            <div class="pdf-form-row">
              <input type="text" name="name" placeholder="Ad Soyad" aria-label="Ad Soyad" value="{{ old('name') }}" required />
              <input type="tel" name="phone" placeholder="Telefon" aria-label="Telefon" value="{{ old('phone') }}" inputmode="tel" pattern="[0-9 +()\-]{7,}" required />
            </div>
            <input type="email" name="email" placeholder="E-posta Adresiniz" aria-label="E-posta adresiniz" value="{{ old('email') }}" required />
            <label class="pdf-kvkk">
              <input type="checkbox" name="kvkk" value="1" required />
              <span><a href="#" data-open-modal="kvkk-modal">KVKK aydınlatma metnini</a> okudum ve kabul ediyorum.</span>
            </label>
            <label class="pdf-kvkk">
              <input type="checkbox" name="consent_email" value="1" {{ old('consent_email') ? 'checked' : '' }} />
              <span>E-posta ile bilgilendirme almak istiyorum.</span>
            </label>
            <label class="pdf-kvkk">
              <input type="checkbox" name="consent_sms" value="1" {{ old('consent_sms') ? 'checked' : '' }} />
              <span>SMS ile bilgilendirme almak için izin veriyorum.</span>
            </label>

            @if($errors->any())
              <div style="background:#FBE8E8; color:#7E1F1F; padding:10px 14px; border-radius:8px; font-size:13.5px; text-align:left;">
                @foreach($errors->all() as $err) <div>• {{ $err }}</div> @endforeach
              </div>
            @endif

            <button type="submit" class="btn-arrow">Formu Gönder</button>
          </form>
          @endif
        </div>
      </div>
    </div>
  </section>
  @include('partials.contact-cta')
@endsection
