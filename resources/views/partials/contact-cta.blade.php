@php
  // Geldiği sayfa için referans bilgisi
  $contactSourceUrl   = request()->fullUrl();
  $contactSourceLabel = $contactSourceLabel ?? null;
  if (!$contactSourceLabel) {
      $name = optional(\Illuminate\Support\Facades\Route::current())->getName();
      $sourceLabels = [
          'home'                          => 'Anasayfa',
          'iletisim'                      => 'İletişim Sayfası',
          'bry-nedir'                     => 'BRY Nedir',
          'tuncay-vural'                  => 'Tuncay Vural',
          'bry-metodu-ile-tanis'          => 'BRY Metoduyla Tanış',
          'programs.bireysel'             => 'Bireysel Programlar',
          'programs.online'               => 'Online Akademi',
          'programs.methodu-egitimi'      => 'BRY Metodu Eğitimi',
          'programs.gercek-ben'           => 'Gerçek Ben Eğitimi',
          'programs.kurumsal'             => 'Kurumsal Programlar',
          'deneyimler.donusen'            => 'Dönüşen Hayatlar',
          'deneyimler.etkinlik'           => 'Etkinlik & Kamp',
          'deneyimler.referanslar'        => 'Kurumsal Referanslar',
          'deneyimler.kurumsal'           => 'Kurumsal Etkinlikler',
          'blog'                          => 'Blog',
          'blog.show'                     => 'Blog Yazısı',
      ];
      $contactSourceLabel = $sourceLabels[$name] ?? null;
  }
@endphp

<!-- CONTACT / CTA -->
<section class="cta-band cta-band--compact" aria-labelledby="contact-cta-h">
  <div class="container cta-inner">
    <div>
      <span class="eyebrow" style="color:#FFE7B6;">Şimdi Tanışalım</span>
      <h2 id="contact-cta-h">Bizimle <em>İletişime</em> Geçin</h2>
      <p>Sorularınız, görüşleriniz veya iş birliği talepleriniz için aşağıdaki formu doldurun. Sürecinize en uygun şekilde yön verebilmek için en kısa sürede dönüş sağlanacaktır.</p>
    </div>

    @if(session('contact_status'))
      <div class="news-form" style="display:flex; align-items:center; justify-content:center; text-align:center; min-height: 220px;">
        <div>
          <div style="font-size:32px; line-height:1; margin-bottom:10px;">✓</div>
          <h3 style="color:#fff; margin:0 0 6px;">{{ session('contact_status_title', 'Mesajınız İletildi') }}</h3>
          <p style="color:rgba(255,255,255,0.85); margin:0;">{{ session('contact_status') }}</p>
        </div>
      </div>
    @else
    <form class="news-form" method="POST" action="{{ route('contact-messages.store') }}">
      @csrf
      <input type="hidden" name="source_url" value="{{ $contactSourceUrl }}">
      @if($contactSourceLabel)
        <input type="hidden" name="source_label" value="{{ $contactSourceLabel }}">
      @endif

      <div class="news-row">
        <div>
          <label for="contact-cf-name">İsim</label>
          <input id="contact-cf-name" name="name" type="text" placeholder="Adınız ve soyadınız" value="{{ old('name') }}" required />
        </div>
        <div>
          <label for="contact-cf-email">E-posta</label>
          <input id="contact-cf-email" name="email" type="email" placeholder="ornek@eposta.com" value="{{ old('email') }}" required />
        </div>
      </div>
      <div>
        <label for="contact-cf-phone">Cep Telefonu</label>
        <input id="contact-cf-phone" name="phone" type="tel" placeholder="05XX XXX XX XX" value="{{ old('phone') }}" inputmode="tel" pattern="[0-9 +()\-]{7,}" required />
      </div>
      <div>
        <label for="contact-cf-subject">Konu</label>
        <select id="contact-cf-subject" name="subject">
          @foreach(['Genel bilgi','Bireysel program hakkında','Aile programı hakkında','Yetişkinliğe hazırlık (14–18 yaş)','Kamp programı','Online akademi','Kurumsal program / teklif','Medya / iş birliği','Diğer'] as $opt)
            <option value="{{ $opt }}" {{ old('subject') === $opt ? 'selected' : '' }}>{{ $opt }}</option>
          @endforeach
        </select>
      </div>

      <label class="kvkk-check">
        <input type="checkbox" name="kvkk" value="1" required />
        <span><a href="#" data-open-modal="kvkk-modal" style="color: var(--gold); text-decoration: underline;">KVKK aydınlatma metnini</a> okudum, kişisel verilerimin işlenmesine onay veriyorum.</span>
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
        <div style="background: rgba(193,18,31,0.18); color:#fff; padding: 10px 14px; border-radius: 10px; font-size: 13px;">
          @foreach($errors->all() as $err) <div>• {{ $err }}</div> @endforeach
        </div>
      @endif

      <button type="submit">Formu Gönder →</button>
    </form>
    @endif

    {{-- KVKK Modal --}}
    <div class="kvkk-modal" id="kvkk-modal" hidden role="dialog" aria-modal="true" aria-labelledby="contact-cta-kvkk-title">
      <div class="kvkk-modal-backdrop" data-close-modal></div>
      <div class="kvkk-modal-panel" role="document">
        <button type="button" class="kvkk-modal-close" data-close-modal aria-label="Kapat">×</button>
        <h3 id="contact-cta-kvkk-title">KVKK Aydınlatma Metni</h3>
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
