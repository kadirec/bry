<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

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

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

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

<script src="{{ asset('js/main.js') }}" defer></script>
@stack('scripts')
</body>
</html>
