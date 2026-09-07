@extends('layouts.app')

@section('title', 'Çerez Politikası — Bilinçli Ritmik Yaşam')
@section('description', 'Web sitemizde kullanılan çerezler, kullanım amaçları ve çerez tercihlerinizi nasıl yönetebileceğinize dair bilgilendirme.')
@section('canonical', 'https://www.bilincliritmikyasam.com/cerez-politikasi')
@section('og-image', 'assets/logo.png')
@section('main-class', 'inner')

@section('content')
  <section class="page-hero" aria-labelledby="legal-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">Çerez Politikası</span>
      </nav>
      <span class="eyebrow">Yasal Bilgilendirme</span>
      <h1 id="legal-title"><em>Çerez</em> Politikası</h1>
      <p class="lead">Sitemizin doğru çalışması, deneyiminizin iyileştirilmesi ve ziyaret istatistiklerinin ölçülmesi için kullanılan çerezleri bu sayfada açıklıyoruz.</p>
    </div>
  </section>

  <section class="legal-section" aria-label="Çerez Politikası metni">
    <div class="container">
      <article class="legal-doc">
        @include('partials.legal.cerez')
      </article>

      <nav class="legal-other" aria-label="Diğer yasal metinler">
        <span>Diğer metinler:</span>
        <a href="{{ route('legal.gizlilik') }}">KVKK / Gizlilik Politikası</a>
        <a href="{{ route('legal.cerez') }}">Çerez Politikası</a>
        <a href="{{ route('legal.mesafeli') }}">Mesafeli Satış Sözleşmesi</a>
      </nav>
    </div>
  </section>
@endsection
