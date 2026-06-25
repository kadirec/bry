@extends('layouts.app')

@section('title', 'Blog — Bilinçli Ritmik Yaşam · Tuncay Vural')
@section('description', 'Kendini tanıma, ilişkiler, zihin yönetimi ve yaşam ritmi üzerine BRY Metodu\'nun bakış açısıyla yazılar.')
@section('keywords', 'bilinçli ritmik yaşam, bry metodu, tuncay vural, kendini tanımak, yaşam metodu, bilinçli yaşam, farkındalık, kendini keşfetmek, kişisel gelişim, doğru karar almak, koçluk')
@section('canonical', 'https://www.bilincliritmikyasam.com/blog')
@section('og-image', 'assets/logo.png')
@section('main-class', 'inner')

@section('jsonld')
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "https://www.bilincliritmikyasam.com/#organization",
      "name": "Bilinçli Ritmik Yaşam",
      "alternateName": "BRY",
      "url": "https://www.bilincliritmikyasam.com/",
      "logo": "https://www.bilincliritmikyasam.com/assets/logo.png",
      "founder": { "@type": "Person", "name": "Tuncay Vural" },
      "foundingDate": "2003",
      "sameAs": [
        "https://www.youtube.com/@bilincliritmikyasam",
        "https://www.instagram.com/tuncayvural_bry/",
        "https://www.facebook.com/BilincliRitmikYasam",
        "https://www.tiktok.com/@bilincliritmikyasam",
        "https://open.spotify.com/show/1GDAZ6JAynBhv7L3wZwJps"
      ],
      "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "customer support",
        "availableLanguage": ["Turkish"]
      }
    },
    {
      "@type": "Person",
      "@id": "https://www.bilincliritmikyasam.com/#tuncay-vural",
      "name": "Tuncay Vural",
      "jobTitle": "BRY Metodu Kurucusu, Yaşam Koçu",
      "worksFor": { "@id": "https://www.bilincliritmikyasam.com/#organization" },
      "image": "https://www.bilincliritmikyasam.com/assets/tuncay-portrait.jpg"
    },
    {
      "@type": "WebSite",
      "url": "https://www.bilincliritmikyasam.com/",
      "name": "Bilinçli Ritmik Yaşam",
      "publisher": { "@id": "https://www.bilincliritmikyasam.com/#organization" },
      "inLanguage": "tr-TR"
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        { "@type": "Question", "name": "BRY Metodu nedir?",
          "acceptedAnswer": { "@type": "Answer", "text": "Bilinçli Ritmik Yaşam (BRY) Metodu, insanı zihinsel, duygusal ve ruhsal boyutlarıyla bir bütün olarak ele alan, içeriği itibarıyla ilk ve tek yaşam metodudur." } },
        { "@type": "Question", "name": "BRY Metodunu kimler tercih eder?",
          "acceptedAnswer": { "@type": "Answer", "text": "Kendini bütünsel olarak tanımak, güçlü yönlerini keşfetmek ve yaşamını daha bilinçli yönlendirmek isteyen herkes için uygundur." } },
        { "@type": "Question", "name": "Eğitim programları neleri kapsıyor?",
          "acceptedAnswer": { "@type": "Answer", "text": "Bireysel ve özel programlar, BRY Online Akademi ve kurumsal programlar olmak üzere üç ana başlık altında sunulmaktadır." } },
        { "@type": "Question", "name": "Tuncay Vural kimdir?",
          "acceptedAnswer": { "@type": "Answer", "text": "BRY Metodu’nun kurucusu olup 22 yılı aşkın süredir 30.000’in üzerinde insana iyi bir yaşam sürmeleri için rehberlik etmektedir." } }
      ]
    }
  ]
}
</script>
@endverbatim
@endsection

