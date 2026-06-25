<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Giriş · BRY Admin</title>
<meta name="robots" content="noindex, nofollow" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="adm-login-single">
  <div class="adm-login-single__card">
    <div class="adm-login-single__brand">
      <img src="{{ asset('assets/logo.png') }}" alt="BRY">
      <div>
        <div class="adm-login-single__name">BRY</div>
        <div class="adm-login-single__sub">Yönetim Paneli</div>
      </div>
    </div>

    <h1>Giriş Yap</h1>
    <p class="sub">Hesabınla yönetim paneline erişim sağla.</p>

    @if ($errors->any())
      <div class="adm-alert adm-alert--error">
        <svg class="adm-alert__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <div>{{ $errors->first() }}</div>
      </div>
    @endif

    <form action="{{ route('admin.login.store') }}" method="POST" novalidate>
      @csrf
      <div class="adm-field {{ $errors->has('email') ? 'invalid' : '' }}">
        <label for="email">E-posta</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="ornek@bilincliritmikyasam.com">
      </div>
      <div class="adm-field {{ $errors->has('password') ? 'invalid' : '' }}">
        <label for="password">Şifre</label>
        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
      </div>
      <div class="adm-field">
        <label class="adm-check" for="remember">
          <input id="remember" type="checkbox" name="remember" value="1">
          <span>Beni hatırla</span>
        </label>
      </div>
      <button class="adm-btn adm-btn--lg adm-btn--block" type="submit">Giriş Yap</button>
    </form>

    <div class="adm-login-single__foot">
      &copy; {{ date('Y') }} Bilinçli Ritmik Yaşam
    </div>
  </div>
</div>

<style>
  .adm-login-single {
    min-height: 100vh;
    display: grid;
    place-items: center;
    padding: 40px 20px;
    background: var(--c-bg);
  }
  .adm-login-single__card {
    width: 100%;
    max-width: 420px;
    background: #fff;
    border: 1px solid var(--c-line);
    border-radius: 14px;
    padding: 36px 36px 28px;
    box-shadow: var(--sh-3);
  }
  .adm-login-single__brand {
    display: flex; align-items: center; gap: 12px;
    margin-bottom: 28px;
    padding-bottom: 22px;
    border-bottom: 1px solid var(--c-line-2);
  }
  .adm-login-single__brand img {
    width: 40px; height: 40px;
    background: var(--c-brand-3);
    border-radius: 8px;
    padding: 5px;
    object-fit: contain;
  }
  .adm-login-single__name { font-weight: 600; font-size: 15px; color: var(--c-ink); letter-spacing: -0.01em; }
  .adm-login-single__sub { font-size: 11.5px; color: var(--c-ink-3); text-transform: uppercase; letter-spacing: 0.06em; font-weight: 500; }
  .adm-login-single__card h1 { font-size: 20px; letter-spacing: -0.015em; margin: 0 0 4px; }
  .adm-login-single__card .sub { color: var(--c-ink-3); font-size: 13.5px; margin: 0 0 24px; }
  .adm-login-single__foot {
    margin-top: 22px;
    padding-top: 18px;
    border-top: 1px solid var(--c-line-2);
    text-align: center;
    font-size: 12px;
    color: var(--c-ink-4);
  }
</style>

</body>
</html>
