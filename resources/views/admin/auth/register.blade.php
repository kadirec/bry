<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Kayıt Ol · BRY Admin</title>
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

    <h1>Kayıt Ol</h1>
    <p class="sub">Yönetim paneline erişim için yeni hesap oluştur.</p>

    @if ($errors->any())
      <div class="adm-alert adm-alert--error">
        <svg class="adm-alert__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <div>{{ $errors->first() }}</div>
      </div>
    @endif

    <form action="{{ route('admin.register.store') }}" method="POST" novalidate>
      @csrf
      <div class="adm-field {{ $errors->has('name') ? 'invalid' : '' }}">
        <label for="name">Ad Soyad</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Adınız Soyadınız">
      </div>
      <div class="adm-field {{ $errors->has('email') ? 'invalid' : '' }}">
        <label for="email">E-posta</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="ornek@bilincliritmikyasam.com">
      </div>
      <div class="adm-field {{ $errors->has('password') ? 'invalid' : '' }}">
        <label for="password">Şifre</label>
        <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="••••••••">
      </div>
      <div class="adm-field {{ $errors->has('password_confirmation') ? 'invalid' : '' }}">
        <label for="password_confirmation">Şifre Tekrar</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
      </div>
      <button class="adm-btn--block adm-btn adm-btn--lg" type="submit">Kayıt Ol</button>
    </form>

    <div style="text-align: center; margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--line);">
      <p class="sub">Zaten hesabın var mı? <a href="{{ route('admin.login') }}" style="color: var(--ink-link); text-decoration: none; font-weight: 500;">Giriş yap</a></p>
    </div>

    <div class="adm-login-single__foot">
      &copy; {{ date('Y') }} Bilinçli Ritmik Yaşam
    </div>
  </div>
</div>

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  :root {
    --ink: #14191A;
    --ink-soft: #727A7F;
    --ink-mute: #9FA4A8;
    --ink-link: #0066CC;
    --line: #E5E7EB;
    --bg: #fff;
    --bg-soft: #F9FAFB;
    --radius-lg: 12px;
  }

  html, body {
    height: 100%;
  }

  body {
    font-family: "Inter", sans-serif;
    color: var(--ink);
    background: var(--bg-soft);
  }

  .adm-login-single {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 20px;
  }

  .adm-login-single__card {
    width: 100%;
    max-width: 420px;
    background: var(--bg);
    border-radius: var(--radius-lg);
    padding: 36px 28px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  }

  .adm-login-single__brand {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
  }

  .adm-login-single__brand img {
    width: 48px;
    height: 48px;
  }

  .adm-login-single__name {
    font-size: 16px;
    font-weight: 700;
  }

  .adm-login-single__sub {
    font-size: 13px;
    color: var(--ink-mute);
  }

  h1 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 8px;
  }

  .sub {
    font-size: 14px;
    color: var(--ink-soft);
    margin-bottom: 24px;
  }

  .adm-alert {
    padding: 12px 16px;
    border-radius: 8px;
    display: flex;
    gap: 12px;
    align-items: flex-start;
    margin-bottom: 24px;
    font-size: 14px;
  }

  .adm-alert--error {
    background: #FEE2E2;
    color: #991B1B;
  }

  .adm-alert__ico {
    width: 20px;
    height: 20px;
    flex-shrink: 0;
    margin-top: 2px;
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-bottom: 24px;
  }

  .adm-field {
    display: flex;
    flex-direction: column;
    gap: 6px;
  }

  .adm-field label {
    font-size: 13px;
    font-weight: 600;
    color: var(--ink);
  }

  .adm-field input {
    padding: 10px 12px;
    border: 1px solid var(--line);
    border-radius: 8px;
    font-family: inherit;
    font-size: 14px;
    transition: all 0.2s;
  }

  .adm-field input:focus {
    outline: none;
    border-color: var(--ink-link);
    box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
  }

  .adm-field.invalid input {
    border-color: #EF4444;
  }

  .adm-btn {
    padding: 10px 16px;
    border: none;
    border-radius: 8px;
    font-family: inherit;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
  }

  .adm-btn--lg {
    padding: 12px 20px;
    font-size: 15px;
  }

  .adm-btn--block {
    width: 100%;
  }

  .adm-btn {
    background: var(--ink-link);
    color: white;
  }

  .adm-btn:hover {
    opacity: 0.9;
  }

  .adm-check {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    font-size: 14px;
  }

  .adm-check input {
    width: 18px;
    height: 18px;
    cursor: pointer;
  }

  .adm-login-single__foot {
    text-align: center;
    font-size: 13px;
    color: var(--ink-mute);
    padding-top: 20px;
    border-top: 1px solid var(--line);
  }

  a {
    color: var(--ink-link);
  }
</style>

</body>
</html>