@section('content')
<!-- HERO -->
  <section class="blog-hero" aria-labelledby="blog-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">Blog</span>
      </nav>
      <span class="eyebrow">Blog</span>
      <h1 id="blog-title">Bilinçle <em>Yaşamaya</em> Dair</h1>
      <p class="lead">Kendini tanıma, ilişkiler, zihin yönetimi ve yaşam ritmi üzerine yazılar. BRY Metodu'nun bakış açısıyla, yaşamın içinden gerçek konular.</p>
    </div>
  </section>

  <!-- POSTS -->
  <section aria-labelledby="post-list-title" style="padding-top: 30px; padding-bottom: 90px;">
    <div class="container">
      <h2 id="post-list-title" style="position:absolute;left:-9999px;">Yazılar</h2>

      <!-- Filtre -->
      <div class="cat-filter" role="tablist" aria-label="Kategori filtresi">
        <a href="{{ route('blog') }}" class="chip {{ !$activeCategory ? 'is-active' : '' }}" role="tab" aria-selected="{{ !$activeCategory ? 'true' : 'false' }}">Tümü <span class="count">·  {{ $totalCount }}</span></a>
        @foreach($categories as $cat)
          <a href="{{ route('blog', ['kategori' => $cat->slug]) }}" class="chip {{ $activeCategory && $activeCategory->id === $cat->id ? 'is-active' : '' }}" role="tab" aria-selected="{{ $activeCategory && $activeCategory->id === $cat->id ? 'true' : 'false' }}">{{ $cat->name }} <span class="count">·  {{ $cat->posts_count }}</span></a>
        @endforeach
        <span class="spacer"></span>
        <span class="sort"><span>En Yeni</span> ↓</span>
      </div>

      @if($featured)
        <!-- Featured -->
        <article class="featured-post">
          <a href="{{ route('blog.show', $featured) }}" class="visual" aria-label="Öne çıkan yazıyı oku" @if($featured->featuredImageUrl()) style="background-image: url('{{ $featured->featuredImageUrl() }}'); background-size: cover; background-position: center;"@endif>
            <span class="feat-tag">Öne Çıkan</span>
          </a>
          <div class="body">
            @if($featured->category)<span class="cat-pill">{{ $featured->category->name }}</span>@endif
            <h2><a href="{{ route('blog.show', $featured) }}" style="color: inherit; text-decoration: none;">{{ $featured->title }}</a></h2>
            @if($featured->excerpt)<p class="excerpt">{{ $featured->excerpt }}</p>@endif
            <div class="meta">
              @if($featured->reading_minutes)<span>{{ $featured->reading_minutes }} dk okuma</span><span class="sep">·</span>@endif
              <span>{{ $featured->author }}</span>
            </div>
            <a href="{{ route('blog.show', $featured) }}" class="btn-arrow">Yazıyı Oku →</a>
          </div>
        </article>
      @endif

      <!-- Post grid -->
      <div class="post-grid">
        @forelse($posts as $post)
          <a href="{{ route('blog.show', $post) }}" class="post-card">
            <div class="visual" @if($post->featuredImageUrl()) style="background-image: url('{{ $post->featuredImageUrl() }}'); background-size: cover; background-position: center;"@endif></div>
            @if($post->category)<span class="cat-pill">{{ $post->category->name }}</span>@endif
            <h3>{{ $post->title }}</h3>
            @if($post->excerpt)<p class="excerpt">{{ $post->excerpt }}</p>@endif
            <div class="meta">
              @if($post->reading_minutes)<span>{{ $post->reading_minutes }} dk okuma</span><span class="sep">·</span>@endif
              <span>{{ $post->author }}</span>
            </div>
          </a>
        @empty
          <p style="grid-column: 1 / -1; text-align: center; color: var(--ink-mute); padding: 60px 0;">Bu kategoride henüz yazı yok.</p>
        @endforelse
      </div>

    </div>
  </section>

  <!-- NEWSLETTER CTA -->
  @include('partials.contact-cta')
@endsection
