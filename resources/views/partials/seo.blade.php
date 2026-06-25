@php
    $siteName  = $site['site_name']      ?? config('app.name', 'Bilinçli Ritmik Yaşam');
    $siteUrl   = $site['site_url']       ?? config('app.url');

    // Öncelik: PageSeo (DB) > sayfa @section override > varsayılan
    $title     = $pageSeo->title       ?? trim($__env->yieldContent('title'))       ?: $siteName;
    $desc      = $pageSeo->description ?? trim($__env->yieldContent('description')) ?: ($site['site_short_desc'] ?? '');
    $keywords  = $pageSeo->keywords    ?? trim($__env->yieldContent('keywords'));
    $canonical = $pageSeo->canonical   ?? trim($__env->yieldContent('canonical'))   ?: url()->current();
    $ogImage   = $pageSeo->og_image    ?? trim($__env->yieldContent('og-image'))    ?: ($site['logo_light'] ?? 'assets/logo.png');
    $ogType    = $pageSeo->og_type     ?? trim($__env->yieldContent('og-type'))     ?: 'website';
    $robots    = $pageSeo->robots      ?? trim($__env->yieldContent('robots'))      ?: 'index, follow, max-image-preview:large';

    // Göreceli yolları absolute URL'e çevir (OG için)
    if ($ogImage && !preg_match('#^https?://#', $ogImage)) {
        $ogImage = asset($ogImage);
    }
@endphp

<title>{{ $title }}</title>
@if($desc)<meta name="description" content="{{ $desc }}" />@endif
@if($keywords)<meta name="keywords" content="{{ $keywords }}" />@endif
<meta name="author" content="Tuncay Vural — BRY Metodu Kurucusu" />
<meta name="robots" content="{{ $robots }}" />
<link rel="canonical" href="{{ $canonical }}" />
<meta name="theme-color" content="#1F2A24" />

{{-- Open Graph --}}
<meta property="og:type" content="{{ $ogType }}" />
<meta property="og:locale" content="tr_TR" />
<meta property="og:site_name" content="{{ $siteName }}" />
<meta property="og:url" content="{{ $canonical }}" />
<meta property="og:title" content="{{ $title }}" />
@if($desc)<meta property="og:description" content="{{ $desc }}" />@endif
<meta property="og:image" content="{{ $ogImage }}" />
<meta property="og:image:alt" content="{{ $siteName }} logosu" />

{{-- Twitter --}}
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $title }}" />
@if($desc)<meta name="twitter:description" content="{{ $desc }}" />@endif
<meta name="twitter:image" content="{{ $ogImage }}" />
