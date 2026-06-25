@extends('layouts.app')

@section('title', $post->meta_title ?? ($post->title . ' — Blog | Bilinçli Ritmik Yaşam'))
@section('description', $post->meta_description ?? $post->excerpt)
@section('og-image', $post->og_image ?? ($post->featured_image ? 'storage/' . $post->featured_image : 'assets/logo.png'))
@section('og-type', 'article')
@section('main-class', 'inner')

@section('jsonld')
@verbatim
<script type="application/ld+json">
@endverbatim
{!! json_encode([
  '@context' => 'https://schema.org',
  '@type'    => 'Article',
  'headline' => $post->title,
  'description' => $post->excerpt,
  'image'    => $post->featuredImageUrl() ?: asset('assets/logo.png'),
  'datePublished' => optional($post->published_at)->toIso8601String(),
  'dateModified'  => $post->updated_at->toIso8601String(),
  'author'   => ['@type' => 'Person', 'name' => $post->author],
  'publisher' => [
    '@type' => 'Organization',
    'name'  => $site['site_name'] ?? 'Bilinçli Ritmik Yaşam',
    'logo'  => ['@type' => 'ImageObject', 'url' => asset($site['logo_light'] ?? 'assets/logo.png')],
  ],
  'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => route('blog.show', $post)],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
@verbatim
</script>
@endverbatim
@endsection

@section('content')
  <!-- HERO -->
  <section class="blog-hero" aria-labelledby="post-title">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <a href="{{ route('blog') }}">Blog</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">{{ Str::limit($post->title, 50) }}</span>
      </nav>
      @if($post->category)<span class="eyebrow">{{ $post->category->name }}</span>@endif
      <h1 id="post-title">{{ $post->title }}</h1>
      @if($post->excerpt)<p class="lead">{{ $post->excerpt }}</p>@endif

      <div class="meta" style="margin-top: 18px; color: var(--ink-mute); font-size: 14px;">
        @if($post->published_at)<span>{{ $post->published_at->translatedFormat('d F Y') }}</span><span class="sep" style="margin: 0 8px;">·</span>@endif
        <span>{{ $post->author }}</span>
        @if($post->reading_minutes)<span class="sep" style="margin: 0 8px;">·</span><span>{{ $post->reading_minutes }} dk okuma</span>@endif
      </div>
    </div>
  </section>

  <!-- BODY -->
  <section style="padding-top: 30px; padding-bottom: 90px;">
    <div class="container" style="max-width: 760px;">
      @if($post->featuredImageUrl())
        <img src="{{ $post->featuredImageUrl() }}" alt="{{ $post->title }}" style="width: 100%; border-radius: var(--radius-lg); margin-bottom: 36px;">
      @endif

      <article class="post-body" style="font-size: 18px; line-height: 1.75; color: var(--ink); max-width: 100%;">
        {!! $post->body !!}
      </article>

      <div style="margin-top: 50px; padding-top: 30px; border-top: 1px solid var(--line);">
        <a href="{{ route('blog') }}" class="btn-arrow">← Tüm Yazılar</a>
      </div>
    </div>
  </section>

  @if($related->count())
    <!-- İLGİLİ YAZILAR -->
    <section style="padding: 60px 0 90px; background: var(--bg-soft);">
      <div class="container">
        <div class="section-head" style="margin-bottom: 30px;">
          <span class="eyebrow">İlgili Yazılar</span>
          <h2>Belki <em>Bunlar Da</em> İlgini Çeker</h2>
        </div>
        <div class="post-grid">
          @foreach($related as $r)
            <a href="{{ route('blog.show', $r) }}" class="post-card">
              <div class="visual" @if($r->featuredImageUrl()) style="background-image: url('{{ $r->featuredImageUrl() }}'); background-size: cover; background-position: center;"@endif></div>
              @if($r->category)<span class="cat-pill">{{ $r->category->name }}</span>@endif
              <h3>{{ $r->title }}</h3>
              @if($r->excerpt)<p class="excerpt">{{ Str::limit($r->excerpt, 120) }}</p>@endif
              <div class="meta">
                @if($r->reading_minutes)<span>{{ $r->reading_minutes }} dk okuma</span><span class="sep">·</span>@endif
                <span>{{ $r->author }}</span>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </section>
  @endif
  @include('partials.contact-cta')
@endsection
