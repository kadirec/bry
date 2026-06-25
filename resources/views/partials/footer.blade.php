<footer class="site">
  <div class="container">

    <div class="foot-grid">
      <div class="foot-col foot-col-social">
        <h4>Sosyal Medya</h4>
        <div class="foot-socials" aria-label="Sosyal medya">
          <a href="https://www.youtube.com/@bilincliritmikyasam" target="_blank" rel="noopener" aria-label="YouTube" title="YouTube">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2 31 31 0 0 0 0 12a31 31 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1A31 31 0 0 0 24 12a31 31 0 0 0-.5-5.8zM9.6 15.6V8.4l6.3 3.6-6.3 3.6z"/>
            </svg>
          </a>
          <a href="https://www.instagram.com/tuncayvural_bry/" target="_blank" rel="noopener" aria-label="Instagram" title="Instagram">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
              <rect x="3" y="3" width="18" height="18" rx="5"/>
              <circle cx="12" cy="12" r="4"/>
              <circle cx="17.5" cy="6.5" r="1.1" fill="currentColor" stroke="none"/>
            </svg>
          </a>
          <a href="https://www.facebook.com/BilincliRitmikYasam" target="_blank" rel="noopener" aria-label="Facebook" title="Facebook">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M22 12a10 10 0 1 0-11.6 9.9V14.9H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.5 2.9h-2.3v6.9A10 10 0 0 0 22 12z"/>
            </svg>
          </a>
          <a href="https://www.tiktok.com/@bilincliritmikyasam" target="_blank" rel="noopener" aria-label="TikTok" title="TikTok">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M19.6 7.5a5.7 5.7 0 0 1-3.4-1.1 5.7 5.7 0 0 1-2.2-3.6h-2.8v11.9a2.7 2.7 0 1 1-1.9-2.6V9.2A5.5 5.5 0 1 0 13.9 14.7V9.2a8.6 8.6 0 0 0 5.7 2.1V7.5z"/>
            </svg>
          </a>
          <a href="https://open.spotify.com/show/1GDAZ6JAynBhv7L3wZwJps" target="_blank" rel="noopener" aria-label="Spotify" title="Spotify">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm4.6 14.4a.7.7 0 0 1-1 .2c-2.7-1.6-6-2-9.9-1.1a.7.7 0 0 1-.3-1.4c4.3-1 7.9-.5 10.9 1.3a.7.7 0 0 1 .3 1zm1.2-2.7a.9.9 0 0 1-1.2.3c-3-1.9-7.6-2.4-11.2-1.3a.9.9 0 0 1-.5-1.7c4.1-1.2 9.2-.7 12.6 1.5a.9.9 0 0 1 .3 1.2zm.1-2.8C14.3 9 8 8.7 4.7 9.7a1.1 1.1 0 0 1-.6-2.1c3.8-1.2 10.8-1 14.8 1.4a1.1 1.1 0 1 1-1 1.9z"/>
            </svg>
          </a>
        </div>

        <div class="foot-brand foot-brand--inline">
          <img src="{{ asset('assets/logo-dark.png') }}" alt="BRY logo" />
          <p>Bilinçli Ritmik Yaşam (BRY) Metodu — kendini bütünsel olarak tanımak ve yaşamını bilinçli yönlendirmek isteyenler için geliştirilmiş, içeriği itibarıyla ilk ve tek yaşam metodu.</p>
        </div>
      </div>

      <nav class="foot-col" aria-label="Hızlı linkler">
        <h4>Site Haritası</h4>
        <ul>
          <li><a href="{{ route('bry-nedir') }}">BRY Nedir?</a></li>
          <li><a href="{{ route('tuncay-vural') }}">Tuncay Vural</a></li>
          <li><a href="{{ route('deneyimler.donusen') }}">Dönüşen Hayatlar</a></li>
          <li><a href="{{ route('deneyimler.etkinlik') }}">Etkinlik & Kamp</a></li>
          <li><a href="{{ route('blog') }}">Blog</a></li>
          <li><a href="{{ route('iletisim') }}">İletişim</a></li>
          <li><a href="https://www.bilincliritmikyasam.com/login" target="_blank" rel="noopener">Akademi Girişi</a></li>
        </ul>
      </nav>

      <nav class="foot-col" aria-label="Eğitimler">
        <h4>Eğitimler</h4>
        <ul>
          <li><a href="{{ route('programs.bireysel') }}">Bireysel ve Özel Programlar</a></li>
          <li><a href="{{ route('programs.online') }}">BRY Online Akademi</a></li>
          <li><a href="{{ route('programs.kurumsal') }}">Kurumsal Programlar</a></li>
          <li><a href="{{ route('deneyimler.referanslar') }}">Kurumsal Referanslar</a></li>
          <li><a href="{{ route('deneyimler.kurumsal') }}">Kurumsal Etkinlikler</a></li>
          <li><a href="{{ route('bry-metodu-ile-tanis') }}">BRY ile Tanış</a></li>
        </ul>
      </nav>

      <div class="foot-col">
        <h4>İletişim</h4>
        @if(!empty($site['phone']))
        <div class="foot-contact-item">
          <span class="ic" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.95.36 1.88.7 2.77a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.31-1.31a2 2 0 0 1 2.11-.45c.89.34 1.82.57 2.77.7A2 2 0 0 1 22 16.92z"/>
            </svg>
          </span>
          <div>
            <span class="lbl">Telefon</span>
            <span class="val"><a href="tel:{{ preg_replace('/[^+\d]/', '', $site['phone']) }}">{{ $site['phone'] }}</a></span>
          </div>
        </div>
        @endif
        @if(!empty($site['email']))
        <div class="foot-contact-item">
          <span class="ic" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2.5" y="4.5" width="19" height="15" rx="2.2"/>
              <path d="M3 6.5l9 6.2 9-6.2"/>
            </svg>
          </span>
          <div>
            <span class="lbl">E-posta</span>
            <span class="val"><a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a></span>
          </div>
        </div>
        @endif
        @if(!empty($site['address']))
        <div class="foot-contact-item">
          <span class="ic" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 22s7-6.43 7-12a7 7 0 1 0-14 0c0 5.57 7 12 7 12z"/>
              <circle cx="12" cy="10" r="2.6"/>
            </svg>
          </span>
          <div>
            <span class="lbl">Adres</span>
            <span class="val">{!! nl2br(e($site['address'])) !!}</span>
          </div>
        </div>
        @endif
        @if(!empty($site['working_hours']))
        <div class="foot-contact-item">
          <span class="ic" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="9"/>
              <path d="M12 7v5l3.2 2"/>
            </svg>
          </span>
          <div>
            <span class="lbl">Çalışma Saatleri</span>
            <span class="val">{{ $site['working_hours'] }}</span>
          </div>
        </div>
        @endif
      </div>
    </div>

 

    <div class="foot-base">
      <div>© {{ date('Y') }} Bilinçli Ritmik Yaşam. Tüm hakları saklıdır.</div>
      <ul class="foot-base-links">
        <li><a href="#kisisel-verilerin-korunmasi">KVKK / Gizlilik Politikası</a></li>
        <li><a href="#cerez-politikasi">Çerez Politikası</a></li>
        <li><a href="#mesafeli-satis-sozlesmesi">Mesafeli Satış Sözleşmesi</a></li>
        <li class="foot-pay" aria-label="Güvenli Ödeme">
          <span class="foot-pay-label">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <rect x="4" y="10.5" width="16" height="10.5" rx="2"/>
              <path d="M8 10.5V7.5a4 4 0 0 1 8 0v3"/>
            </svg>
            Güvenli Ödeme
          </span>
          <span class="foot-pay-cards" aria-hidden="true">
            <span class="pay-card pay-card--visa" title="Visa">
              <svg viewBox="0 0 48 16" aria-hidden="true">
                <text x="24" y="13" text-anchor="middle" font-family="Helvetica, Arial, sans-serif" font-weight="900" font-style="italic" font-size="14" letter-spacing="0.5" fill="#1A1F71">VISA</text>
              </svg>
            </span>
            <span class="pay-card pay-card--mc" title="Mastercard">
              <svg viewBox="0 0 48 28" aria-hidden="true">
                <circle cx="20" cy="14" r="10" fill="#EB001B"/>
                <circle cx="28" cy="14" r="10" fill="#F79E1B" opacity="0.92"/>
                <path d="M24 6.4a10 10 0 0 0 0 15.2 10 10 0 0 0 0-15.2z" fill="#FF5F00"/>
              </svg>
            </span>
            <span class="pay-card pay-card--troy" title="Troy">
              <svg viewBox="0 0 56 18" aria-hidden="true">
                <text x="28" y="13" text-anchor="middle" font-family="Helvetica, Arial, sans-serif" font-weight="800" font-size="11.5" letter-spacing="0.6" fill="#E8224B">troy</text>
                <circle cx="44" cy="9" r="2.6" fill="#00A1DE"/>
              </svg>
            </span>
          </span>
        </li>
      </ul>
    </div>
  </div>
</footer>
