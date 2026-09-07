@extends('layouts.app')

@section('title', 'Mesafeli Satış Sözleşmesi — Bilinçli Ritmik Yaşam')
@section('description', 'Web sitemiz üzerinden satın alınan eğitim ve danışmanlık hizmetlerine ilişkin mesafeli satış sözleşmesi, cayma hakkı ve iptal koşulları.')
@section('canonical', 'https://www.bilincliritmikyasam.com/mesafeli-satis-sozlesmesi')
@section('og-image', 'assets/logo.png')
@section('main-class', 'inner')

@section('content')
  <section class="page-hero" aria-labelledby="legal-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">Mesafeli Satış Sözleşmesi</span>
      </nav>
      <span class="eyebrow">Yasal Bilgilendirme</span>
      <h1 id="legal-title">Mesafeli Satış <em>Sözleşmesi</em></h1>
      <p class="lead">6502 sayılı Tüketicinin Korunması Hakkında Kanun ve Mesafeli Sözleşmeler Yönetmeliği kapsamında taraflarının hak ve yükümlülüklerini düzenleyen sözleşme metni.</p>
    </div>
  </section>

  <section class="legal-section" aria-label="Mesafeli Satış Sözleşmesi metni">
    <div class="container">
      <article class="legal-doc">
        @include('partials.legal.mesafeli')
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
