<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>@yield('title', 'Yönetim') · BRY Admin</title>
<meta name="robots" content="noindex, nofollow" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="adm-shell" id="admShell">
  @include('admin.partials.sidebar')

  <div class="adm-main">
    <header class="adm-topbar">
      <div style="display:flex; align-items:center; gap:12px; min-width:0;">
        <button type="button" class="adm-burger" aria-label="Menü" onclick="document.getElementById('admShell').classList.toggle('is-nav-open')">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>
        <nav class="adm-crumbs" aria-label="breadcrumb">
          <a href="{{ route('admin.dashboard') }}">Yönetim</a>
          @hasSection('crumbs')
            @yield('crumbs')
          @else
            <span class="adm-crumbs__sep">/</span>
            <span class="adm-crumbs__current">@yield('title', 'Gösterge Paneli')</span>
          @endif
        </nav>
      </div>

      <div class="adm-topbar__right">
        <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('home') }}" target="_blank" rel="noopener">
          <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          Siteyi Görüntüle
        </a>
        @auth
          <span class="adm-user" title="{{ auth()->user()->email }}">
            <span class="adm-user__avatar">{{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span>
            <span>{{ auth()->user()->name }}</span>
          </span>
        @endauth
      </div>
    </header>

    <main class="adm-main__body">
      @if (session('status'))
        <div class="adm-alert adm-alert--success">
          <svg class="adm-alert__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          <div>{{ session('status') }}</div>
        </div>
      @endif

      @if (session('error'))
        <div class="adm-alert adm-alert--error">
          <svg class="adm-alert__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          <div>{{ session('error') }}</div>
        </div>
      @endif

      @yield('content')
    </main>
  </div>
</div>

@stack('scripts')
</body>
</html>
