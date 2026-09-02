<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="google-site-verification" content="qgrfzqDpLJq5RU5ejnXf1JTFY2AF-5BkVYR0dvG1lms" />
{{-- Google tag (gtag.js) --}}
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6K29847WWV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-6K29847WWV');
</script>

{{-- Facebook domain verification --}}
<meta name="facebook-domain-verification" content="ybwufe0grkvujfvxur0bujl1gd8svx" />
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '502132873916805');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=502132873916805&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
 
@include('partials.seo')

{{-- Schema.org JSON-LD --}}
@if (View::hasSection('jsonld'))
  @yield('jsonld')
@else
  @include('partials.jsonld-default')
@endif

{{-- Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet" />

<link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/favicon.png') }}">

<link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ @filemtime(public_path('css/app.css')) ?: '1' }}">

@stack('head')
</head>
<body class="@yield('body-class')">

<a href="#main" class="skip">İçeriğe geç</a>
 
@include('partials.header')

<main id="main" class="@yield('main-class')">
@yield('content')
</main>

@include('partials.footer')
@include('partials.whatsapp-float')
@include('partials.video-modal')

<script src="{{ asset('js/main.js') }}?v={{ @filemtime(public_path('js/main.js')) ?: '1' }}" defer></script>
@stack('scripts')
</body>
</html>
