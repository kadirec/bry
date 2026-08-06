<header class="site">
  <div class="nav">
    <div class="nav-left">
      <a href="{{ route('home') }}" class="brand" aria-label="Bilinçli Ritmik Yaşam ana sayfa">
        <img src="{{ asset('assets/logo.png') }}" alt="BRY logo" />
      </a>
      <a href="{{ route('bry-metodu-ile-tanis') }}" class="btn btn-plum nav-lead-cta">BRY ile Tanış</a>
    </div>

    <nav class="menu" aria-label="Ana menü">
      <div class="item">
        <button aria-expanded="false">Hakkında <span class="caret"></span></button>
        <div class="submenu" role="menu">
          <a href="{{ route('bry-nedir') }}"><strong>BRY Nedir?</strong><small>Metodun temelleri ve 9 boyutlu yaklaşım</small></a>
          <a href="{{ route('tuncay-vural') }}"><strong>Tuncay Vural</strong><small>Kurucu, eğitmen ve rehber – 22 yıllık deneyim</small></a>
        </div>
      </div>
      <div class="item">
        <button aria-expanded="false">Eğitimler <span class="caret"></span></button>
        <div class="submenu" role="menu">
          <a href="{{ route('programs.bireysel') }}"><strong>BRY Bireysel ve Özel Programlar</strong><small>Birebir eğitim ve rehberlik</small></a>
          <a href="{{ route('programs.online') }}"><strong>BRY Online Akademi</strong><small>Kendi temponda dijital eğitimler</small></a>
          <a href="{{ route('programs.kurumsal') }}"><strong>BRY Kurumsal Programlar</strong><small>Şirketler ve takımlar için</small></a>
        </div>
      </div>
      <div class="item">
        <button aria-expanded="false">Deneyimler <span class="caret"></span></button>
        <div class="submenu" role="menu">
          <a href="{{ route('deneyimler.donusen') }}"><strong>BRY ile Dönüşen Hayatlar</strong><small>Katılımcı hikayeleri</small></a>
          <a href="{{ route('deneyimler.etkinlik') }}"><strong>Etkinlik ve Kamp Fotoğrafları</strong><small>Buluşmalarımızdan kareler</small></a>
          <a href="{{ route('deneyimler.referanslar') }}"><strong>Kurumsal Referanslar</strong><small>Birlikte çalıştığımız kurumlar</small></a>
          <a href="{{ route('deneyimler.kurumsal') }}"><strong>Kurumsal Etkinlikler</strong><small>Şirket içi seminerler</small></a>
        </div>
      </div>
      <div class="item"><a href="{{ route('blog') }}">Blog</a></div>
      <div class="item"><a href="{{ route('iletisim') }}">İletişim</a></div>
    </nav>

    <div class="nav-cta">
      <a href="https://73ff-bilincliritmikyasam.systeme.io/login" target="_blank" rel="noopener" class="login-link login-live">
        <span class="live-dot" aria-hidden="true"></span>
        <span class="login-live__text">Akademi Girişi</span>
      </a>
      <a href="{{ route('bry-metodu-ile-tanis') }}" class="btn btn-plum nav-lead-cta--drawer">BRY ile Tanış</a>
      <button class="menu-toggle" aria-label="Menüyü aç">☰</button>
    </div>
  </div>
</header>
