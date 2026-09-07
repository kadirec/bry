@extends('layouts.app')

@section('title', 'KVKK / Gizlilik Politikası — Bilinçli Ritmik Yaşam')
@section('description', 'Bilinçli Ritmik Yaşam olarak kişisel verilerinizi nasıl işlediğimize, sakladığımıza ve koruduğumuza dair KVKK aydınlatma metni ve gizlilik politikamız.')
@section('canonical', 'https://www.bilincliritmikyasam.com/kvkk-gizlilik-politikasi')
@section('og-image', 'assets/logo.png')
@section('main-class', 'inner')

@section('content')
  <section class="page-hero" aria-labelledby="legal-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">KVKK / Gizlilik Politikası</span>
      </nav>
      <span class="eyebrow">Yasal Bilgilendirme</span>
      <h1 id="legal-title">Kişisel Verilerin Korunması ve <em>Gizlilik Politikası</em></h1>
      <p class="lead">6698 sayılı KVKK kapsamında, web sitemiz üzerinden paylaştığınız kişisel verilerin hangi amaçlarla işlendiğini, kimlerle paylaşıldığını ve haklarınızı bu sayfada bulabilirsiniz.</p>
    </div>
  </section>

  <section class="legal-section" aria-label="KVKK / Gizlilik Politikası metni">
    <div class="container">
      <article class="legal-doc">
        @include('partials.legal.gizlilik')
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
